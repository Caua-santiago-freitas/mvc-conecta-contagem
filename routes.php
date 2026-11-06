<?php
//definir url do  projeto
//http://localhost/projetos-michelle/mvc/a_projeto_mvc_funcoes/index.php?page=produtos

//definir páginas válidas no projeto
$paginasValidas = [
    "landing" => __DIR__ . "/views/landing.php",
    "home" => __DIR__ . "/views/home.php",
    "login" => __DIR__ . "/views/login.php",
    "produtos" => __DIR__ . "/views/produto.php",
    "clientes" => __DIR__ . "/views/cliente.php",
    "funcionarios" => __DIR__ . "/views/funcionario.php",
];

// Capturar a página informada na url 
$page = $_GET["page"] ?? "landing";

//Verificar se a página existe
if (array_key_exists($page, $paginasValidas)) {
    require $paginasValidas[$page];
} else {
    http_response_code(404);
    require __DIR__ . "/views/404.php";
}
