const formulario = document.getElementById("newsletter");

formulario.addEventListener("submit", function(event){
    //impede que a página recarregue
    event.preventDefault();

    //pega o valor do input
    const email = document.getElementById("email").ariaValueMax;

    alert("E-mail cadastrado; " + email);
});