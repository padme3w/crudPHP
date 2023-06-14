<?php
use models\Categoria;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class CategoriasController {

	/**
	* Para acessar http://ENDEREÇODAPASTA/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Categoria();
		
		#busca 1 registro
		$send['data'] = null;
		if ($id != null){
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$send['graduacao'] = [0=>"", 1=>"Branca/Cinza", 2=>"Amarela/Laranja/Verde", 3=>"Azul", 4=>"Roxa", 5=>"Marrom", 6=>"Preta"];

		$send['peso'] = [0=>"", 1=>"Galo", 2=>"Pluma", 3=>"Pena", 4=>"Leve", 5=>"Médio", 6=>"Meio-pesado", 7=>"Pesado", 8=>"Super-pesado", 9=>"Pesadíssimo"];

		$send['idade'] = [0=>"", 1=>"Pré-mirim-1", 2=>"Pré-mirim-2", 3=>"Mirim", 4=>"Infantil", 5=>"Infanto-juvenil-1", 6=>"Infanto-juvenil-2", 7=>"Juvenil", 8=>"Adulto", 9=>"Master-1-2", 10=>"Master-3"];

		$send['genero'] = [0=>"", 1=>"Feminino", 2=>"Masculino"];

		$send['kimono'] = [0=>"", 1=>"GI", 2=>"No-GI"];

		#chama a view
		render("categorias", $send);
	}


	function salvar($id=null){

		$model = new Categoria();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("categorias/index/$id");
	}

	function deletar(int $id){
		
		$model = new Categoria();
		$id = $model->delete($id);

		redirect("categorias/index/");
	}


}
