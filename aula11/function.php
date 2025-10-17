<?php

function connectDatabase() {
    $connetionString = "host=localhost port=5432 dbname=local user=postgres password=unidavi";
    $connection = pg_connect($connetionString);
}

?>