<?php
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

		 #recupera a lista com todos os modelos
		 $equipeModel = new Equipe();
		 $send['equipe'] = $equipeModel->all();
 
		 #recupera a lista com todos os modelos
		 $categoriaModel = new Categoria();
		 $send['categoria'] = $categoriaModel->all();

		#chama a view
		render("atletas", $send);
	}


	function salvar($id=null){

		$model = new Atleta();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("atletas/index/$id");
	}

	function deletar(int $id){
		
		$model = new Atleta();
		$id = $model->delete($id);

		redirect("atletas/index/");
	}


}
