// PROJETO USANDO JQUERY

$(document).ready(function () {
  // Aplica as máscaras nos campos
  aplicarMascaras();

  // Configura a validação e o envio
  validarFormulario();
});

function aplicarMascaras() {
  // Preço no formato: 1.234,56
  $("#preco").mask("000.000.000,00", {
    reverse: true,
  });

  // Permite até 6 números
  $("#quantidade").mask("000000");
}

function validarFormulario() {

  // Seleciona a div responsável pelas mensagens
  const mensagem = document.getElementById("mensagem");

  // Impede o formulário de recarregar a página
  $("#formEvento").on("submit", function (evento) {
    evento.preventDefault();
  });

  // Configura o jQuery Validation
  $("#formEvento").validate({
    // Regras de validação
    rules: {
      titulo: {
        required: true,
        minlength: 8,
      },
      data: {
        required: true,
        minlength: 8,
      },
      descricao: {
        required: true,
      },
      rua: {
        required: true,
        digits: true,
        min: 2,
      },
      numero: {
        required: true,
      },
      cidade: {
        required: true,
      },
      cep: {
        required: true,
      },
      longitude: {
        required: true,
      },

      latitude: {
        required: true,
      },


    },

    // Mensagens em português
    messages: {
      nome: {
        required: "Informe o nome do evento.",
        minlength: "O nome deve ter pelo menos 8 caracteres.",
      },
      data: {
        required: "Informe a data do evento.",
        minlength: "A categoria deve ter pelo menos 8 caracteres.",
      },
      descricao: {
        required: "Informe a descrição do evento.",
      },
      rua: {
        required: "Informe a rua do evento.",
      },
      numero: {
        required: "Informe o número do evento.",
        digits: "Digite somente números inteiros.",
        min: "A quantidade deve ser maior ou igual a 1.",
      },
      cidade: {
        required: "Informe o nome da cidade.",
      },
      cep: {
        required: "Informe o cep do evento.",
        digits: "Digite somente números inteiros.",
        min: "A quantidade deve ser maior ou igual a 1.",
      },
      longitude: {
        required: "Informe a longitude do evento.",
        digits: "Digite somente números inteiros.",
        min: "A quantidade deve ser maior ou igual a 1.",
      },
      latitude: {
        required: "Informe a latitude do evento."
      },
    },

    // Mensagens de erro
    errorPlacement: function (error, element) {
      element.closest(".mb-3").find(".invalid-feedback").text(error.text());
    },

    // Executado quando o campo está inválido
    highlight: function (element) {
      $(element).removeClass("is-valid").addClass("is-invalid");
    },

    // Executado quando o campo está válido
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    },

    // Executado somente quando todos os campos forem válidos
    submitHandler: async function (formulario) {
      // Captura os dados do formulário
      const dados = new FormData(formulario);

      //Mostra os dados no console
      console.table(Object.fromEntries(dados.entries()));

      // Exibe mensagem enquanto envia
      mensagem.className = "alert alert-info mt-3";
      mensagem.textContent = "Enviando dados...";

      try {
        // Envia os dados para o Controller
        const resposta = await fetch("controllers/EventoController.php", {
          method: "POST",
          body: dados,
        });

        // Converte a resposta JSON
        const resultado = await resposta.json();

        //console.log(resultado);

        // Verifica se ocorreu erro HTTP
        if (!resposta.ok) {
          mensagem.className = "alert alert-danger mt-3";
          let conteudo = `<strong>${resultado.mensagem}</strong>`;
          if (resultado.erros) {
            conteudo += "<ul class='mb-0 mt-2'>";
            Object.entries(resultado.erros).forEach(function ([campo, erros]) {
              erros.forEach(function (erro) {
                conteudo += `<li>${erro}</li>`;
              });
            });
            conteudo += "</ul>";
          }

          mensagem.innerHTML = conteudo;

          return;
        }

        // Exibe mensagem de sucesso
        mensagem.className = "alert alert-success mt-3";
        mensagem.textContent = resultado.mensagem;

        // Limpa os campos
        formulario.reset();

      } catch (erro) {
        mensagem.className = "alert alert-danger mt-3";
        mensagem.textContent =
          "Erro ao enviar os dados para o controller de produto."; //Uso da constante: MSG_ERRO

        console.error(erro);
      }
    },
  });

  // Quando o formulário for limpo
  $("#formEvento").on("reset", function () {
    // Remove as classes de validação
    $(this).find(".form-control").removeClass("is-valid is-invalid");
  });
}
