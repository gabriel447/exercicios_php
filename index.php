<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=devweb", 'root', '');

?>

<h2>Enquetes Ativas:</h2>
<hr />

<?php

$sql = $pdo->prepare("SELECT * FROM pergunta_enquete");
$sql->execute();
$pergunta_enquete = $sql->fetchAll();
foreach ($pergunta_enquete as $key => $value) {
    echo '<b>' . $value['pergunta'] . '</b>';
}

?>