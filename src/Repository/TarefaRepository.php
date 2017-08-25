<?php

namespace Repository;

require_once '..\Data\DbConnection';

include '../Model';

class TarefaRepository implements iTarefaRepository
{
    $dbCon = new DbConnection();
    $db = $dbCon->getConnection();

    // recupera uma tarefa por id da tarefa e usuario
    public function $ find($tarefa_id, $usuario_id) {
        $tarefaQuery = $db->prepare("
            SELECT tarefa_id, categoria.nome, titulo, descricao, completa
            FROM tarefa
            INNER JOIN categoria ON tarefa.categoria_id = categoria.categoria_id
            WHERE tarefa_id = :tarefa_id AND usuario_id = :usuario_id
        ");

        $tarefasQuery->execute([
            'usuario_id' => 'usuario_id',
            'tarefa_id' => 'tarefa_id'
        ]);

        return $tarefas = $tarefasQuery->rowCount() ? $tarefasQuery : [];
    }

    public 
}

?>