<?php

namespace models;

class Atleta extends Model {
    
    protected $table = "atletas";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento","faixa"];
    
    
    
}

