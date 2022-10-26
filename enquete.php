<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=devweb", 'root', '');
?>

<h2>Enquetes Ativas:</h2>
<hr />

<?php

// setcookie('voto', 'true', time() - 60 * 60 * 24, '/');
if (isset($_POST['acao'])) {
    if (!isset($_COOKIE['voto'])) {
        if (!isset($_POST['resposta_id'])) {
            header('location: index.php');
            die();
        }
        setcookie('voto', 'true', time() + 60 * 60 * 24, '/');
        $resposta_id = $_POST['resposta_id'];
        $count = $pdo->prepare("SELECT votos FROM enquete WHERE id = ?");
        $count->execute(array($resposta_id));
        $atual = $count->fetch()['votos'] + 1;
        $pdo->exec("UPDATE enquete SET votos = $atual WHERE id = $resposta_id");
        echo '<h2>Sua votação foi computada com sucesso!</h2>';
    } else {
        echo '<h2>Você já votou!</h2>';
    }
}


$sql = $pdo->prepare("SELECT * FROM pergunta_enquete");
$sql->execute();
$pergunta_enquete = $sql->fetchAll();
foreach ($pergunta_enquete as $key => $value) {
    echo '<form method="post">';
    echo '<b>' . $value['pergunta'] . '</b>';
    $sql2 = $pdo->prepare("SELECT * FROM enquete WHERE enquete_id = $value[id]");
    $sql2->execute();
    $respostas = $sql2->fetchAll();
    echo '<br/>';
    foreach ($respostas as $key2 => $resposta) {
        echo $resposta['respostas'] . '<input type="radio" name="resposta_id" value="' . $resposta['id'] . '"/>';
        echo '<br />';
    }
    echo '<hr />';
    echo '<input type="submit" name="acao" value="Enviar Resposta" />';
    echo '</form>';
}
