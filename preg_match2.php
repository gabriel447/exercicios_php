<?php

//Vamos validar CELULAR

if (isset($_POST['acao'])) {
    $tel = $_POST['tel'];
    $verifica = preg_match('/^(\([1-9]{2}\)|)[0-9]{5}-[0-9]{4}$/', $tel);
    if ($verifica) {
        echo 'Sucesso!';
    } else {
        echo 'TELEFONE INVÁLIDO!';
    }
}

?>
<form method="post">
    <input placeholder="Insira o telefone!" type="text" name="tel">
    <input type="submit" name="acao" value="Enviar!">
</form>