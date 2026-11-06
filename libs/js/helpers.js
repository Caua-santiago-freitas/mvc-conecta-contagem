/*
|--------------------------------------------------------------------------
| SOMENTE NÚMEROS
|--------------------------------------------------------------------------
|
| Remove tudo que não seja número.
|
| Exemplo:
|
| somenteNumeros("123.456.789-00");
|
| Retorna:
|
| 12345678900
|
*/

function somenteNumeros(valor) {
  return valor.replace(/\D/g, "");
}


/*
|--------------------------------------------------------------------------
| PREÇO PARA BACKEND
|--------------------------------------------------------------------------
|
| Converte o preço brasileiro para o formato enviado ao backend.
|
| Exemplo:
|
| precoParaBackend("1.234,56");
|
| Retorna:
|
| 1234.56
|
*/

function precoParaBackend(valor) {
  return valor
    .replace(/\./g, "")
    .replace(",", ".");
}


/*
|--------------------------------------------------------------------------
| MOSTRAR MENSAGEM
|--------------------------------------------------------------------------
|
| Exibe uma mensagem utilizando Alert do Bootstrap.
|
| Tipos:
|
| success
| danger
| warning
| info
|
| Exemplo:
|
| mostrarMensagem(
|     mensagem,
|     "success",
|     "Cadastro realizado com sucesso."
| );
|
*/

function mostrarMensagem(elemento, tipo, texto) {
  elemento.className = `alert alert-${tipo} mt-3`;
  elemento.textContent = texto;
}


/*
|--------------------------------------------------------------------------
| LIMPAR VALIDAÇÃO
|--------------------------------------------------------------------------
|
| Remove as classes de validação do Bootstrap.
|
| Exemplo:
|
| limparValidacao(formulario);
|
*/

function limparValidacao(formulario) {
  $(formulario)
    .find(".form-control")
    .removeClass("is-valid is-invalid");
}