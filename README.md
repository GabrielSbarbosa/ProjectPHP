Claro! Aqui está um exemplo de README em formato Markdown para o seu projeto de controle de funcionários em PHP:

```markdown
# Projeto de Controle de Funcionários

Este projeto é um sistema simples de controle de funcionários desenvolvido em PHP, MySQL e JavaScript. O objetivo é gerenciar empresas e seus funcionários, com funcionalidades de login, cadastro e listagem.

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
| login     | VARCHAR(20)  | Login do usuário       |
| senha     | VARCHAR(20)  | Senha do usuário       |

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

## Configuração do Banco de Dados

Execute o seguinte script SQL para criar as tabelas e inserir o usuário de teste:

```sql
CREATE DATABASE controle_funcionarios;

USE controle_funcionarios;

CREATE TABLE tbl_usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(20) NOT NULL,
    senha VARCHAR(20) NOT NULL
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
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
);

INSERT INTO tbl_usuario (login, senha) VALUES ('teste@gmail.com.br', '1234');
```

## Funcionalidades

### Página de Login

- Validação de email e senha.
- Mensagem de sucesso ou falha no login.

### Página Inicial

- Listagem de todos os funcionários cadastrados.
- Menu para cadastrar nova empresa e novo funcionário.

### Cadastro de Empresa

- Formulário para cadastrar nova empresa.
- Validação do campo nome.

### Cadastro de Funcionário

- Formulário para cadastrar novo funcionário.
- Campos: nome, cpf, rg, email e empresa.
- Validação dos campos obrigatórios.

## Como Executar

1. Clone este repositório.
2. Configure o banco de dados MySQL e execute o script SQL fornecido.
3. Coloque os arquivos PHP no servidor web.
4. Acesse a página de login e utilize o usuário de teste (`teste@gmail.com.br` / `1234`).

## Contribuição

Sinta-se à vontade para contribuir com melhorias e novas funcionalidades. Para isso, faça um fork deste repositório, crie uma branch com suas alterações e envie um pull request.

## Licença

Este projeto está licenciado sob a MIT License.

---

Qualquer dúvida ou sugestão, entre em contato!

```

Você pode ajustar o conteúdo conforme necessário para refletir melhor os detalhes do seu projeto. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊
