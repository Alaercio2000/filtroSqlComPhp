<?php
require("config.php");
require("funcoes.php");
$rowResultado = 0;

if ($_POST) {
    if ($_POST['data']) {
        $filtro1 = "o.data = '" . $_POST['data'] . "'";
    } else {
        $filtro1 = "o.data != '" . $_POST['data'] . "'";
    }

    if ($_POST['bairro']) {
        $filtro2 = "b.nome = '" . $_POST['bairro'] . "'";
    } else {
        $filtro2 = "b.nome != '" . $_POST['bairro'] . "'";
    }

    if ($_POST['tipoOs']) {
        $filtro3 = utf8_encode("t.nome = '" . $_POST['tipoOs'] . "'");
    } else {
        $filtro3 = utf8_encode("t.nome != '" . $_POST['tipoOs'] . "'");
    }

    if ($_POST['duracaoPrev']) {
        $filtro4 = "o.duracao_prev " . $_POST['duracaoPrev'] . "";
    } else {
        $filtro4 = "o.duracao_prev != '0' ";
    }

    if ($_POST['duracaoReal']) {
        $filtro5 = "o.duracao_real " . $_POST['duracaoReal'] . "";
    } else {
        $filtro5 = "o.duracao_real != '0'";
    }

    if ($_POST['valor']) {
        $filtro6 = "o.valor " . $_POST['valor'] . "";
    } else {
        $filtro6 = "o.valor != '0'";
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
                <div class="col-lg-3 col-md-6 my-2">
                    <label class="p-2" for="data">Data</label>
                    <select id="data" name="data" class="form-control">
                        <option value="">Sem Filtro</option>
                        <option value="2019-11-17">17/11/2019</option>
                        <option value="2019-11-18">18/11/2019</option>
                    </select>
                </div>
                <div class="col-lg-5 col-md-6 my-2">
                    <label class="p-2" for="bairro">Bairro</label>
                    <select id="bairro" name="bairro" class="form-control">
                        <option value="">Sem Filtro</option>
                        <?= trazerDados('bairros', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 my-2">
                    <label class="p-2" for="tipoOs">Tipos De OS</label>
                    <select id="tipoOs" name="tipoOs" class="form-control">
                        <option value="">Sem Filtro</option>
                        <?= trazerDados('tipos_de_os', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 my-2">
                    <label class="p-2" for="prev">Duração(Prevista)</label>
                    <select id="prev" name="duracaoPrev" class="form-control">
                        <option value="">Sem Filtro</option>
                        <option value="< 100">Menor que 100</option>
                        <option value="BETWEEN 100 AND 200">100 a 200</option>
                        <option value="BETWEEN 201 AND 300">201 a 300</option>
                        <option value="BETWEEN 301 AND 400">301 a 400</option>
                        <option value=" > 400">Maior que 400</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 my-2">
                    <label class="p-2" for="real">Duração(Real)</label>
                    <select id="real" name="duracaoReal" class="form-control">
                        <option value="">Sem Filtro</option>
                        <option value="< 100">Menor que 100</option>
                        <option value="BETWEEN 100 AND 200">100 a 200</option>
                        <option value="BETWEEN 201 AND 300">201 a 300</option>
                        <option value="BETWEEN 301 AND 400">301 a 400</option>
                        <option value=" > 400">Maior que 400</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 my-2">
                    <label class="p-2" for="valor">Valor</label>
                    <select id="valor" name="valor" class="form-control">
                        <option value="">Sem Filtro</option>
                        <option value="< 10000">Menor que 10.000,00</option>
                        <option value="BETWEEN 10000 AND 20000">10.000,00 a 20.000,00</option>
                        <option value="BETWEEN 20001 AND 30000">20.000,01 a 30.000,00</option>
                        <option value="BETWEEN 30001 AND 40000">30.000,01 a 40.000,00</option>
                        <option value=" > 40000">Maior que 40.000,00</option>
                    </select>
                </div>

                <div class="pt-5">
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <div class="row flex-column-reverse">
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
                            <?= filtroSimples($pdo, $filtro1, $filtro2, $filtro3, $filtro4, $filtro5, $filtro6);  ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    Total de resultados : <?= $rowResultado ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</body>

</html>