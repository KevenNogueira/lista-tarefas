<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <!-- Fontewesom -->
    <script src="https://kit.fontawesome.com/7d3a8355c9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" />

    <title>App Lista Tarefas</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="img/logo.png" alt="logo" width="50" height="50" class="d-inline-block align-center">
                App Lista Tarefas
            </a>
        </div>
    </nav>

    <?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
    <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Tarefa inserida com sucesso!</h5>
    </div>
    <?php } ?>

    <div class="container app">
        <div class="row">
            <div class="col-md-4 menu">
                <ul class="list-group">
                    <li class="list-group-item"><a href="Index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item active"><a href="#">Nova Tarefa</a></li>
                    <li class="list-group-item"><a href="TodasTarefas.php">Todas Tarefas</a></li>
                </ul>
            </div>

            <div class="col-md-8">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4 class="border-bottom border-success mb-4 pb-3 font-weight-bold text-center">Nova Tarefa
                            </h4>

                            <form method="post" action="logica/TarefaController.php?acao=inserir">
                                <div class="form-group">
                                    <label for=""> Descrição da Tarefa:</label>
                                    <input type="text" name="tarefa" id="tarefa" class="form-control"
                                        placeholder="Exemplo: Pagar conta de luz!">
                                </div>
                                <button class="btn btn-success">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!-- Incio do JS personalizado -->
    <script src="JS/script.js"></script>
</body>

</html>