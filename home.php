<?php 
include ('conexao.php'); 
Proteger();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto</title>
	<meta charset="utf-8">
	  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>     
</head>
<body>
<div class="row">
	<nav>
		<div class="nav-wrapper">
		<a href="home.php" class="brand-logo"><?php echo$_SESSION['nome'];?><i class="material-icons">cloud</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="home.php"><i class="material-icons">home</i></a></li>
				<li><a href="sair.php"><i class="material-icons">arrow_forward</i></a></li>
			</ul>
		</div>
	</nav>
</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col s6 m6 offset-s3 offset-m3">
				<form method="POST" action="home.php">
					<fieldset>
					<legend>Novo Jogo</legend>
					<div class="row">
						<div>
							<div class="input-field col s8">
								<input id="nome" type="text" name="nome" class="validate">
								<label for="nome">Nome do Jogo:</label>
							</div>
							<div class="input-field col s8">
								<label for="categoria">Categoria</label>
								<select name="categoria">
									<option>Selecione. . .</option>
									<?php
										$todas = ListarCategorias();
										while($cat = $todas->fetch_object()){
											echo '<option value="'.$cat->cd.'">';
											echo $cat->nome;
											echo '</option>';
										}
									?>
								</select>
							</div>

							<div class="input-field col s4">
								<input class="btn" value="Cadastrar" type="submit"></input>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="row">
			
		</div>
	</div>
</body>
</html>

<?php
if(isset($_POST['nome'])){
	$sql = 'INSERT INTO jogo (nome, id_usuario, id_categoria) 
	VALUES ("'.$_POST['nome'].'", '.$_SESSION['cd'].', '.$_POST['categoria'].')';
	$res =$con-> query($sql);
	if($res){
    	msg("Jogo Cadastrado!");
	}else{
		msg("Erro ao cadastrar o jogo!!");
	}
}
?>