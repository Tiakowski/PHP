<?php

// Essa classe é responsável pela comunicação com o banco de dados para executar operações relacionadas às tarefas. 

class TaskDAO{

    private $conn;

    public function __construct()
    {
        // Conexão com o banco de dados
        include 'config.php';

        $dsn = "mysql:host={$dbHost};dbname={$dbName}";
        $this->conn = new PDO($dsn, $dbUser, $dbPass);
    }

    public function insert(TaskModel $model){
        
        $sql = "INSERT INTO tasks (title, description, priority, date) VALUES (?,?,?,?)"; // Comando SQL para inserir dados na tabela do Banco de Dados

        $stmt = $this->conn->prepare($sql); // Preparando a query

        $stmt->bindValue(1, $model->title);
        $stmt->bindValue(2, $model->description); // Associando os valores aos parâmetros da query
        $stmt->bindValue(3, $model->priority);
        $stmt->bindValue(4, !empty($model->date) ? $model->date : null); // Se o valor de $model->date não estiver vazio, atribui o valor; caso contrário, atribui null.

        $stmt->execute(); // Executando a query
    }

    public function select(){
        $sql = "SELECT * FROM tasks";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); // Devolve um array de objetos contendo dados do Banco de Dados
    }

    public function delete(int $id){
        $sql = "DELETE FROM tasks WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt-> bindValue(1, $id); 
        $stmt->execute();
    }

    public function update(TaskModel $model){
        $sql = "UPDATE tasks SET title=?, description=?, date=?, priority=? WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(1, $model->title);
        $stmt->bindValue(2, $model->description);
        $stmt->bindValue(3, !empty($model->date) ? $model->date : null);
        $stmt->bindValue(4, $model->priority);
        $stmt->bindValue(5, $model->id);

        $stmt-> execute();
    }

    public function selectById(int $id){
        include_once 'app/Model/TaskModel.php'; // Importando o model
        $sql = "SELECT * FROM tasks WHERE id=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("TaskModel"); // Retornando o model com os dados
    }

    public function selectByPriority(int $priority){
        include_once 'app/Model/TaskModel.php'; 

        if($priority == 0){
            return $this->select(); // Caso a prioridade venha como 0, significa que o usuario selecionou a opção "todos" no filtro
        };

        $sql = "SELECT * FROM tasks WHERE priority = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $priority);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}