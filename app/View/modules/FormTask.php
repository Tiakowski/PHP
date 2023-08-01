<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link type="image/png" rel="icon" href="../../../public/img/icon.png">
</head>
<body>
<div class='pattern'></div>
   <div class="navbar">
    <ul>
      <li><a href="/">Tarefas</a></li>
      <li><a href="/task/form">Criar Tarefas</a></li>
    </ul>
  </div>


  <?php
        // Verifica se o parâmetro "id" está presente na URL
        $id = $_GET['id'] ?? null;
        $isEdit = !empty($id);

        // Define o texto do botão com base na condição acima
        if ($isEdit) {
            $buttonText = 'Editar';
        } else {
            $buttonText = 'Criar';
        }
    ?>


    <fieldset class="form-fieldset">
        <legend><?php echo $isEdit ? 'Editar Tarefa' : 'Criar Tarefa'; ?></legend>
            <form id="task-form" action="/task/form/save" method="post">
                <input type="hidden" name="id" value="<?= $model->id ?>">
                
                <label for="title">Título</label>
                <input type="text" name="title" value="<?= $model->title ?>" id="title" class="text-input">
                <br>


                <label for="description">Descrição</label>
                <textarea name="description" id="description"><?= $model->description ?></textarea>
                <br>
                <div class="flex-container">
      <div>
        <label for="due-date">Data limite</label>
        <input type="date" name="date" id="date" value="<?= $model->date ?>" class="text-input">
      </div>
      <div>
        <label for="priority">Prioridade</label>
        <select name="priority" id="priority" class="text-input priority-input">
          <option value="3" <?php if ($model->priority == 3) echo 'selected'; ?> >Baixa</option>
          <option value="2" <?php if ($model->priority == 2) echo 'selected'; ?> >Média</option>
          <option value="1" <?php if ($model->priority == 1) echo 'selected'; ?> >Alta</option>
        </select>
      </div>
    </div>

                <button class="button" type="submit"><?php echo $buttonText; ?></button>
            </form>
    </fieldset>

    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="../../../public/js/main.js"></script>
    <script src="../../../public/js/validation.js"></script>
</body>
</html>