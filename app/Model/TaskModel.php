<?php

// Essa classe simplifica a manipulação dos dados, abstraindo a lógica de acesso ao banco de dados. 
// Ela trabalha em conjunto com a classe TaskDAO para executar as operações de banco de dados necessárias.

class TaskModel
{
    public $id, $title, $description, $priority, $date;
    public $rows;

    public function save(){

        include 'app/DAO/TaskDAO.php';
        $dao = new TaskDAO();

        if(empty($this->id)){
            $dao->insert($this);
        }else{
            $dao->update($this);
        }
    }

    public function getAllRows(){
        include 'app/DAO/TaskDAO.php';
        $dao = new TaskDAO();

        $this->rows = $dao->select();
    }

    public function filterByPriority(int $priority){
        include 'app/DAO/TaskDAO.php';
        $dao = new TaskDAO();
        
        $this->rows = $dao->selectByPriority($priority);
    }

    public function getById(int $id){
        include 'app/DAO/TaskDAO.php';
        $dao = new TaskDAO();

        return $dao-> selectById($id);
    }

    

    public function delete(int $id){
        include 'app/DAO/TaskDAO.php';
        $dao = new TaskDAO();

        $dao->delete($id);
    }
}