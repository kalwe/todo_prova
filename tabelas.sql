-- CREATE TABLE 'categoria'
CREATE TABLE `todo`.`categoriat` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `nome` VARCHAR(40) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

-- CREATE TABLE 'tarefa'
CREATE TABLE `todo`. ( `id` INT(11) NOT NULL AUTO_INCREMENT , `usuarioId` INT(11) NOT NULL AUTO_INCREMENT , `categoriaId` INT(11) NOT NULL AUTO_INCREMENT , `titulo` VARCHAR(40) NOT NULL , `descricao` VARCHAR(255) NOT NULL , `completa` BOOLEAN NOT NULL , `dataInicio` DATE NOT NULL , `dataFim` DATE NOT NULL , PRIMARY KEY (`id`), INDEX (`usuarioId`), INDEX (`categoriaId`)) ENGINE = MyISAM;