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
    echo 'Aqui estou mais um dia, sobre o olhar sanguinario do vigia!';
}
