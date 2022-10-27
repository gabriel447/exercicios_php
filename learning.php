<?php

session_start();
session_destroy();
$_SESSION['perguntas'][] = "Quanto custa o curso?";
$_SESSION['perguntas'][] = "Posso Parcelar?";

$_SESSION['respostas'][] = "R$200.00";
$_SESSION['respostas'][] = "Sim!";


if (isset($_POST['acao'])) {
    $pergunta = $_POST['pergunta'];
    foreach ($_SESSION['perguntas'] as $key => $value) {
        $pergunta = str_replace('?', '', $pergunta);
        $pergunta = str_replace(' ', '', $pergunta);
        $value = str_replace(' ', '', $value);
        $testar = preg_match('/' . $pergunta . '/i', $value);
        if ($testar) {
            $resposta = $_SESSION['respostas'][$key];
            break;
        }
    }
}

?>
<form method="post">
    <h2>Realize sua pergunta:</h2>
    <input type="text" name="pergunta">
    <input type="submit" name="acao" value="Enviar!">
    <?php
    if (isset($resposta)) {
        echo '<h2>Sua Resposta com base na pergunta, provavelmente é: </h2>' . $resposta;
    } else if (isset($_POST['acao']))
        echo '<h2>Ops... Nosso Robô não entendeu a sua pergunta :(</h2>' . $resposta;
    ?>
</form>