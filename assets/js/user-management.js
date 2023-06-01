$(document).ready(function(){
    // --- CARREGAR INFORMAÇÕES DOS USUÁRIOS ---


    // --- CRIAR USUÁRIO ---
    $('#btn-add-user').click(function(){
        var name = $('#createName').val();
        var role = $('#createRole').val();
        var email = $('#createEmail').val();
        var password = $('#createPassword').val();
        
        $.ajax({
            type:'post',
            url:'/create-user',
            data: {
                    name:name,
                    role:role, 
                    email:email,
                    password: password
                },
            dataType:'json',
            success: function(response){
                var class_name;
                if(response.role_id == 'admin'){
                    class_name = 'branded-red';
                }
                else if(response.role_id == 'coordenador'){
                    class_name = 'branded-yellow';
                }
                else{
                    class_name = 'branded-blue';
                }

                $('#createName').val('');
                $('#createRole').val('');
                $('#createEmail').val('');
                $('#createPassword').val('');

                $('tbody').append(
                    '<tr id="'+ response.id +'">\
                        <th scope="row">\
                            <div class="flex-center">'+response.id+'</div>\
                        </th>\
                        <td name = "name">\
                            <div class="flex-center">'+ name +'</div>\
                        </td>\
                        <td name = "email">\
                            <div class="flex-center">'+ email+'</div>\
                        </td>\
                        <td name = "role">\
                            <div class="flex-center">\
                                <div class='+class_name+'><strong class="font-10">'+ response.role_id+'</strong></div>\
                            </div>\
                        </td>\
                        <td>\
                            <div class="flex-center gap-1">\
                                <button class="btn-edit" value = '+ response.id +' data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>\
                                <button class="delete-btn-modal" value = '+ response.id +'>Deletar</button>\
                                <button class="btn-desactive" value = '+ response.id +'>Desativar</button>\
                            </div>\
                        </td>\
                    </tr>'
                );
            }
        });
    });
    
    // --- DELETAR USUÁRIO ---
    $(document).on('click', '.delete-btn-modal', function(e){
        var element = e.target || event.srcElement;
        var elementValue = element.value;
        $.ajax({
            type:'delete',
            url:'/delete-user/' + elementValue,
            success: function(){
                element.parentElement.parentElement.parentElement.remove();
            }
        });
    });

    // --- DESATIVAR USUÁRIO ---
    $(document).on('click', '.btn-desactive', function(e){
        var element = e.target || event.srcElement;
        var elementValue = element.value;
        $.ajax({
            type:'post',
            url:'/desactive-user/' + elementValue,
            success: function(){

                var divPai = element.parentElement;
                var btnActive = document.createElement('button');
                btnActive.setAttribute('class', 'btn-active');
                btnActive.setAttribute('value', elementValue);
                btnActive.innerText = "Ativar";

                divPai.appendChild(btnActive);

                element.remove();
            }
        });
    });

    // --- ATIVAR USUÁRIO ---
    $(document).on('click', '.btn-active', function(e){
        var element = e.target || event.srcElement;
        var elementValue = element.value;
        $.ajax({
            type:'post',
            url:'/active-user/' + elementValue,
            success: function(){

                var divPai = element.parentElement;
                var btnDesactive = document.createElement('button');
                btnDesactive.setAttribute('class', 'btn-desactive');
                btnDesactive.setAttribute('value', elementValue);
                btnDesactive.innerText = "Desativar"

                divPai.appendChild(btnDesactive);

                element.remove();
            }
        });
    });

    // --- MODAL EDIT ---
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', event => {
        
        var button = event.relatedTarget;

         elementValue = button.value;

        $.ajax({
            type:'get',
            url:'/edit-user/' + elementValue,
            success: function(response){
                var modalTitle = editModal.querySelector('.modal-title');
                var nameEdit = editModal.querySelector('#nameEdit');
                var roleEdit = editModal.querySelector('#roleEdit');
                var emailEdit = editModal.querySelector('#emailEdit');
                var passwordEdit = editModal.querySelector('#passwordEdit');
                var btnEdit = editModal.querySelector('#btn-edit-user');
        
                btnEdit.setAttribute("value", elementValue);
                modalTitle.textContent = "Editar - " + response.name;
                nameEdit.value = response.name;  
                roleEdit.value = response.role_id;  
                emailEdit.value = response.email;  
                passwordEdit.value = '';  
            }
        });
    });

    // --- VER SENHA ---
    const viewPassword = document.getElementById('viewPassword');
    viewPassword.addEventListener('click', function(){
        var passwordEdit = document.getElementById('passwordEdit');
        var passwordType = passwordEdit.getAttribute('type');
        
        if(passwordType == 'text'){
            passwordEdit.setAttribute("type", "password");
        }
        else{
            passwordEdit.setAttribute("type", "text");
        }
    });

    // --- EDITAR USUÁRIO ---
    $('#btn-edit-user').click(function(e){

        var btn = e.target;
        var btnValue = btn.value;
        var name = $('#nameEdit').val();
        var role = $('#roleEdit').val();
        var email = $('#emailEdit').val();
        var password = $('#passwordEdit').val();
        
        $.ajax({
            type:'post',
            url:'/update-user/' + btnValue,
            data: {
                    name:name,
                    role:role, 
                    email:email,
                    password: password
                },
            dataType:'json',
            success: function(response){
                var tbody = document.getElementById(response);
                var li = tbody.getElementsByTagName("td");

                var liName = li[0];
                var liEmail = li[1];
                var liRole = li[2];

                liName.children[0].innerText = name
                liEmail.children[0].innerText = email
            }
        });
    });

    // --- PROCURAR USUÁRIO ---
    $('#btn-search-user').click(function(){
        var search = $('#search-input').val();
        $.ajax({
            type:'get',
            url:'/search-user/' + search,
            dataType:'json',
            success: function(response){

                var class_name;
                var class_btn;
                var btn_name;

                var tbody = document.querySelector('tbody');
                tbody.querySelectorAll('tr').forEach(function(e){
                    tbody.removeChild(e);
                });

            
                for(var i = 0; i < (response.users).length; i++){
                
                    if(response.users[i].role_id == 'admin'){
                        class_name = 'branded-red';
                    }
                    else if(response.users[i].role_id == 'coordenador'){
                        class_name = 'branded-yellow';
                    }
                    else{
                        class_name = 'branded-blue';
                    }

                    if(response.users[i].activated == '1'){
                        class_btn = 'btn-desactive';
                        btn_name = 'Desativar';
                    }
                    else{
                        class_btn = 'btn-active';
                        btn_name = 'Ativar';

                    }


                    $('tbody').append(
                        '<tr id="'+ response.users[i].id +'">\
                            <th scope="row">\
                                <div class="flex-center">'+ response.users[i].id+'</div>\
                            </th>\
                            <td name = "name">\
                                <div class="flex-center">'+ response.users[i].name +'</div>\
                            </td>\
                            <td name = "email">\
                                <div class="flex-center">'+ response.users[i].email+'</div>\
                            </td>\
                            <td name = "role">\
                                <div class="flex-center">\
                                <div class="'+ class_name +'"><strong class="font-10">'+ response.users[i].role_id+'</strong></div>\
                                </div>\
                            </td>\
                            <td >\
                                <div class="flex-center gap-1">\
                                    <button class="btn-edit" value = '+ response.users[i].id +' data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>\
                                    <button class="delete-btn-modal" value = '+ response.users[i].id +'>Deletar</button>\
                                    <button class="'+ class_btn +'" value = '+ response.users[i].id +'>'+ btn_name+'</button>\
                                </div>\
                            </td>\
                        </tr>');
                }

               
            }

                
        });
    });
});

document.querySelectorAll('.form-check-input').forEach(function(e){
    e.addEventListener('click', function(){
        console.log("OK")
    })
})