<?php

if (isset($_POST['acao'])) {
    $respostas = array('28', 'Gabriel', 'Programar');
    $pontos = 0;
    $index = 0;
    foreach ($_POST as $key => $value) {
        if ($key != 'acao') {
            if ($respostas[$index] == $value) {
                $pontos++;
            }
            $index++;
        }
    }
    echo '<h2>O seu resultado final foi: </h2>' . $pontos . '/' . ($index);
}

?>

<form method="post">
    <p>QUANTOS ANOS EU TENHO ?</p>
    <span>28</span><input type="radio" name="pergunta1" value="28">
    <br />
    <span>30</span><input type="radio" name="pergunta1" value="30">
    <br />
    <span>24</span><input type="radio" name="pergunta1" value="24">
    <hr />
    <p>QUAL É O MEU NOME?</p>
    <span>Felipe</span><input type="radio" name="pergunta2" value="Felipe">
    <br />
    <span>Gabriel</span><input type="radio" name="pergunta2" value="Gabriel">
    <br />
    <span>Davi</span><input type="radio" name="pergunta2" value="Davi">
    <hr />
    <p>O QUE EU GOSTO DE FAZER ?</p>
    <span>Jogar</span><input type="radio" name="pergunta3" value="Jogar">
    <br />
    <span>Esportes</span><input type="radio" name="pergunta3" value="Esportes">
    <br />
    <span>Programar</span><input type="radio" name="pergunta3" value="Programar">
    <hr />
    <input type="submit" name="acao" value="enviar">
</form>