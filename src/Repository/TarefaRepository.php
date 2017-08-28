<?php

namespace Repository;

require_once __DIR__. DIRECTORY_SEPARATOR. '../Data/DbConnection.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Model\Tarefa.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iTarefaRepository.php';

use Data\DbConnection as DbConnection;
use Model\Tarefa as Tarefa;
use Interfaces\Repositories\iTarefaRepository as iTarefaRepository;

class TarefaRepository implements iTarefaRepository {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    // insere uma tarefa no db
    public function create(Tarefa $tarefa) {
        $tarefaInsert = $this->_db->prepare("
            INSERT INTO tarefa (categoriaId, usuarioId, titulo, descricao, completa, dataInicio, dataFim)
            VALUES (:categoriaId, :usuarioId, :titulo, :descricao, :completa, :dataInicio, :dataFim)
        ");

        $tarefaInsert->execute([
            'categoriaId' => $tarefa->_categoriaId,
            'usuarioId'   => $tarefa->_usuarioId,
            'titulo'       => $tarefa->_titulo,
            'descricao'    => $tarefa->_descricao,
            'completa'     => $tarefa->_completa,
            'dataInicio'   => $tarefa->_dataInicio,
            'dataFim'      => $tarefa->_dataFim
        ]);
    }

    // recupera uma tarefa por id da tarefa e usuario : find
    public function find(Tarefa $tarefa) {
        $tarefaFind = $this->_db->prepare("
            SELECT tarefa.id, usuarioId, categoria.nome, titulo, dataInicio, dataFim, descricao, completa
            FROM tarefa
            INNER JOIN categoria ON tarefa.categoriaId = categoria.id
            WHERE tarefa.id = :id AND usuarioId = :usuarioId
        ");

        $tarefaFind->execute([
            'usuarioId' => $tarefa->_usuarioId,
            'id' => $tarefa->_id
        ]);

        $tarefa = $tarefaFind->fetch(0);
        return $tarefa;
    }

    // retorna uma lista com todas as tarefas do db
    public function listAll() {
        $tarefaList = $this->_db->prepare("
            SELECT id, categoriaId, usuarioId, titulo, descricao, completa, dataInicio, dataFim
            FROM tarefa
        ");

        $tarefaList->execute();
        $tarefas = $tarefaList->rowCount() ? $tarefaList : [];

        return $tarefas;
    }

    // atualiza uma tarefa no db
    public function update(Tarefa $tarefa) {
        $tarefaUpdate = $this->_db->prepare("
            UPDATE tarefa SET usuarioId = :usuarioId, categoriaId = :categoriaId, titulo = :titulo, descricao = :descricao, completa = :completa, dataInicio = :dataInicio, dataFim = :dataFim 
            WHERE :id
        ");

        $tarefaUpdate->execute([
            'usuarioId'    => $tarefa->_usuarioId,
            'categoriaId'  => $tarefa->_categoriaId,
            'titulo'       => $tarefa->_titulo,
            'completa'     => $tarefa->_completa,
            'descricao'    => $tarefa->_descricao,
            'dataInicio'   => $tarefa->_dataInicio,
            'dataFim'      => $tarefa->_dataFim,
            'id'           => $tarefa->_id
        ]);
    }

    // atualiza o status da tarefa de acordo com o status passado TODO: trocar params apenas tarefa_id e status completa
    public function atualizaStatusCompleta(Tarefa $tarefa) {
        $tarefaCompleta = $this->_db->prepare("
            UPDATE tarefa SET completa = :completa
            WHERE usuarioId = :usuarioId AND id = :id
        ");

        $tarefaCompleta->execute([
            'usuarioId' => $tarefa->_usuarioId,
            'id' => $tarefa->_id,
            'completa'  => $tarefa->_completa
        ]);
    }

    // delete
    public function delete($id) {
        $tarefaDelete = $this->_db->prepare("
            DELETE FROM tarefa
            WHERE id = :id
        ");

        $tarefaDelete->execute([
            'id' => $id
        ]);
    }
}

?>