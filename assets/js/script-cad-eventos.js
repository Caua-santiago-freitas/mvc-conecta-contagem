const formulario = document.getElementById("formEvento");

formulario.addEventListener("submit", function (event) {    
   
    //impede que a página recarregue
    event.preventDefault();

    //pega o valor do input
    const titulo = document.getElementById("titulo");
    const data = document.getElementById("data");
    const descricao = document.getElementById("descricao");
    const rua = document.getElementById("rua")
    const numero = document.getElementById("numero")
    const cidade = document.getElementById("cidade")
    const cep = document.getElementById("cep")
    const latitude = document.getElementById("latitude")
    const longitude = document.getElementById("longitude")
    const alertaSucesso = document.getElementById("alertaSucesso")
    

    let validado = true; 

    if (titulo.value.trim() == "") {
        validado = false; 
        titulo.classList.add("is-invalid");
        titulo.classList.remove("is-valid");
    } else {
        titulo.classList.add("is-valid");
        titulo.classList.remove("is-invalid");
    }

    if (data.value.trim() == "") {
        validado = false; 
        data.classList.add("is-invalid");
        data.classList.remove("is-valid");
    } else {
        data.classList.add("is-valid");
        data.classList.remove("is-invalid");

    }

    if (descricao.value.trim() == "") {
        validado = false; 
        descricao.classList.add("is-invalid");
        descricao.classList.remove("is-valid")
    } else {
        descricao.classList.add("is-valid");
        descricao.classList.remove("is-invalid");
    }

    if (rua.value.trim() == "") {
        validado = false; 
        rua.classList.add("is-invalid");
        rua.classList.remove("is-valid");
    } else {
        rua.classList.add("is-valid");
        rua.classList.remove("is-invalid");
    }

    if (numero.value.trim() == "") {
        validado = false; 
        numero.classList.add("is-invalid");
        numero.classList.remove("is-valid");
    } else {
        numero.classList.add("is-valid");
        numero.classList.remove("is-invalid");
    }

    if (cidade.value.trim() == "") {
        validado = false; 
        cidade.classList.add("is-invalid");
        cidade.classList.remove("is-valid");
    } else {
        cidade.classList.add("is-valid");
        cidade.classList.remove("is-invalid");
    }

    if (cep.value.trim() == "") {
        validado = false; 
        cep.classList.add("is-invalid");
        cep.classList.remove("is-valid");
    } else {
        cep.classList.add("is-valid");
        cep.classList.remove("is-invalid");
    }

    if (latitude.value.trim() == "") {
        validado = false; 
        latitude.classList.add("is-invalid");
        latitude.classList.remove("is-valid");
    } else {
        latitude.classList.add("is-valid");
        latitude.classList.remove("is-invalid");
    }

    if (longitude.value.trim() == "") {
        validado = false; 
        longitude.classList.add("is-invalid");
        longitude.classList.remove("is-valid");
    } else {
        longitude.classList.add("is-valid");
        longitude.classList.remove("is-invalid");
    }

    if(validado == true){
        alertaSucesso.classList.remove("d-none");
        
    }


}); 