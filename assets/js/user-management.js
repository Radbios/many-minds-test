 // --- DESATIVAR USUÁRIO ---
 $(document).on('click', '.btn-desactive', function(e){
    var element = e.target || event.srcElement;
    var elementValue = element.value;

    $.ajax({
        type:'post',
        url: "/usuario/mudarStatus/" + elementValue + '/' + '0',
        success: function(){
            var divPai = element.parentElement;
            var btnActive = document.createElement('button');
            btnActive.setAttribute('class', 'btn-active');
            btnActive.setAttribute('value', elementValue);
            btnActive.innerText = "Ativar";
            
            divPai.appendChild(btnActive);
            
            element.remove();
            
            var divAvo = divPai.parentElement;
            circulo = divAvo.querySelector(".circle");

            if(circulo.classList.contains('bg-green')){
                circulo.classList.remove('bg-green');
                circulo.classList.add('bg-red');
            }
        },
    });
});

// --- ATIVAR USUÁRIO ---
$(document).on('click', '.btn-active', function(e){
    var element = e.target || event.srcElement;
    var elementValue = element.value;

    $.ajax({
        type:'post',
        url: "/usuario/mudarStatus/" + elementValue + '/' + '1',

        success: function(){
            var divPai = element.parentElement;
            var btnDesactive = document.createElement('button');
            btnDesactive.setAttribute('class', 'btn-desactive');
            btnDesactive.setAttribute('value', elementValue);
            btnDesactive.innerText = "Desativar";

            divPai.appendChild(btnDesactive);

            element.remove();

            var divAvo = divPai.parentElement;
            circulo = divAvo.querySelector(".circle");

            if(circulo.classList.contains('bg-red')){
                circulo.classList.remove('bg-red');
                circulo.classList.add('bg-green');
            }
        },
    });
});

// --- MODAL EDIT ---
const editModal = document.getElementById('editModal');
editModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget;

    elementValue = button.value;

    $.ajax({
        type:'get',
        url:'/usuario/pegarInfo/' + elementValue,
        dataType: 'json',
        success: function(response){
            var modalTitle = editModal.querySelector('.modal-title');
            var nameEdit = editModal.querySelector('#editnome');
            var matriculaEdit = editModal.querySelector('#editmatricula');
            var roleEdit = editModal.querySelector('#editrole');
            var emailEdit = editModal.querySelector('#editemail');
            var passwordEdit = editModal.querySelector('#editsenha');
            var cursoEdit = editModal.querySelector('#editcurso');
            var btnEdit = editModal.querySelector('#btn-edit-user');
    
            btnEdit.setAttribute("value", elementValue);
            modalTitle.textContent = "Editar - " + response.nome;
            nameEdit.value = response.nome;  
            roleEdit.value = response.role;  
            matriculaEdit.value = response.matricula;  
            emailEdit.value = response.email;  
            cursoEdit.value = response.curso;  
        }
    });
});

// --- EDITAR USUÁRIO ---
$('#btn-edit-user').click(function(e){

    var btn = e.target;
    var btnValue = btn.value;
    var name = $('#editnome').val();
    var role = $('#editrole').val();
    var email = $('#editemail').val();
    var curso = $('#editcurso').val();
    var matricula = $('#editmatricula').val();
    $.ajax({
        type:'post',
        url:'usuario/atualizarInfo/' + btnValue,
        data: {
                nome:name,
                role:role, 
                email:email,
                matricula:matricula,
                curso:matricula,
            },
        success: function(response){
            var tbody = document.getElementById(btnValue);
            var li = tbody.getElementsByTagName("td");

            var liMatricula = li[1];
            var liName = li[2];
            var liEmail = li[3];
            var liRole = li[4];
            liName.innerText = name;
            liEmail.innerText = email;
            liMatricula.innerText = matricula;
            liRole.children[0].innerText = role;

            if(role == 'admin'){
                liRole.children[0].classList.remove("branded-yellow");
                liRole.children[0].classList.add("branded-blue");
            }
            else{
                liRole.children[0].classList.remove("branded-blue");
                liRole.children[0].classList.add("branded-yellow");
            }
        }
    });
});

// --- MODAL SHOW ---
const showModal = document.getElementById('showModal');
showModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget;

    elementValue = button.value;
    $.ajax({
        type:'get',
        url:'/usuario/pegarInfo/' + elementValue,
        dataType: 'json',
        success: function(response){
            var modalTitle = showModal.querySelector('.modal-title');
            var nameshow = showModal.querySelector('#shownome');
            var matriculashow = showModal.querySelector('#showmatricula');
            var roleshow = showModal.querySelector('#showrole');
            var emailshow = showModal.querySelector('#showemail');
            var passwordshow = showModal.querySelector('#showsenha');
            var cursoshow = showModal.querySelector('#showcurso');
    
            modalTitle.textContent = "Usuário - " + response.nome;
            nameshow.value = response.nome;  
            roleshow.value = response.role;  
            matriculashow.value = response.matricula;  
            emailshow.value = response.email;  
            cursoshow.value = response.curso;  
        }
    });
});