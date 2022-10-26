<?php

session_start();

$perguntas = ['Qual seu nome?', 'Qual sua idade?', 'Qual sua cor favorita?', 'Qual seu melhor amigo?'];
$_SESSION['respostas'] = array();

if (isset($_POST['acao'])) {
    $_SESSION['respostas'][$_POST['count']] = $_POST['resposta'];
    if (count($perguntas) == $_POST['count'] + 1) {
        header('Location: resultado.php');
    }
}

$index = isset($_POST['count']) ? (int)$_POST['count'] + 1 : 0;

?>

<form method="post">
    <h2><?php echo $perguntas[$index] ?></h2>
    <input type="text" name="resposta" style="width: 100%; height: 20px;">
    <br />
    <input type="submit" name='acao' value="Enviar Resposta e ir para a próxima pergunta!">
    <input type="hidden" name="count" value="<?php echo $index; ?>">
</form>