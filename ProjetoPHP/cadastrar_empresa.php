<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Empresa</title>
</head>
<body>
    <h2>Cadastrar Nova Empresa</h2>
    <form method="post" action="cadastrar_empresa.php">
        Nome: <input type="text" name="nome" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $conn = new mysqli('localhost', 'root', '', 'controle_funcionarios');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbl_empresa (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Empresa cadastrada com sucesso.";
    } else {
        echo "Erro ao cadastrar empresa: " . $conn->error;
    }

    $conn->close();
}
?>