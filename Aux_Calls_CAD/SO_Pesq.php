<?php
require "conexao.php";

	function get_razao($conn , $term){

		$query = "SELECT nome FROM client_cad where nome like '%".$term."%' ORDER BY nome ASC LIMIT 7 ";
		$result = mysqli_query($conn, $query);	
		$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $data;	
	}

	if (isset($_GET['term'])) {
		$getNome = get_razao($conn, $_GET['term']);
		$nomeLista = array();
		foreach($getNome as $nome){
			$nomeLista[] = $nome['nome'];
		}

		echo json_encode($nomeLista);

	}

?>

<?php
require "conexao.php";

	function retorna($nome, $conn){

		$result_user = "SELECT * FROM client_cad WHERE nome = '$nome' LIMIT 1";
		$resultado_user = mysqli_query($conn, $result_user);

		if($resultado_user->num_rows){
			$row_user = mysqli_fetch_assoc($resultado_user);
			$valores['cpf'] = $row_user['cpf'];
			$valores['telefone'] = $row_user['telefone'];
	
		}else{
			$valores['cpf'] = 'Usuario não encontrado';
		}
		
		return json_encode($valores);
	}

	if(isset($_GET['nome'])){
		echo retorna($_GET['nome'], $conn);
	}
	
?>
