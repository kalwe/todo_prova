<?php

namespace Model;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Tarefa.php';

use Model\Tarefa as Tarefa;

class GerenciarTarefa {

    public function InverteStatusCompleta(Tarefa $tarefa) {
        $tarefa->completa = !$tarefa->completa;
    }

}

?>