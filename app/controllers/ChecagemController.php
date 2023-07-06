<?php
use models\Checagem;
use models\Atleta;
use models\Categoria;
use models\Equipe;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class ChecagemController {

	/**
	* Para acessar http://ENDEREÇODAPASTA/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Checagem();
		
		#busca 1 registro
		$send['data'] = null;

		if (!isset($_GET['categoria'])) {
			$_GET['categoria'] = NULL;
		}

		#busca todos os registros
		$send['lista'] = $model->findByCat($_GET['categoria']);

		 #recupera a lista com todos os modelos
		 $equipeModel = new Equipe();
		 $send['equipe'] = $equipeModel->all();
 
		 #recupera a lista com todos os modelos
		 $atletaModel = new Atleta();
		 $send['atletas'] = $atletaModel->all();

		 $categoriaModel = new Categoria();
		 $send['categoria'] = $categoriaModel->all();

		#chama a view
		render("checagem", $send);
	}

	

}
