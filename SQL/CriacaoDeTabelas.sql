USE dbphp7;

CREATE TABLE Usuarios( 
Id INT NOT NULL IDENTITY PRIMARY KEY,
Login VARCHAR(64) NOT NULL,
Senha VARCHAR(256) NOT NULL,
Nome VARCHAR(256) NOT NULL,
Sobrenome VARCHAR(256) NOT NULL,
DataNascimento DATETIME NOT NULL DEFAULT GETDATE(),
Escolaridade VARCHAR(256) NOT NULL,
Profissao VARCHAR(256) NOT NULL,
DataCadastro DATETIME NOT NULL DEFAULT GETDATE()
);
