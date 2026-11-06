<?php
// Como importar no php: 
// require __DIR__ . "/../libs/php/helpers.php"; 


/*
|--------------------------------------------------------------------------
| SOMENTE NÚMEROS
|--------------------------------------------------------------------------
|
| Remove pontos, traços, barras, espaços e outros caracteres.
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

function somenteNumeros($valor)
{
    return preg_replace("/\D/", "", $valor);
}


/*
|--------------------------------------------------------------------------
| DATA PARA BANCO
|--------------------------------------------------------------------------
|
| Converte uma data brasileira para o formato utilizado no banco.
|
| Exemplo:
|
| dataParaBanco("25/12/2026");
|
| Retorna:
|
| 2026-12-25
|
*/

function dataParaBanco($data)
{
    $partes = explode("/", $data);

    if (count($partes) !== 3) {
        return null;
    }

    $dia = $partes[0];
    $mes = $partes[1];
    $ano = $partes[2];

    return "$ano-$mes-$dia";
}


/*
|--------------------------------------------------------------------------
| DATA PARA BRASIL
|--------------------------------------------------------------------------
|
| Converte uma data do banco para o formato brasileiro.
|
| Exemplo:
|
| dataParaBrasil("2026-12-25");
|
| Retorna:
|
| 25/12/2026
|
*/

function dataParaBrasil($data)
{
    $partes = explode("-", $data);

    if (count($partes) !== 3) {
        return null;
    }

    $ano = $partes[0];
    $mes = $partes[1];
    $dia = $partes[2];

    return "$dia/$mes/$ano";
}


/*
|--------------------------------------------------------------------------
| PREÇO PARA BANCO
|--------------------------------------------------------------------------
|
| Converte um preço no formato brasileiro para o formato numérico.
|
| Exemplo:
|
| precoParaBanco("1.234,56");
|
| Retorna:
|
| 1234.56
|
*/

function precoParaBanco($valor)
{
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);

    return $valor;
}


/*
|--------------------------------------------------------------------------
| PREÇO PARA BRASIL
|--------------------------------------------------------------------------
|
| Converte um valor numérico para o formato brasileiro.
|
| Exemplo:
|
| precoParaBrasil(1234.56);
|
| Retorna:
|
| 1.234,56
|
*/

function precoParaBrasil($valor)
{
    return number_format($valor, 2, ",", ".");
}


/*
|--------------------------------------------------------------------------
| LIMPAR TEXTO
|--------------------------------------------------------------------------
|
| Remove espaços no início e no final do texto.
|
| Exemplo:
|
| limparTexto("   Maria Silva   ");
|
| Retorna:
|
| Maria Silva
|
*/

function limparTexto($valor)
{
    return trim($valor);
}