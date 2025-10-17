<?php

require_once 'function.php';

$result = pg_query ($connection, "SELECT * FROM TBPESSOAS");
if ($result) {
     echo "Dados retornados com sucesso";
     
     echo "<table border='1'>
     <tr>
         <th>Codigo</th>
         <th>Nome</th>
         <th>Email</th>
         <th>Password</th>
         <th>Cidade</th>
         <th>Estado</th>
         <th>CEP</th>
    </tr>";

    $row = pg_fetch_assoc($result);
    while ($row) {
        echo "<tr>";
        echo "<td>" . $row['pescodigo'] . "</td>";
        echo "<td>" . $row['pesnome'] . "</td>";
        echo "<td>" . $row['pesemail'] . "</td>";
        echo "<td>" . $row['pespassword'] . "</td>";
        echo "<td>" . $row['pescidade'] . "</td>";
        echo "<td>" . $row['pesestado'] . "</td>";
        echo "<td>" . $row['pescep'] . "</td>";
        echo "</tr>";
        $row = pg_fetch_assoc($result);
    }
    echo "</table>";
} else {
    echo "erro na consulta";
}


?>