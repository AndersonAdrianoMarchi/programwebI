<?php

    require_once 'pessoa.php';

    $pessoa = new Pessoa();
    $pessoa->nome = "João";
    $pessoa->sobrenome = "Silva";

    echo $pessoa->getNomeCompleto();

?>