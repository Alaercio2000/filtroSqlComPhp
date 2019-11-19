<?php

function filtroSimples($table , $pdo){
    $sql = "SELECT * FROM $table";
    $sql = $pdo->query($sql);
    foreach ($sql->fetchAll() as $value) {
        echo ("<tr>");
        echo("<td scope='col'>". $value[1] ."</td>");
        echo("<td scope='col'>". $value[2] ."</td>");
        echo("<td scope='col'>". $value[3] ."</td>");
        echo("<td scope='col'>". $value[4] ."</td>");
        echo("<td scope='col'>". $value[5] ."</td>");
        echo("<td scope='col'>". $value[6] ."</td>");
        echo("<td scope='col'>". $value[7] ."</td>");
        echo ("</tr>");
    }
}

function trazerDados($table , $nomeCampo , $pdo){
    $sql = "SELECT * FROM $table ;";
    $sql = $pdo->query($sql);
    foreach ($sql->fetchAll() as $value) {
        echo('<option>'. $value[$nomeCampo].'</option>');
    }
}