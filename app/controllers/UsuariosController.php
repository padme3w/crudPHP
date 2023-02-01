<?php
use models\Usuario;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class UsuariosController {

	/**
	* Para acessar http://ENDEREÇODAPASTA/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Usuario();
		
		#busca 1 registro
		$send['data'] = null;
		if ($id != null){
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#chama a view
		render("usuarios", $send);
	}

	
	function salvar(){

		$model = new Usuario();
		$id = $model->save($_POST);
		
		redirect("usuarios/index/$id");
	}

	function deletar(int $id){
		
		$model = new Usuario();
		$id = $model->delete($id);

		redirect("usuarios/index/");
	}


}
