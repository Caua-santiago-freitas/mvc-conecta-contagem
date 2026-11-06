// LOGIN USANDO JQUERY

$(document).ready(function () {
  
  //Não se aplica nesta página
  //aplicarMasca    ras();

  // Configura a validação do formulário
  validarFormulario();

});


function validarFormulario() {

  // Seleciona a div responsável pelas mensagens
  const mensagem = document.getElementById("mensagem");


  // Configura o jQuery Validation
  $("#formLogin").validate({

    // Regras de validação
    rules: {

      email: {
        required: true,
        email: true,
      },

      senha: {
        required: true,
        minlength: 6,
      },

    },


    // Mensagens em português
    messages: {

      email: {
        required: "Informe o e-mail.",
        email: "Informe um e-mail válido.",
      },

      senha: {
        required: "Informe a senha.",
        minlength: "A senha deve possuir no mínimo 6 caracteres.",
      },

    },


    // Mensagens de erro
    errorPlacement: function (error, element) {

      element
        .closest(".mb-3")
        .find(".invalid-feedback")
        .text(error.text());

    },


    // Campo inválido
    highlight: function (element) {

      $(element)
        .removeClass("is-valid")
        .addClass("is-invalid");

    },


    // Campo válido
    unhighlight: function (element) {

      $(element)
        .removeClass("is-invalid")
        .addClass("is-valid");

    },


    // Executado quando o formulário estiver válido
    submitHandler: async function (formulario) {

      // Captura os dados
      const dados = new FormData(formulario);


      // Mostra os dados no console
      console.table(
        Object.fromEntries(dados.entries())
      );


      // Exibe mensagem
      mensagem.className = "alert alert-info mt-3";
      mensagem.textContent = "Verificando dados...";


      /*
       * Próxima etapa:
       *
       * Enviar os dados para:
       *
       * controllers/LoginController.php
       *
       */

    },

  });

}