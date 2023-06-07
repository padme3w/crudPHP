<?php

namespace models;

class Equipe extends Model {
    
    protected $table = "equipes";
    #nao esqueça da ID
    protected $fields = ["id","equipe", "academia", "professor"];
    
    
    
}

