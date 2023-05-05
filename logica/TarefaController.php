<?php

require "TarefaModel.php";
require "TarefaService.php";
require "Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
    $tarefa = new Tarefa();
    $tarefa->__set('dsc_tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header('Location: ../NovaTarefa.php?inclusao=1');
} else if ($acao == 'recuperar') {

    $tarefa =  new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
}
