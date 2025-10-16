<?php

$connetionString = "host=localhost port=5432 dbname=local user=postgres password=unidavi";
$connection = pg_connect($connetionString);

if ($connection) {
    echo "banco de dados conectado com sucesso";

    $result = pg_query ($connection, "SELECT COUNT(*) AS QTDTABS FROM TBPESSOAS");
    if ($result) {
        $row = pg_fetch_assoc($result);
        echo "Quantidade de tabelas no banco de dados: " . $row['qtdtabs'];
    } else {
        echo "erro na consulta";
    }

    //inserção de dados no banco de dados
    $aDadosPessoa = array('Anderson', 'email@email.com', '1234', 'Rio do Sul', 'SC', '89162-820');
    $resultInsert = pg_query_params($connection, 'INSERT INTO TBPESSOAS (pesnome, pesemail, pespassword, pescidade, pesestado, pescep) VALUES ($1, $2, $3, $4, $5, $6)', $aDadosPessoa);
    if($resultInsert)  
    {
        echo "dados inseridos com sucesso";
    } else {
        echo "erro ao inserir dados";
    }
} else {
    echo "erro ao conectar no banco de dados";
}
?>