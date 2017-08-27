<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../src/Model/Tarefa.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../src/Model/GenrenciarTarefa.php';

use Model\Tarefa as Tarefa;
use Mode\GerenciarTarefa as GerenciarTarefa;

class GerenciarTarefaTest extends PHPUnit_Framework_TestCase {

    public function testInverterStatusCompleta() {
        // Arrange
        $completa = 0;

        $tarefa = new Tarefa;
        $tarefa->tarefaId = 1;
        $tarefa->usuarioId = 1;
        $tarefa->completa = $completa;

        $gerenciarTarefa = new GerenciarTarefa;

        // Act
        $gerenciarTarefa->InverterStatusCompleta($tarefa);

        // Assert
        $this->assertEquals(!$completa, $tarefa->completa);
    }

}

?>