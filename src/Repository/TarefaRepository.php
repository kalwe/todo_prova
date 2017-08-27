<?php

namespace Repository;

require_once __DIR__. DIRECTORY_SEPARATOR. '../Data/DbConnection.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Model\Tarefa.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iTarefaRepository.php';

use Data\DbConnection as DbConnection;
use Model\Tarefa as Tarefa;
use Interfaces\Repositories\iTarefaRepository as iTarefaRepository;

class TarefaRepository implements iTarefaRepository {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // insere uma tarefa no db
    public function create(Tarefa $tarefa) {
        $tarefaInsert = $this->db->prepare("
            INSERT INTO tarefa (categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim)
            VALUES (:categoria_id, :usuario_id, :titulo, :descricao, :completa, :dataInicio, :dataFim)
        ");

        $tarefaInsert->execute([
            'categoria_id' => $tarefa->categoriaId,
            'usuario_id'   => $tarefa->usuarioId,
            'titulo'       => $tarefa->titulo,
            'descricao'    => $tarefa->descricao,
            'completa'     => $tarefa->completa,
            'dataInicio'   => $tarefa->dataInicio,
            'dataFim'      => $tarefa->dataFim
        ]);
    }

    // recupera uma tarefa por id da tarefa e usuario
    public function find($usuarioId, $tarefaId) {
        $tarefaFind = $this->db->prepare("
            SELECT usuario_id, tarefa_id, categoria.nome, titulo, dataInicio, dataFim, descricao, completa
            FROM tarefa
            INNER JOIN categoria ON tarefa.categoria_id = categoria.categoria_id
            WHERE tarefa_id = :tarefa_id AND usuario_id = :usuario_id
        ");

        $tarefaFind->execute([
            'usuario_id' => $usuarioId,
            'tarefa_id' => $tarefaId
        ]);

        $tarefa = $tarefaFind->fetch();
        return $tarefa;
    }

    // retorna uma lista com todas as tarefas do db
    public function listAll() {
        $tarefaList = $this->db->prepare("
            SELECT tarefa_id, categoria_id, usuario_id, titulo, descricao, completa, dataInicio, dataFim
            FROM tarefa
        ");
        $tarefaList->execute();
        $tarefas = $tarefaList->rowCount() ? $tarefaList : [];
        return $tarefas;
    }

    // atualiza uma tarefa no db
    public function update(Tarefa $tarefa) {
        $tarefaUpdate = $this->db->prepare("
            UPDATE tarefa SET usuario_id = :usuario_id, categoria_id = :categoria_id, titulo = :titulo, descricao = :descricao, completa = :completa, dataInicio = :dataInicio, dataFim = :dataFim 
            WHERE :tarefa_id
        ");

        $tarefaUpdate->execute([
            'usuario_id'   => $tarefa->usuarioId,
            'categoria_id' => $tarefa->categoriaId,
            'titulo'       => $tarefa->titulo,
            'completa'     => $tarefa->completa,
            'descricao'    => $tarefa->descricao,
            'dataInicio'   => $tarefa->dataInicio,
            'dataFim'      => $tarefa->dataFim,
            'tarefa_id'    => $tarefa->tarefaId
        ]);
    }

    // atualiza o status da tarefa de acordo com o status passado TODO: trocar params apenas tarefa_id e status completa
    public function atualizaStatusCompleta(Tarefa $tarefa) {
        $tarefaCompleta = $this->db->prepare("
            UPDATE tarefa SET completa = :completa
            WHERE usuario_id = :usuario_id AND tarefa_id = :tarefa_id
        ");

        $tarefaCompleta->execute([
            'usuario_id' => $tarefa->usuarioId,
            'tarefa_id' => $tarefa->tarefaId,
            'completa'  => $tarefa->completa
        ]);
    }

    public function delete($id) {
        $tarefaDelete = $this->_db->prepare("
            DELETE FROM tarefa
            WHHERE usuario_id = :usuario_id AND tarefa_id = :tarefa_id
        ");

        $tarefaDelete->execute([
            'tarefa_id' => $id
        ]);
    }
}

?>