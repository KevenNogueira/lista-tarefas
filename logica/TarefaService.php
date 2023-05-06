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
        $query = '
            SELECT 
                t.id,
                s.status,
                t.dsc_tarefa
            FROM
                tarefas as t
            LEFT JOIN 
                status as s 
            ON 
                (t.id_status = s.id);          
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar()
    {
        $query = '
            UPDATE
                tarefas
            SET
                dsc_tarefa = ?
            WHERE
                id = ?
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('dsc_tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function remover()
    {
        $query = '
            DELETE
            FROM
                tarefas
            WHERE
                id = ?
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function marcarRealizada()
    {
        $query = '
            UPDATE
                tarefas
            SET
                id_status = ?
            WHERE
                id = ?
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }

    public function recuperarTarefasPendentes()
    {
        $query = '
            SELECT 
                t.id,
                s.status,
                t.dsc_tarefa
            FROM
                tarefas as t
            LEFT JOIN 
                status as s 
            ON 
                (t.id_status = s.id)
            WHERE
                t.id_status = ?          
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
