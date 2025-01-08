# Controle de Funcionários

Este é um sistema simples para o controle de funcionários, desenvolvido com PHP, MySQL e JavaScript. O projeto foi criado com o objetivo de gerenciar empresas e seus funcionários de forma intuitiva, atendendo a requisitos básicos de autenticação e cadastro.

---

## 🚀 Funcionalidades

- **Login e Autenticação**
  - Validação de email e senha.
  - Exibição de mensagens de sucesso ou erro no login.

- **Gerenciamento de Funcionários**
  - Cadastro de funcionários com nome, CPF, RG, email e associação a uma empresa.
  - Listagem de todos os funcionários cadastrados na tela inicial.

- **Gerenciamento de Empresas**
  - Cadastro de novas empresas com nome.
  - Associação de funcionários a empresas existentes.

---

## 🔧 Tecnologias Utilizadas

- **Backend:** PHP (sem frameworks)
- **Banco de Dados:** MySQL
- **Frontend:** HTML5, CSS3 e JavaScript

---

## 📉 Requisitos

- Servidor com suporte a PHP 7.4 ou superior.
- Banco de Dados MySQL configurado.
- Navegador moderno para acessar o sistema.

---

## 📋 Instalação e Configuração

1. Clone este repositório:
   ```bash
   git clone https://github.com/seuusuario/nome-do-repositorio.git

2. Configure o banco de dados:

Crie o banco de dados controle_funcionarios.
Execute o script SQL de criação de tabelas:

CREATE TABLE tbl_usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(20),
    senha VARCHAR(20)
);

CREATE TABLE tbl_empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40)
);

CREATE TABLE tbl_funcionario (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    cpf VARCHAR(11),
    rg VARCHAR(20),
    email VARCHAR(30),
    id_empresa INT,
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
);

INSERT INTO tbl_usuario (login, senha) VALUES ('teste@gmail.com.br', '1234');

3. Configure o arquivo config.php com as credenciais do seu banco de dados:

<?php
$host = 'localhost';
$user = 'seu_usuario';
$password = 'sua_senha';
$dbname = 'controle_funcionarios';
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

4. Acesse o sistema via navegador:
 .  URL: http://localhost/controle_funcionarios



