<?php
 require "conexao.php";

	function get_razao($conn , $term){

		$query = "SELECT cpf FROM client_cad where cpf like '%".$term."%' ORDER BY cpf ASC LIMIT 7 ";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $data;

	}

	if (isset($_GET['term'])){

		$getCpf = get_razao($conn,$_GET['term']);
		$cpfLista = array();
		foreach($getCpf as $cpf){
			$cpfLista[] = $cpf['cpf'];
		}

		echo json_encode($cpfLista);
	}

?>
