<?php

// $valor1 = $_GET['valor1'];
// $valor2 = $_GET['valor2'];
// $sinal = $_GET['sinal'];

// if ($sinal == 'mais') {
//     $resultado = $valor1 + $valor2;
// } else if ($sinal == 'menos') {
//     $resultado = $valor1 - $valor2;
// }

// echo $resultado;

// http://localhost/exercicios_php/?valor1=10&valor2=20&sinal=mais
// http://localhost/exercicios_php/?valor1=10&valor2=10&sinal=menos

$valor = $_GET['valor'];
$sinal = $_GET['sinal'];

$resultado = 0;
if ($sinal == 'mais') {
    foreach ($valor as $key => $value) {
        $resultado += $value;
    }
}

echo $resultado;

// http://localhost/exercicios_php/?valor[]=10&valor[]=20&valor[]=30&sinal=mais