<?php
use models\Atleta;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class AtletasController {

	/**
	* Para acessar http://ENDEREÇODAPASTA/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Atleta();
		
		#busca 1 registro
		$send['data'] = null;
		if ($id != null){
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$send['tipos'] = [0=>"Escolha uma opção", 1=>"Branca", 2=>"Azul", 3=>"Roxa", 4=>"Marrom", 5=>"Preta",];

		#chama a view
		render("atletas", $send);
	}

	
	function salvar(){

		$model = new Atleta();
		$id = $model->save($_POST);
		
		redirect("atletas/index/$id");
	}

	function deletar(int $id){
		
		$model = new Atleta();
		$id = $model->delete($id);

		redirect("atletas/index/");
	}


}
