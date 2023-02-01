<?php

namespace models;

class Usuario extends Model {
    
    public function findById($id){
        $stmt = $this->pdo->prepare("select * from usuarios where id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $stmt = $this->pdo->prepare("select * from usuarios");
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function save($data){
        $stmt = $this->pdo->prepare("insert into usuarios (nome, dataNascimento, ativado, tipo) 
                                        values 
                                    (:nome, :dataNascimento, :ativado, :tipo)");
        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("delete from usuarios where id = :id");
        $stmt->execute(["id"=>$id]);
        return true;
    }
    
}

