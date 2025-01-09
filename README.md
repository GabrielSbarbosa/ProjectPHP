
```markdown
# Projeto de Controle de Funcionários

Este projeto é um sistema simples de controle de funcionários desenvolvido em PHP, MySQL e JavaScript. O objetivo é gerenciar empresas e seus funcionários, com funcionalidades de login, cadastro, listagem e exportação para PDF.

## Pré-requisitos

- PHP
- MySQL
- Conhecimentos básicos em JavaScript

## Estrutura do Banco de Dados

O banco de dados possui as seguintes tabelas:

### Tabela `tbl_usuario`

| Campo     | Tipo         | Descrição              |
|-----------|--------------|------------------------|
| id_usuario| INT          | Chave primária         |
| login     | VARCHAR(50)  | Login do usuário       |
| senha     | VARCHAR(32)  | Senha do usuário (MD5) |

### Tabela `tbl_empresa`

| Campo     | Tipo         | Descrição              |
|-----------|--------------|------------------------|
| id_empresa| INT          | Chave primária         |
| nome      | VARCHAR(40)  | Nome da empresa        |

### Tabela `tbl_funcionario`

| Campo        | Tipo         | Descrição              |
|--------------|--------------|------------------------|
| id_funcionario| INT         | Chave primária         |
| nome         | VARCHAR(50)  | Nome do funcionário    |
| cpf          | VARCHAR(11)  | CPF do funcionário     |
| rg           | VARCHAR(20)  | RG do funcionário      |
| email        | VARCHAR(30)  | Email do funcionário   |
| id_empresa   | INT          | Chave estrangeira (empresa) |
| data_cadastro| DATE         | Data de cadastro       |
| salario      | DOUBLE(10,2) | Salário do funcionário |
| bonificacao  | DOUBLE(10,2) | Bonificação do funcionário |

## Configuração do Banco de Dados

Execute o seguinte script SQL para criar as tabelas e inserir o usuário de teste:

```sql
CREATE DATABASE controle_funcionarios;

USE controle_funcionarios;

CREATE TABLE tbl_usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE tbl_empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL
);

CREATE TABLE tbl_funcionario (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    rg VARCHAR(20) NOT NULL,
    email VARCHAR(30) NOT NULL,
    id_empresa INT,
    data_cadastro DATE NOT NULL,
    salario DOUBLE(10,2) NOT NULL,
    bonificacao DOUBLE(10,2),
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
);

INSERT INTO tbl_usuario (login, senha) VALUES ('teste@gmail.com.br', MD5('1234'));
```

## Funcionalidades

### Página de Login

- Validação de email e senha.
- Mensagem de sucesso ou falha no login.

### Página Inicial

- Listagem de todos os funcionários cadastrados.
- Opções para excluir e editar funcionários.
- Menu para cadastrar nova empresa e novo funcionário.
- Botão para exportar a lista de funcionários para PDF.

### Cadastro de Empresa

- Formulário para cadastrar nova empresa.
- Validação do campo nome.

### Cadastro de Funcionário

- Formulário para cadastrar novo funcionário.
- Campos: nome, cpf, rg, email, salário e empresa.
- Validação dos campos obrigatórios.

### Exportação para PDF

- Exportação da lista de funcionários para PDF.

## Regras de Negócio

- **Login:** Obrigatório informar email válido e senha. Mensagem de sucesso ou falha.
- **Cadastro de Empresa:** Obrigatório informar o nome da empresa. Mensagem de sucesso ou falha.
- **Cadastro de Funcionário:** Obrigatório informar nome, cpf, email e empresa. Mensagem de sucesso ou falha.
- **Listagem de Funcionários:** Mostrar todos os campos da tabela `tbl_funcionario`. Datas no formato DD/MM/YYYY e valores monetários no formato R$ 10,00.
- **Bonificação:** Funcionários com mais de 1 ano na empresa recebem bonificação de 10% do salário (linha azul). Funcionários com mais de 5 anos recebem bonificação de 20% do salário (linha vermelha).

## Como Executar

1. Clone este repositório.
2. Configure o banco de dados MySQL e execute o script SQL fornecido.
3. Coloque os arquivos PHP no servidor web.
4. Acesse a página de login e utilize o usuário de teste (`teste@gmail.com.br` / `1234`).
