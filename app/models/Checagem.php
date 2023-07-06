<?php

namespace models;

class Checagem extends Model {
    
    protected $table = "atletas";
    #nao esqueça da ID
    protected $fields = ["id","nome", "equipe", "categoria"];

    function findByCat($categoria = null){
        $sql ="SELECT nome, equipe FROM atletas" ;
        if ($categoria != null) {
         $sql.=    " WHERE categoria = :categoria" ;
        }

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        if ($categoria == null) {
            $stmt->execute([]);
        } else {
            $stmt->execute([':categoria' => $categoria]);
        }
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }
}

