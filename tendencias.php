<?php
	require_once "funcoes.php";

	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$id = substr($id,0,1);
		$resultados = listarTweets($id);
	}
	else{
		header('Location: index.php');
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
	<title> Tendências de Tweets</title>
</head>

<body>
	<div class="container">	
		<div class="alert alert-primary" role="alert">
			<div class="card" style="width: 35rem;">
				<ul class="list-group list-group-flush">
					<?php
						if($resultados != FALSE)
						{
							foreach($resultados as $tags)
							{
					?>
					<li class="list-group-item"><?=$tags['mensagem'];?></li>
					<?php
							}
						}
						else
						{
							header('Location: index.php');
							
						}
					?>
				</ul>
			</div>						
		</div>
		
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>








