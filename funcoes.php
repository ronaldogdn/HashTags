<?php
define("DSN","mysql");
define("SERVIDOR","localhost");
define("USUARIO","root");
define("SENHA","");
define("BANCODEDADOS","sistemahashtags");

function conectar() {    
    try {
        $conn = new PDO(DSN.':host='.SERVIDOR.';dbname='.
        BANCODEDADOS, USUARIO, SENHA);
        return $conn;
    } catch (PDOException $e) {
        echo ''.$e->getMessage();
    }
}

function salvar($tweet, $matches)
{
	$cont = 1;
	$conn = conectar();
	$stmt = $conn->prepare("insert into tbmensagem 
							(mensagem) values(:mensagem)
						  ");
	$stmt->bindParam(':mensagem',$tweet);
	$stmt->execute();
	//pega o último ID inserido
	$id_mensagem = $conn->lastInsertId(); 
	foreach($matches as $tags)
	{
		foreach($tags as $tag)
		{
			$resultado = buscaTag($tag);
			if($resultado == FALSE || $resultado['contador'] == 0)
			{
				//insere na tabela de tags
				$stmt = $conn->prepare("insert into tbtags 
									(tags,contador) values(:tag, :contador)");
				$stmt->bindParam(':tag',$tag);
				$stmt->bindParam(':contador',$cont);
				$stmt->execute();
				$id_tag = $conn->lastInsertId(); 
				//insere os IDs da tabela N:N mensagem_tags
				$stmt = $conn->prepare("insert into mensagem_tags
									(fk_mensagem,fk_tag) values(:id_msg, :id_tag)");
				$stmt->bindParam(':id_msg',$id_mensagem);
				$stmt->bindParam(':id_tag',$id_tag);
				$stmt->execute();
			}
			else{
				$stmt = $conn->prepare("update tbtags
										set contador = :cont
										where id = :id 
										");
				$stmt->bindParam(':id',$resultado['id']);
				$resultado['contador'] += 1;
				$stmt->bindParam(':cont',$resultado['contador']);
				$stmt->execute();
				//insere os IDs da tabela N:N mensagem_tags
				$stmt = $conn->prepare("insert into mensagem_tags
									(fk_mensagem,fk_tag) values(:id_msg, :id_tag)");
				$stmt->bindParam(':id_msg',$id_mensagem);
				$stmt->bindParam(':id_tag',$resultado['id']);
				$stmt->execute();
			}
		}
	}
}
function buscaTag($tag)
{
	$conn = conectar();
	$stmt = $conn->prepare("select id,contador from tbtags 
					       where tags = :tag LIMIT 1");
    $stmt->bindParam(':tag',$tag);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function listarTodasTags()
{
	$conn = conectar();
	$stmt = $conn->prepare("select id,tags,contador from tbtags 
							order by contador DESC
					        ");
	$stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listarTweets($id)
{
	$conn = conectar();
	$stmt = $conn->prepare("select mensagem from tbmensagem  
							INNER JOIN mensagem_tags AS MT ON (MT.id = tbmensagem.id )
							WHERE MT.fk_tag = :id
							");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}











