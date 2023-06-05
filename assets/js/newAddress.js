const newAddress = document.getElementById("cadastrarEndereco");
const addBtn = newAddress.querySelector("#btn-add");
const createBtn = newAddress.querySelector("#btn-create");
const addresses = newAddress.querySelector("#addresses");

function addEventRemoveElement(element){
    element.addEventListener("click", function(e) {
        element.parentElement.parentElement.parentElement.remove();
        if(addresses.querySelectorAll("li").length == 0){
            createBtn.setAttribute("disabled", "true");
        }
    });
}

addBtn.addEventListener("click", function(e) {
    var createAddressCEP = newAddress.querySelector("#createAddressCEP");
    var createAddressLogradouro = newAddress.querySelector("#createAddressLogradouro");
    var createAddressBairro = newAddress.querySelector("#createAddressBairro");
    var createAddressCidade = newAddress.querySelector("#createAddressCidade");
    var createAddressEstado = newAddress.querySelector("#createAddressEstado");

    var li = document.createElement("li");
    var divGrid = document.createElement("div");
    divGrid.setAttribute("class", "addressGrid");
    li.appendChild(divGrid);

    var divAddressInfo = document.createElement("div");
    divAddressInfo.setAttribute("class", "addressInfo");
    divGrid.appendChild(divAddressInfo);

    var divAddressRemove = document.createElement("div");
    divAddressRemove.setAttribute("class", "addressRemove");
    divGrid.appendChild(divAddressRemove);

    var cep = document.createElement("div");
    cep.setAttribute("class", "contentInfo");
    divAddressInfo.appendChild(cep);

    var cepTitle = document.createElement("div");
    cepTitle.setAttribute("class", "infoAddressTitle");
    cepTitle.innerHTML = "cep: ";
    cep.appendChild(cepTitle);

    var cepText = document.createElement("div");
    cepText.setAttribute("class", "infoAddressText");
    cepText.innerHTML = createAddressCEP.value;
    cep.appendChild(cepText);

    var logradouro = document.createElement("div");
    logradouro.setAttribute("class", "contentInfo");
    divAddressInfo.appendChild(logradouro);

    var logradouroTitle = document.createElement("div");
    logradouroTitle.setAttribute("class", "infoAddressTitle");
    logradouroTitle.innerHTML = "logradouro: ";
    logradouro.appendChild(logradouroTitle);

    var logradouroText = document.createElement("div");
    logradouroText.setAttribute("class", "infoAddressText");
    logradouroText.innerHTML = createAddressLogradouro.value;
    logradouro.appendChild(logradouroText);

    var bairro = document.createElement("div");
    bairro.setAttribute("class", "contentInfo");
    divAddressInfo.appendChild(bairro);

    var bairroTitle = document.createElement("div");
    bairroTitle.setAttribute("class", "infoAddressTitle");
    bairroTitle.innerHTML = "bairro: ";
    bairro.appendChild(bairroTitle);

    var bairroText = document.createElement("div");
    bairroText.setAttribute("class", "infoAddressText");
    bairroText.innerHTML = createAddressBairro.value;
    bairro.appendChild(bairroText);

    var cidade = document.createElement("div");
    cidade.setAttribute("class", "contentInfo");
    divAddressInfo.appendChild(cidade);

    var cidadeTitle = document.createElement("div");
    cidadeTitle.setAttribute("class", "infoAddressTitle");
    cidadeTitle.innerHTML = "cidade: ";
    cidade.appendChild(cidadeTitle);

    var cidadeText = document.createElement("div");
    cidadeText.setAttribute("class", "infoAddressText");
    cidadeText.innerHTML = createAddressCidade.value;
    cidade.appendChild(cidadeText);

    var estado = document.createElement("div");
    estado.setAttribute("class", "contentInfo");
    divAddressInfo.appendChild(estado);

    var estadoTitle = document.createElement("div");
    estadoTitle.setAttribute("class", "infoAddressTitle");
    estadoTitle.innerHTML = "estado: ";
    estado.appendChild(estadoTitle);

    var estadoText = document.createElement("div");
    estadoText.setAttribute("class", "infoAddressText");
    estadoText.innerHTML = createAddressEstado.value;
    estado.appendChild(estadoText);


    var inputCep = document.createElement("input");
    inputCep.setAttribute("type", "hidden");
    inputCep.setAttribute("name", "AddressesCEP[]");
    inputCep.setAttribute("value", createAddressCEP.value);

    var inputLogradouro = document.createElement("input");
    inputLogradouro.setAttribute("type", "hidden");
    inputLogradouro.setAttribute("name", "AddressesLogradouro[]");
    inputLogradouro.setAttribute("value", createAddressLogradouro.value);

    var inputBairro = document.createElement("input");
    inputBairro.setAttribute("type", "hidden");
    inputBairro.setAttribute("name", "AddressesBairro[]");
    inputBairro.setAttribute("value", createAddressBairro.value);

    var inputCidade = document.createElement("input");
    inputCidade.setAttribute("type", "hidden");
    inputCidade.setAttribute("name", "AddressesCidade[]");
    inputCidade.setAttribute("value", createAddressCidade.value);

    var inputEstado = document.createElement("input");
    inputEstado.setAttribute("type", "hidden");
    inputEstado.setAttribute("name", "AddressesEstado[]");
    inputEstado.setAttribute("value", createAddressEstado.value);
    

    var btnRemove = document.createElement("button");
    btnRemove.setAttribute("type", "button");
    btnRemove.setAttribute("class", "removeAddress");
    btnRemove.innerHTML = "Remover";
    divAddressRemove.appendChild(btnRemove);

    
    addresses.appendChild(li);
    li.appendChild(inputCep);
    li.appendChild(inputBairro);
    li.appendChild(inputLogradouro);
    li.appendChild(inputCidade);
    li.appendChild(inputEstado);
    

    createAddressCEP.value = "";
    createAddressLogradouro.value = "";
    createAddressEstado.value = "";
    createAddressCidade.value = "";
    createAddressBairro.value = "";

    addEventRemoveElement(btnRemove);
    
    if(addresses.querySelectorAll("li").length > 0){
        createBtn.removeAttribute("disabled");
    }
});

function getAddress(e){
    $.ajax({
        type:'get',
        url: "https://api.postmon.com.br/v1/cep/" + e,
        success: function(response){
            var createAddressLogradouro = newAddress.querySelector("#createAddressLogradouro");
            var createAddressBairro = newAddress.querySelector("#createAddressBairro");
            var createAddressCidade = newAddress.querySelector("#createAddressCidade");
            var createAddressEstado = newAddress.querySelector("#createAddressEstado");

            createAddressLogradouro.value = response.logradouro;
            createAddressBairro.value = response.bairro;
            createAddressCidade.value = response.cidade;
            createAddressEstado.value = response.estado_info.nome;
        },
    });
}