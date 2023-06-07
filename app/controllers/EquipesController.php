<?php
use models\Equipe;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class EquipesController {

	/**
	* Para acessar http://ENDEREÇODAPASTA/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Equipe();
		
		#busca 1 registro
		$send['data'] = null;
		if ($id != null){
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#chama a view
		render("equipes", $send);
	}


	function salvar($id=null){

		$model = new Equipe();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("equipes/index/$id");
	}

	function deletar(int $id){
		
		$model = new Equipe();
		$id = $model->delete($id);

		redirect("equipes/index/");
	}


}
