<?php

function filtroSimples($pdo, $filtro1 = "" , $filtro2 = "" ,$filtro3 = "")
{
    $sql = "SELECT
                o.endereco,
                b.nome,
                t.nome,
                o.duracao_prev,
                o.duracao_real,
                o.valor,
                o.data
            FROM   
                (
                oss o
                INNER JOIN bairros b ON o.id_bairro=b.id
                INNER JOIN tipos_de_os t ON o.id_tipo=t.id
                )
                WHERE $filtro1 AND $filtro2 AND $filtro3
                ;
            ";

    $sql = $pdo->query($sql);
    foreach ($sql->fetchAll() as $value) {
        echo ("<tr>");
        echo utf8_encode(("<td scope='col'>" . $value[0] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[1] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[2] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[3] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[4] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[5] . "</td>"));
        echo utf8_encode(("<td scope='col'>" . $value[6] . "</td>"));
        echo ("</tr>");
    }
}

function trazerDados($table, $nomeCampo, $pdo)
{
    $sql = "SELECT * FROM $table ;";
    $sql = $pdo->query($sql);
    foreach ($sql->fetchAll() as $value) {
        echo utf8_encode(("<option value='".$value[$nomeCampo]."'>" . $value[$nomeCampo] . "</option>"));
    }
}