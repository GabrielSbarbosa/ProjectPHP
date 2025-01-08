<!DOCTYPE html>
<html>
<head>
    <title>Controle de Funcionários</title>
</head>
<body>
    <h2>Funcionários</h2>
    <a href="cadastrar_empresa.php">Cadastrar Nova Empresa</a><br>
    <a href="cadastrar_funcionario.php">Cadastrar Novo Funcionário</a><br>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Empresa</th>
        </tr>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'controle_funcionarios');

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $sql = "SELECT f.nome, f.cpf, f.rg, f.email, e.nome AS empresa FROM tbl_funcionario f JOIN tbl_empresa e ON f.id_empresa = e.id_empresa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["rg"]. "</td><td>" . $row["email"]. "</td><td>" . $row["empresa"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum funcionário encontrado</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>