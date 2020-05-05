<?php
	session_start();
	require_once "funcoes.php";
	$guid = 0;
	if(!empty($_SESSION['guid']))
	{
		$guid = $_SESSION['guid'];
	}
	if(!empty($_POST['mensagem']))
	{		
		$mensagem = $_POST['mensagem'];
		//separa por # a palavra
		//w é qualquer alfanumérico 
		//+ é o resto da palavra
		$pattern = '/#\w+/';
		$matches = array();
		$resultado = preg_match_all($pattern, $mensagem, $matches);
		if($resultado > 0)
		{
			//var_dump( $resultado, $matches);		
			salvar($mensagem, $matches);
		}
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="modal-css.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script type="text/javascript" src="functions.js"></script>
	<title> hashTags</title>
	<script>
		//var guid = uuid();
	</script>
</head>

<body>
	<div class="container">	
		<section class="alert alert-primary">
		<fieldset>
		<legend>O que você está sentido:</legend>
			<form method="post">	
				<div class="form-group">
					<textarea placeholder="Coloque suas #Tags" class="form-control" name="mensagem" id="textoHashTags" rows="5"></textarea>
				</div> 
				<div id="aqui"></div>
				<button id="tweetar" class="btn btn-primary" type="submit">Tweetar</button>
			</form>
		</fieldset>	
		</section>
		<aside >
			<h2>Tendências de Brazil</h2>
			<h6>assuntos do momento</h6>
			<div class="card" style="width: 25rem;">
				<ul class="list-group list-group-flush">
			<?php
				$matriz = listarTodasTags();
				if($matriz != FALSE){
					//var_dump($matriz);
					foreach($matriz as $vetor){
						//var_dump($vetor);					
			?>	 
    			<li class="list-group-item">
					<a href="tendencias.php?id=<?=$vetor['id'].$guid?>"> 
							<?=$vetor['tags']?> 							
					</a>
					</br>
					<?=$vetor['contador']; echo " tweets" ?>
			   </li>
						
			<?php						
					}
				}
				else{
					echo "<h5>Não há assuntos do momento</h5>";
				}				
			?>
			</ul>
			</div>
		</aside>
		<div id="guid">
		</div>
			
	</div>	
	<script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous">
	</script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
	<script>
		Tweet();
		var guid = uuid();
		Guid();			
	</script>
</body>
</html>








