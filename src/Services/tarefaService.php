<?php 

namespace Services;

include __DIR__. DIRECTORY_SEPARATOR. '../Repository/TarefaRepository.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Interfaces/Services/iTarefaService.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Model/Tarefa.php';

use Repository\TarefaRepository as TarefaRepository;
use Interfaces\Services\iTarefaService as iTarefaService;
use Model\Tarefa as Tarefa;

class TarefaService implements iTarefaService {

    public $tarefaRepository;

    public function __construct($db) {
        $this->tarefaRepository = new TarefaRepository($db);
    }

    public function addTarefa(Tarefa $tarefa) {
        $this->tarefaRepository->create($tarefa);
    }

    public function listarTarefas() {
        return $this->tarefaRepository->listAll();
    }

    public function marcarComoCompleta(Tarefa $tarefa) {
        $tarefa->InverteStatusCompleta($tarefa);
        $this->tarefaRepository->atualizaStatusCompleta($tarefa);
    }

    public function modificarTarefa(Tarefa $tarefa) {
        $this->tarefaRepository->atualizaTarefa($tarefa);
    }

    public function buscarTarefa(Tarefa $tarefa) {
        return $this->tarefaRepository->find($tarefa);
    }

    public function deletarTarefa($id) {
        $this->tarefaRepository->delete($id);
    }
}

?>