<?php

// A classe TaskController age como uma camada intermediária entre as ações do usuário e as operações realizadas no TaskModel

class TaskController
{
    public static function index(){
        include 'app/Model/TaskModel.php'; //Importando o Model

        $model = new TaskModel(); // Instanciando o model
        $model->getAllRows(); // Utilizando o metodo getAllRows do model

        include "app/View/modules/ListTask.php"; // Importando a View de principal
    }

    public static function filter($priority){
        include 'app/Model/TaskModel.php';
        
        $model = new TaskModel();
        $model->filterByPriority($priority);

        include "app/View/modules/ListTask.php";
    }

    public static function form(){
        include 'app/Model/TaskModel.php';
        $model = new TaskModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']); // Se o parâmetro "ID" estiver presente na URL, o $model será preenchido com os dados da tarefa
        }

        include "app/View/modules/FormTask.php"; // Importando a View de formulário de tarefa
    }

    public static function save(){
        include 'app/Model/TaskModel.php';
        $model = new TaskModel();
        
        if (!empty($_POST['date'])) {
            $model->date = $_POST['date'];  // Define o valor de "$model->date" como o valor do campo "date" do formulário, caso não esteja vazio
        } else {                                
            $model->date = null; // Define o valor de "$model->date" como nulo, caso o campo "date" do formulário esteja vazio.
        }

        $model -> id = $_POST['id'];
        $model-> title = $_POST['title'];
        $model-> description = $_POST['description'];  // Obtendo os dados do fumulário
        $model->date = $_POST['date'];
        $model-> priority = $_POST['priority'];

        $model-> save();

        header("Location:/"); // Redirecionando para a página principal
    }

    public static function delete(){
        include 'app/Model/TaskModel.php';
        $model = new TaskModel();

        $model->delete((int) $_GET['id']);

        header("Location:/");
    }
}