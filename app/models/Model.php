<?php
namespace models;

class Model {

    protected $pdo;

    protected $table = null;
    protected $fields = [];
    

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }


    public function findById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function save($data){
        #filtra, para que só tenha nos values os campos que realmente existem na tabela
        $values = array_intersect_key($data, array_flip($this->fields));
        $fields = array_keys($values);

        $sql = "INSERT INTO {$this->table} (".implode(",",$fields).") 
                    VALUES 
                (:".implode(",:",$fields).")";
        
        #caso voce queira ver como está o SQL descomente a linha
        #sdd($sql);

        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute($values)) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $data){
        #filtra, para que só tenha nos values os campos que realmente existem na tabela
        $values = array_intersect_key($data, array_flip($this->fields));
        $fields = array_keys($values);
        #seta a ID
        $values["id"] = $id;

        #constroi o SQL do UPDATE
        $sql ="UPDATE {$this->table} SET ";
        foreach($fields as $field){
            $sql .= "$field = :$field,";
        }
        $sql = trim($sql,",")." WHERE id = :id";

        #caso voce queira ver como está o SQL descomente a linha
        #dd($sql);
        
        $stmt = $this->pdo->prepare($sql);
        
        if ($stmt->execute($values)) {
            return $id;
        } else {
            return false;
        }
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(["id"=>$id]);
    }


}