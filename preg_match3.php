<?php

//Vamos validar apenas o primeiro NOME

if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $verifica = preg_match('/^[A-Z]{1}[a-z]{1,}$/', $nome);
    if ($verifica) {
        echo 'Sucesso!';
    } else {
        echo 'NOME INVÁLIDO!';
    }
}

?>
<form method="post">
    <input placeholder="Insira o seu primeiro nome" type="text" name="nome">
    <input type="submit" name="acao" value="Enviar!">
</form>