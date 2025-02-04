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
