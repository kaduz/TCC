<?
session_start();

require("conexao.php");

		$_POST['id'] = $id;
		$_POST['cpf'] = $cpf;
		
		$_POST['telefone'] = $telefone;
		
?>

				<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				 <!-------Include the above in your HEAD tag ---------->
				 
			 <!DOCTYPE html>
			<html lang="pt-br">
			
			<head>

				 <meta charset="utf-8">
				 <meta http-equiv="X-UA-Compatible" content="IE=edge">
				 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				 <meta name="description" content="">
				 <meta name="author" content="">
				 
				<title>Lançamentos de Ordem de Serviço</title>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
				<!-- jQuery -
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
				<!-- jQuery UI -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
				<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
				
				<style>
					body {
					background-color: #20B2AA
					}
				
					
				.tela {
							
				margin-right: 1px;
				margin-left: 910px;
				}
				.start {
					
				margin-right: 865px;
				margin-left: 1px;
				}
						
				</style>
			
			</head>
						<?
							require("conexao.php");
							
							$id  = $_POST['id'];
							$sql = "SELECT * FROM client_cad WHERE id='$id'";
							
							$res = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($res);
						?>
						
					<div class="row justify-content-center">
						<div class="container">
							<div class="jumbotron mt-3">
								<h2 class="text-center mt-1"><b>Novo Cadastro</b></h2><hr>
									<form class="needs-validation" autocomplete="on" method="post" class="ajax_form" action="NovaOS_Process.php" enctype="multipart/form-data">

										<div class="form-row justify-content-md-center">
											<div class="col-md-4">
												<label>Nome</label>
												<input class="form-control" type="text" name="nome" id="nome" maxlength="100" placeholder="Insira o nome" onkeydown="javascript: fMasc( this, mCPF );" value="<?echo $nome?>">
												<input class="form-control" type="hidden" name="id" id="id" maxlength="100"  value="<?echo $row['id']?>">
											</div>
											<div class="col-md-4">
												<label>Serviço</label>
												<input type="text" name="cpf" id="nome" class="form-control" placeholder="Buscar cpf" value="<?echo $row['cpf']?>">
												<input type="hidden" name="id" id="id" class="form-control" value="<?echo $row['id']?>">
											</div>
										</div>

										<div class="form-row justify-content-md-center">
											<div class="col-md-4">
												<label>Telefone</label>
												<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Buscar Telefone" value="<?echo $telefone?>">
												<input type="hidden" name="id" id="id" class="form-control" value="<?echo $row['id']?>">
											</div>
											<div class="col-md-4">
												<label>Pet</label>
												<input class="form-control" placeholder="Selecione o Pet" maxlength="9" required name="id_nome" type="text" id="id_nome">
											</div>
										</div>

										<br>

										<div class="form-row justify-content-md-center">
											<div class="col-md-4">
												<label>Data de Registro</label>
												<div class="input-group mb-3">
													<span class="input-group-text" id="basic-addon1">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
															<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
														</svg>
													</span>
													<input class="form-control" type="date" value="<?php echo date("d/m/Y")?>" name="data_registro" id="data_registro"  required oninvalid="setCustomValidity('Por favor, Informe a data Inicial!')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											</div>

											<!--<div class="col-md-4">
												<label>Status</label>
												<select class="form-control" id="status" name="status" required>
													<option value=''>---</option>
													<option value='1'>Inclusão</option>
													<option value='2'>Alteração</option>
													<option value='3'>Exclusão</option>
												</select>
											</div>-->
										</div>

										<div class="form-row justify-content-center mt-2">
											<button class="btn btn-outline-success col-md-2">Cadastrar</button>
										</div>
										<br>
										<div align="center">
											<div class="mt-2">
												<a type="submit" class="btn btn-outline-primary start " href="../index.php" >Voltar</a>
												<button type="button" class="btn btn-outline-secondary" data-dismiss="modal" >Fechar</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
					<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		
					<script type='text/javascript'>
						$(document).ready(function(){
							$("input[name='nome']").blur(function(){
								var $cpf = $("input[name='cpf']");
								var $telefone = $("input[name='telefone']");
									//var $nome = $("input[name='nome']");
								$.getJSON('SO_Pesq.php',{ 
									nome: $( this ).val() 
								},function( json ){
									$cpf.val( json.cpf );
									$telefone.val( json.telefone );
									//$nome.val( json.nome );
								});
							});
						});
					</script>
		
						<script type="text/javascript">
						  $(function() {
							 $( "#nome" ).autocomplete({
							   source: 'SO_Pesq.php',
							 });
						  });
						</script>

				<script type="text/javascript">
				  $(function() {
					 $( "#telefone" ).autocomplete({
					   source: 'SO_Pesq2.php',
					 });
				  });
				</script>
				
			<script type="text/javascript">
			  $(function() {
				 $( "#cpf" ).autocomplete({
				   source: 'SO_Pesq3.php',
				 });
			  });
			</script>
		</body>