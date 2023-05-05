<?php

class TarefaService
{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa)
    {
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir()
    {
        $query = 'insert into tarefas(dsc_tarefa) values (:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('dsc_tarefa'));
        $stmt->execute();
    }
    public function recuperar()
    {
    }
    public function atualizar()
    {
    }
    public function remover()
    {
    }
}
