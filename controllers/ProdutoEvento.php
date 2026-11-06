<?php

// A resposta será enviada em formato JSON
header("Content-Type: application/json; charset=utf-8");

// Carrega a classe Validator
require __DIR__ . "/../libs/php/Validator.php";

// Carrega as funções auxiliares
require __DIR__ . "/../libs/php/helpers.php";

// Carrega as constantes
require __DIR__ . "/../config/constants.php";

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido. Utilize uma requisição POST.", //uso da constante: echo ERRO_POST;
        "dados" => null,
        "erros" => null
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// Cria o objeto validador
$validator = new Validator($_POST);


// Executa as regras de validação
validarCadastro($validator);


// Verifica se existem erros de validação
if ($validator->fails()) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Corrija os campos indicados.",
        "dados" => null,
        "erros" => $validator->errors()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// -------->>> TODO: Aqui será realizado o cadastro no banco de dados


// Retorna sucesso
http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Produto cadastrado com sucesso (controllerProduto).",
    "dados" => $validator->data(),
    "erros" => null
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit;


// --------------------------------------------------
// Funções auxiliares
// --------------------------------------------------

function validarCadastro($validator)
{
    // Nome
    $validator->required(
        "nome",
        "O nome do produto é obrigatório."
    );

    $validator->string(
        "nome",
        "O nome do produto deve ser um texto válido."
    );

    $validator->minLength(
        "nome",
        3,
        "O nome do produto deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "nome",
        100,
        "O nome do produto deve conter no máximo 100 caracteres."
    );


    // Categoria
    $validator->required(
        "categoria",
        "A categoria do produto é obrigatória."
    );

    $validator->string(
        "categoria",
        "A categoria do produto deve ser um texto válido."
    );

    $validator->minLength(
        "categoria",
        3,
        "A categoria do produto deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "categoria",
        100,
        "A categoria do produto deve conter no máximo 100 caracteres."
    );


    // Preço
    $validator->required(
        "preco",
        "O preço do produto é obrigatório."
    );

    $validator->numeric(
        "preco",
        "O preço do produto deve ser um valor numérico válido."
    );

    $validator->min(
        "preco",
        0.01,
        "O preço do produto deve ser maior que zero."
    );


    // Quantidade
    $validator->required(
        "quantidade",
        "A quantidade do produto é obrigatória."
    );

    $validator->integer(
        "quantidade",
        "A quantidade do produto deve ser um número inteiro."
    );

    $validator->min(
        "quantidade",
        1,
        "A quantidade do produto deve ser maior ou igual a 1."
    );
}