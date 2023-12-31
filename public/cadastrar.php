<?php


use app\database\entity\EmpresaEntity;
use app\database\model\Empresa;

require '../vendor/autoload.php';
require "../app/database/Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dataAtual = new DateTime();
    $dataFormatada = date_format($dataAtual, 'Y-m-d');

    $empresa = new Empresa;
    $empresaEntity = new EmpresaEntity;
    $empresaEntity->nome = $_POST['nome'];
    $empresaEntity->cnpj = $_POST['cnpj'];
    $empresaEntity->data_abertura = $dataFormatada;
    $empresaEntity->endereco = $_POST['endereco'];
    $empresas = $empresa->create($empresaEntity);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Cadastrar Empresa</h1>
    </header>
    <main>

        <h2>Cadastro</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" required><br><br>

            <label for="Endereco">Endereco:</label>
            <input type="text" name="endereco" id="endereco" required><br><br>

            <input type="submit" name="submit" value="Cadastrar">
            <p><a href="javascript:history.go(-1)">Voltar</a></p>
        </form>

    </main>
</body>

</html>