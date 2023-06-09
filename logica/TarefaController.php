<?php

require "TarefaModel.php";
require "TarefaService.php";
require "Conexao.php";

if (isset($_POST['tarefa']) && empty($_POST['tarefa'])) {
    header('Location: ../NovaTarefa.php?tarefa=vazio');
} else {


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
    } else if ($acao == 'atualizar') {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('dsc_tarefa', $_POST['dsc_tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if ($tarefaService->atualizar()) {
            if ($_GET['pag'] == 'index') {
                header('location: ../Index.php');
            } else {
                header('location: ../TodasTarefas.php');
            }
        }
    } else if ($acao == 'remover') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

        if ($_GET['pag'] == 'index') {
            header('location: Index.php');
        } else {
            header('location: TodasTarefas.php');
        }
    } else if ($acao == 'marcarRealizada') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();

        if ($_GET['pag'] == 'index') {
            header('location: Index.php');
        } else {
            header('location: TodasTarefas.php');
        }
    } else if ($acao == 'recuperarTarefasPendentes') {
        $tarefa =  new Tarefa();
        $tarefa->__set('id_status', 1);
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarTarefasPendentes();
    }
}
