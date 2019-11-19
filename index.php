<?php
require("config.php");
require("funcoes.php");
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
        #resultadoTable{
            max-height: 600px;
            overflow: auto;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST">
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-2 col-sm-4 my-2">
                    <select class="form-control">
                        <option>Data</option>
                        <option>17/11/2019</option>
                        <option>18/11/2019</option>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-8 my-2">
                    <select class="form-control">
                        <option>Bairro</option>
                        <?= trazerDados('bairros', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="col-lg-2 col-sm-4 my-2">
                    <select class="form-control">
                        <option>Equipe</option>
                        <?= trazerDados('equipes', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-8 my-2">
                    <select class="form-control">
                        <option>Tipos De OS</option>
                        <?= trazerDados('tipos_de_os', 'nome', $pdo); ?>
                    </select>
                </div>
                <div class="pt-5">
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <div id="resultadoTable" class="table-resposive">
            <table class="table text-center table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Endereco</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Duração(Prevista)</th>
                        <th scope="col">Duração(Real)</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody class=" table-hover">
                    <?= filtroSimples('oss',$pdo) ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>