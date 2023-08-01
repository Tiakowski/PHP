<?php
include 'app/Controller/TaskController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Obtendo a URL

// Realizando o roteamento com base na URL
switch($url){
    case "/":
        TaskController::index(null); // Chamando o método index da classe TaskController caso a URL seja apenas "localhost:[porta]/"
        break;

    case "/task/form":
        TaskController::form();
        break;
    
    case "/task/form/save":
        TaskController::save();
        break;
    case "/task/delete":
        TaskController::delete();
        break;
    case "/task/priority":
        $priority = $_GET['priority'] ?? null; // Obtendo o parâmetro "priority" da URL, caso não exista, define como null
        if ($priority === null) {
            TaskController::index(null); // Chamando o método index da classe TaskController
        } else {
            TaskController::filter($priority); // Chamando o método filter da classe TaskController passando a prioridade especificada
        }
        break;
        
    default:
    echo "Erro 404";
        break;
}   