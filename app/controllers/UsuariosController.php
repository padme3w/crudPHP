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
	* Para acessar http://localhost/NOMEDOPROJETO/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Usuario();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$send['tipos'] = [0=>"", 1=>"Atleta", 2=>"Organização de eventos"];

		#chama a view
		render("usuarios", $send);
	}

	
	function salvar($id=null){

		$model = new Usuario();

		#validacao
		$requeridos = ["nome"=>"Nome é obrigatório",
		"dataNascimento"=>"Data de nascimento é obrigatória",
		"tipo"=>"Declarar o tipo de usuário é obrigatório",
		"email"=>"Email é obrigatório"];
		
		foreach($requeridos as $field=>$msg){
			#verifica se o campo está vazio
			if (!validateRequired($_POST,$field)){
				setValidationError($field, $msg);
			}
		}
		#valida a data
		if (!validateDate(_v($_POST,"dataNascimento"),"d/m/Y")){
			setValidationError("dataNascimento", "Tem que ser uma data válida no formato dd/mm/yyyy");
		}
		#se alguma validação tiver falhado
		if (count($_SESSION['errors'])){
			setFlash("error","Falha ao salvar usuário.");
			#volta para a página que estava
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}

		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		setFlash("success","Salvo com sucesso.");
		redirect("usuarios/index/$id");
	}

	function deletar(int $id){
		
		$model = new Usuario();
		$model->delete($id);

		redirect("usuarios/index/");
	}

	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}

		if ($_SESSION['user']['tipo'] < Usuario::ADMIN_USER){
			redirect("atletas");
			die();
		}

		if ($_SESSION['user']['tipo'] < Usuario::ADMIN_USER){
			redirect("atletas");
			die();
		}
	}
}
