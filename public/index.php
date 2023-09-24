<?php

use app\database\model\Empresa;

require '../vendor/autoload.php';
require "../app/database/Connection.php";

$empresa = new Empresa;
$empresas = $empresa->all('id,nome, cnpj,data_abertura, endereco');
// echo "<pre>";
// var_dump($empresas);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Empresa</title>
</head>

<body>
    <header>
        <h1>Listar e Cadastrar</h1>
    </header>
    <section>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Data_Abertura</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresas as $empresa) :  ?>
                    <tr>
                        <th> <?php echo $empresa->id; ?></th>
                        <td><?php echo $empresa->nome; ?></td>
                        <?php if($empresa->CNPJIsValid()) : ?>
                            <td> <?php echo $empresa->cnpj; ?></td>
                        <?php else: ?>
                            CNPJ invalid
                        <?php endif ?>
                        <td> <?php echo $empresa->data_abertura; ?></td>
                        <td> <?php echo $empresa->endereco; ?></td>
                        <td> <a href="cadastrar.php">Cadastrar</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <!-- <ul>
            <?php foreach ($empresas as $empresa) :  ?>
                <li>
                    <?php echo $empresa->nome; ?>
                    <?php echo $empresa->cnpj; ?>
    
                </li>
            <?php endforeach; ?>
        </ul> -->
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>