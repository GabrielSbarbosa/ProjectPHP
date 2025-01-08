<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h2>Cadastrar Novo Funcionário</h2>
    <form method="post" action="cadastrar_funcionario.php">
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required><br>
        RG: <input type="text" name="rg" required><br>
        Email: <input type="email" name="email" required><br>
        Empresa: 
        <select name="id_empresa" required>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'controle_funcionarios');

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql = "SELECT id_empresa, nome FROM tbl_empresa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_empresa"]. "'>" . $row["nome"]. "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma empresa encontrada</option>";
            }

            $conn->close();
            ?>
        </select><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $id_empresa = $_POST['id_empresa'];

    $conn = new mysqli('localhost', 'root', '', 'controle_funcionarios');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbl_funcionario (nome, cpf, rg, email, id_empresa) VALUES ('$nome', '$cpf', '$rg', '$email', '$id_empresa')";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar funcionário: " . $conn->error;
    }

    $conn->close();
}
?>