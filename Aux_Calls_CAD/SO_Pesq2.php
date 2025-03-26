<?php

require "conexao.php";

	function get_razao($conn , $term){

		$query = "SELECT telefone FROM client_cad where telefone like '%".$term."%' ORDER BY telefone ASC LIMIT 7 ";
		$result = mysqli_query($conn, $query);	
		$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $data;	
	}

	if (isset($_GET['term'])){

		$getTelefone = get_razao($conn, $_GET['term']);
		$telefoneLista = array();
		foreach($getTelefone as $telefone){
			$telefoneLista[] = $telefone['telefone'];
		}

		echo json_encode($telefoneLista);

	}
?>
