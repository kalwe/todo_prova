<?php

namespace Repository;

require __DIR__. DIRECTORY_SEPARATOR. '../Data/DbConnection.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Model\Tarefa.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iTarefaRepository.php';

use Data\DbConnection as DbConnection;
use Model\Tarefa as Tarefa;
use Interfaces\Repositories\iTarefaRepository as iTarefaRepository;

class TarefaRepository implements iTarefaRepository
{
    private $_db;

    public function __construct(DbConnection $db) {
        $this->_db = $db
    }

    // insere uma tarefa no db
    public function create(Tarefa $tarefa) {
        $tarefaInsert = $this->_db->prepare("
            INSERT INTO tarefa (categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim)
            VALUES (:categoria_id, :usuario_id, :titulo, :descricao, :completa, :dataInicio, :dataFim);
        ");

        $tarefaInsert->execute([
            'categoria_id' => $tarefa->categoria_id,
            'usuario_id'   => $tarefa->usuario_id,
            'titulo'       => $tarefa->titulo,
            'descricao'    => $tarefa->descricao,
            'completa'     => $tarefa->completa,
            'dataInicio'   => $tarefa->dataInicio,
            'dataFim'      => $tarefa->dataFim
        ]);
    }

    // recupera uma tarefa por id da tarefa e usuario
    public function find($usuario_id, $tarefa_id) {
        $tarefaFind = $this->_db->prepare("
            SELECT usuario_id, tarefa_id, categoria.nome, titulo, dataInicio, dataFim, descricao, completa
            FROM tarefa
            INNER JOIN categoria ON tarefa.categoria_id = categoria.categoria_id
            WHERE tarefa_id = :tarefa_id AND usuario_id = :usuario_id
        ");

        $tarefaFind->execute([
            'usuario_id' => $usuario_id,
            'tarefa_id' => $tarefa_id
        ]);

        $tarefa = $tarefaFind->fetch();
        return $tarefa;
    }

    // retorna uma lista com todas as tarefas do db
    public function list() {
        $tarefaList = $this->_db->prepare("
            SELECT tarefa_id, categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim
            FROM tarefa
        ");
        $tarefaList->execute();
        $tarefas = $tarefaList->rowCount() ? $tarefaList : [];
        return tarefas;
    }

    // atualiza uma tarefa no db
    public function update(Tarefa $tarefa) {
        $tarefaUpdate = $this->_db->prepare("
            UPDATE tarefa SET usuario_id = :usuario_id, categoria_id = :categoria_id, titulo = :titulo, descricao = :descricao, completa = :completa, dataInicio = :dataInicio, dataFim = :dataFim 
            WHERE :tarefa_id
        ");

        $tarefaUpdate->execute([
            'usuario_id'   => $tarefa->usuario_id,
            'categoria_id' => $tarefa->categoria_id,
            'titulo'       => $tarefa->titulo,
            'completa'     => $tarefa->completa,
            'descricao'    => $tarefa->descricao,
            'dataInicio'   => $tarefa->dataInicio,
            'dataFim'      => $tarefa->dataFim,
            'tarefa_id'    => $tarefa->tarefa_id
        ]);
    }

    // atualiza o status da tarefa de acordo com o status passado TODO: trocar params apenas tarefa_id e status completa
    public function atualizaCompleta(Tarefa $tarefa) {
        $tarefaCompleta = $this->_db->prepare("
            UPDATE tarefa SET completa = :completa
            WHERE tarefa_id = :tarefa_id
        ");

        $tarefaCompleta->execute([
            'completa'  => $tarefa->completa,
            'tarefa_id' => $tarefa->tarefa_id
        ]);
    }

    public function delete($id) {
        $tarefaDelete = $this->_db->prepare("
            DELETE FROM tarefa
            WHHERE tarefa_id = :tarefa_id
        ");

        $tarefaDelete->execute([
            'tarefa_id' => $id
        ]);
    }
}

?>