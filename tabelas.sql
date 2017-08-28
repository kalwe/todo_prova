-- CREATE TABLE 'categoria'
CREATE TABLE categoria (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(40) NOT NULL,
    PRIMARY KEY (id));

-- CREATE TABLE 'tarefa'
CREATE TABLE tarefa (
    id INT(11) NOT NULL AUTO_INCREMENT,
    usuarioId INT(11) NOT NULL,
    categoriaId INT(11) NOT NULL,
    titulo VARCHAR(40) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    completa BOOLEAN NOT NULL,
    dataInicio DATE NOT NULL,
    dataFim DATE NOT NULL ,
    PRIMARY KEY (id)
    FOREIGN KEY (categoriaId) REFERENCES categoria(id));