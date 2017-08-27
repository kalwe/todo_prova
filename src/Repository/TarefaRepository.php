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
            INSERT INTO tarefa (categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim)
            VALUES (:categoria_id, :usuario_id, :titulo, :descricao, :completa, :dataInicio, :dataFim)
        ");

        $tarefaInsert->execute([
            'categoria_id' => $tarefa->_categoriaId,
            'usuario_id'   => $tarefa->_usuarioId,
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
            SELECT usuario_id, tarefa_id, categoria.nome, titulo, dataInicio, dataFim, descricao, completa
            FROM tarefa
            INNER JOIN categoria ON tarefa.categoria_id = categoria.categoria_id
            WHERE tarefa_id = :tarefa_id AND usuario_id = :usuario_id
        ");

        $tarefaFind->execute([
            'usuario_id' => $tarefa->_usuarioId,
            'tarefa_id' => $tarefa->_tarefaId
        ]);

        $tarefa = $tarefaFind->fetch(0);
        return $tarefa;
    }

    // retorna uma lista com todas as tarefas do db
    public function listAll() {
        $tarefaList = $this->_db->prepare("
            SELECT tarefa_id, categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim
            FROM tarefa
        ");

        $tarefaList->execute();
        $tarefas = $tarefaList->rowCount() ? $tarefaList : [];

        return $tarefas;
    }

    // atualiza uma tarefa no db
    public function update(Tarefa $tarefa) {
        $tarefaUpdate = $this->_db->prepare("
            UPDATE tarefa SET usuario_id = :usuario_id, categoria_id = :categoria_id, titulo = :titulo, descricao = :descricao, completa = :completa, dataInicio = :dataInicio, dataFim = :dataFim 
            WHERE :tarefa_id
        ");

        $tarefaUpdate->execute([
            'usuario_id'   => $tarefa->_usuarioId,
            'categoria_id' => $tarefa->_categoriaId,
            'titulo'       => $tarefa->_titulo,
            'completa'     => $tarefa->_completa,
            'descricao'    => $tarefa->_descricao,
            'dataInicio'   => $tarefa->_dataInicio,
            'dataFim'      => $tarefa->_dataFim,
            'tarefa_id'    => $tarefa->_tarefaId
        ]);
    }

    // atualiza o status da tarefa de acordo com o status passado TODO: trocar params apenas tarefa_id e status completa
    public function atualizaStatusCompleta(Tarefa $tarefa) {
        $tarefaCompleta = $this->_db->prepare("
            UPDATE tarefa SET completa = :completa
            WHERE usuario_id = :usuario_id AND tarefa_id = :tarefa_id
        ");

        $tarefaCompleta->execute([
            'usuario_id' => $tarefa->_usuarioId,
            'tarefa_id' => $tarefa->_tarefaId,
            'completa'  => $tarefa->_completa
        ]);
    }

    // delete
    public function delete($id) {
        $tarefaDelete = $this->_db->prepare("
            DELETE FROM tarefa
            WHERE tarefa_id = :tarefa_id
        ");

        $tarefaDelete->execute([
            'tarefa_id' => $id
        ]);
    }
}

?>