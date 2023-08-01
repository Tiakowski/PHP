<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
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
    

    <table class="table inline-table">
        <tr>
            <th>Concluir</th>
            <th>Título </th>
            <th>Data limite</th>
            <th>Prioridade</th>
            <th>Editar</th>
            <th>
                <i class="fa-solid fa-filter"></i>
                <select id="priority-filter" class="priority-filter">
                    <option>Selecione</option>
                    <option value="0">Todos</option>
                    <option value="1">Alta</option>
                    <option value="2">Média</option>
                    <option value="3">Baixa</option>
                </select>
            </th>
        </tr>
        <?php foreach($model->rows as $item): ?>
        <tr>
            <td>
               <a href="/task/delete?id=<?= $item->id?>" class="delete-link"><i class="fa-solid fa-flag-checkered"></i></a> 
            </td>

            <td class="description-cell">
                <div class="toggle-title">
                    <?=$item->title ?>
                    <i class="fas fa-angle-right arrow-icon" style="margin-left: 5px;"></i>

                </div>
                <div class="description" style="display: none; word-wrap: break-word;">
                <hr>
                    <?=$item->description ?>
                </div>
            </td>

            <td>
                <?= $item->date ? date('d/m/Y', strtotime($item->date)) : 'Sem data limite' ?>
            </td>

            <td>
            <?php
                switch ($item->priority) {
                    case 1:
                        echo "Alta";
                        break;
                    case 2:
                        echo "Média";
                        break;
                    case 3:
                        echo "Baixa";
                        break;
                    default:
                        echo "";
                }
            ?>
            </td>

            <td>
               <a class="edit-link" href="/task/form?id=<?= $item->id?>"><i class="fa-solid fa-pen-to-square"></i></a> 
            </td>
        </tr>
        <?php endforeach ?>

        <?php if(isset($model->rows) && count($model->rows) == 0): ?>
            <tr>
                <td colspan="5"> Nenhuma tarefa a ser realizada! </td>
            </tr>
        <?php endif ?>
    </table>
            
    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="../../../public/js/main.js"></script>
    <script src="../../../public/js/ajax.js"></script>
    
</body>
</html>