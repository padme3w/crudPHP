<?php

namespace models;

class Categoria extends Model {
    
    protected $table = "categorias";
    #nao esqueça da ID
    protected $fields = ["id", "nome", "idade","graduacao", "genero", "peso", "kimono"];
    
    
    
}

