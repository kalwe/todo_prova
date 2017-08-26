<?php 

namespace Services;

include __DIR__. DIRECTORY_SEPARATOR. '../Repository/TarefaRepository.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Interfaces/Services/iTarefaService.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Model/Tarefa.php';

use Repositoroy\TarefaRepository as TarefaRepository;
use Repository\Services\iTarefaService as iTarefaService;
use Model\Tarafa as Tarefa;

class TarefaService implements iTarefaService {

    public $tarefaRepository;

    public function __construct($db) {
        $this->tarefaRepository = new TarefaRepository($db);
    }

    public function addTarefa(Tarefa $tarefa) {
        $this->tarefaRepository->create($tarefa);
    }

    public function listTarefas() {
        $this->tarefaRepository->list();
    }

    public function marcarComoCompletada(Tarefa $tarefa) {
        $this->tarefaRepository->atualizaCompleta($tarefa);
    }

    public function modificarTarefa(Tarefa $tarefa) {
        $this->tarefaRepository-atualizaTarefa($tarefa);
    }
}

?>