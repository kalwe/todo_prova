<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../src/Model/Tarefa.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../src/Model/GerenciarTarefa.php';

use Model\Tarefa as Tarefa;
use Model\GerenciarTarefa as GerenciarTarefa;

class GerenciarTarefaTest extends PHPUnit_Framework_TestCase {

    // Shoud - TODO:
    public function testInverterStatusCompleta() {
        // Arrange
        $completa = 0; // valor inicial para comparacao

        $tarefa = new Tarefa;
        $tarefa->_id = 1;
        $tarefa->_usuarioId = 1;
        $tarefa->_completa = $completa;

        $gerenciarTarefa = new GerenciarTarefa;

        // Act
        $gerenciarTarefa->InverteStatusTarefa($tarefa); // receber uma tarefa e inverter o valor da variavel completa

        // Assert
        $this->assertEquals(!$completa, $tarefa->_completa); // espero receber um valor direferente do valor inicial da variavel $completa
    }

}

?>
