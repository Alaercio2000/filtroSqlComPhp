<?php
require("config.php");
require("funcoes.php");

if ($_POST) {
    if ($_POST['data']) {
        $filtro1 = utf8_encode("o.data = " . "'" . $_POST['data'] . "'");
    } else {
        $filtro1 = utf8_encode("o.data != " . "'" . $_POST['data'] . "'");
    }

    if ($_POST['bairro']) {
        $filtro2 = utf8_encode("b.nome = " . "'" . $_POST['bairro'] . "'");
    } else {
        $filtro2 = utf8_encode("b.nome != " . "'" . $_POST['bairro'] . "'");
    }

    if ($_POST['tipoOs']) {
        $filtro3 = utf8_encode("t.nome = " . "'" . $_POST['tipoOs'] . "'");
    } else {
        $filtro3 = utf8_encode("t.nome != " . "'" . $_POST['tipoOs'] . "'");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filtro Sql Com Php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #resultadoTable {
            max-height: 635px;
            overflow: auto;
            margin: 40px 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center py-4">Relatório De OS</h1>
        <form method="POST">
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-3 col-sm-4 my-2">
                    <label class="p-2" for="data">Data</label>
                    <select id="data" name="data" class="form-control">
                        <option value="">Sem Filtro</option>
                        <option value="2019-11-17">17/11/2019</option>
                        <option value="2019-11-18">18/11/2019</option>
                    </select>
                </div>
                <div class="col-lg-5 col-sm-8 my-2">
                <label class="p-2" for="bairro">Bairro</label>
                    <select id="bairro" name="bairro" class="form-control">
                        <option value="">Sem Filtro</option>
                        <?= trazerDados('bairros', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-8 my-2">
                <label class="p-2" for="tipoOs">Tipos De OS</label>
                    <select id="tipoOs" name="tipoOs" class="form-control">
                        <option value="">Sem Filtro</option>
                        <?= trazerDados('tipos_de_os', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="pt-5">
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <?php if (empty($filtro1) == false) : ?>
            <div id="resultadoTable" class="table-resposive">
                <table class="table text-center table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Endereço</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Duração(Prevista)</th>
                            <th scope="col">Duração(Real)</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= filtroSimples($pdo, $filtro1, $filtro2, $filtro3);  ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>
    </div>
</body>

</html>