<?php

namespace models;

class Checagem extends Model {
    
    protected $table = "atletas";
    #nao esqueça da ID
    protected $fields = ["id","nome", "equipe", "categoria"];

    function findByCat(){
        $sql ="SELECT nome, equipe FROM atletas WHERE categoria = $categoria";
        
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

