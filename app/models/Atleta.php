<?php

namespace models;

class Atleta extends Model {
    
    protected $table = "atletas";
    #nao esqueça da ID
    protected $fields = ["id","nome", "equipe", "categoria"];

    function findByCat(){
        $sql ="SELECT nome, equipe FROM atletas GROUP BY categoria";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    function findByEq(){
        $sql ="SELECT nome, categoria FROM atletas GROUP BY equipe";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }
 
}

