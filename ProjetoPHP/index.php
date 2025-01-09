<!DOCTYPE html>
<html>
<head>
    <title>Controle de Funcionários</title>
    <style>
        .blue { background-color: blue; color: white; }
        .red { background-color: red; color: white; }
    </style>
</head>
<body>
    <h2>Funcionários</h2>
    <a href="cadastrar_empresa.php">Cadastrar Nova Empresa</a><br>
    <a href="cadastrar_funcionario.php">Cadastrar Novo Funcionário</a><br>
    <a href="exportar_pdf.php">Exportar para PDF</a><br>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Empresa</th>
            <th>Data de Cadastro</th>
            <th>Salário</th>
            <th>Bonificação</th>
            <th>Ações</th>
        </tr>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'controle_funcionarios');

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $sql = "SELECT f.*, e.nome AS empresa FROM tbl_funcionario f JOIN tbl_empresa e ON f.id_empresa = e.id_empresa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data_cadastro = new DateTime($row["data_cadastro"]);
                $hoje = new DateTime();
                $intervalo = $hoje->diff($data_cadastro);
                $anos = $intervalo->y;

                $classe = '';
                if ($anos > 5) {
                    $classe = 'red';
                    $row["bonificacao"] = $row["salario"] * 0.20;
                } elseif ($anos > 1) {
                    $classe = 'blue';
                    $row["bonificacao"] = $row["salario"] * 0.10;
                }

                echo "<tr class='$classe'><td>" . $row["nome"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["rg"]. "</td><td>" . $row["email"]. "</td><td>" . $row["empresa"]. "</td><td>" . date('d/m/Y', strtotime($row["data_cadastro"])). "</td><td>R$ " . number_format($row["salario"], 2, ',', '.'). "</td><td>R$ " . number_format($row["bonificacao"], 2, ',', '.'). "</td><td><a href='editar_funcionario.php?id=" . $row["id_funcionario"]. "'>Editar</a> | <a href='excluir_funcionario.php?id=" . $row["id_funcionario"]. "'>Excluir</a></td></tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Nenhum funcionário encontrado</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
