function editar(id, dscTarefa, pag) {
  console.log(pag);
  let form = document.createElement('form');
  if (pag == 'index') {
    form.action = 'logica/TarefaController.php?acao=atualizar&pag=index';
  } else {
    form.action = 'logica/TarefaController.php?acao=atualizar';
  }
  form.method = 'post';
  form.className = 'row';

  let inputTarefa = document.createElement('input');
  inputTarefa.type = 'text';
  inputTarefa.name = 'dsc_tarefa';
  inputTarefa.className = 'col-8 form-control';
  inputTarefa.value = dscTarefa;

  let inputId = document.createElement('input');
  inputId.type = 'hidden';
  inputId.name = 'id';
  inputId.value = id;

  let button = document.createElement('button');
  button.type = 'submit';
  button.className = 'col-3 btn btn-outline-info btn-sm ml-2';
  button.innerHTML = 'Atualizar';

  form.appendChild(inputTarefa);
  form.appendChild(inputId);
  form.appendChild(button);

  let tarefa = document.getElementById('tarefa_' + id);
  tarefa.innerHTML = '';

  tarefa.insertBefore(form, tarefa[0]);
}

function remover(id, pag) {
  if (pag == 'index') {
    location.href = 'Index.php?acao=remover&pag=index&id=' + id;
  } else {
    location.href = 'TodasTarefas.php?acao=remover&id=' + id;
  }
}

function marcarRealizada(id, pag) {
  if (pag == 'index') {
    location.href = 'Index.php?acao=marcarRealizada&pag=index&id=' + id;
  } else {
    location.href = 'TodasTarefas.php?acao=marcarRealizada&id=' + id;
  }
}
