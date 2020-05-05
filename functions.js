function uuid() {
	// Retorna um número randômico entre 0 e 15.
	function randomDigit() {

		// Se o browser tiver suporte às bibliotecas de criptografia, utilize-as;
		if (crypto && crypto.getRandomValues) {
		
			// Cria um array contendo 1 byte:
			var rands = new Uint8Array(1);
			
			// Popula o array com valores randômicos
			crypto.getRandomValues(rands);
			
			// Retorna o módulo 16 do único valor presente (%16) em formato hexadecimal
			return (rands[0] % 16).toString(16);
		} else {
		// Caso não, utilize random(), que pode ocasionar em colisões (mesmos valores
		// gerados mais frequentemente):
			return ((Math.random() * 16) | 0).toString(16);
		}
	}

	// A função pode utilizar a biblioteca de criptografia padrão, ou
	// msCrypto se utilizando um browser da Microsoft anterior à integração.
	var crypto = window.crypto || window.msCrypto;

	// para cada caracter [x] na string abaixo um valor hexadecimal é gerado via
	// replace:
	return 'xxxxxxxx-xxxx-4xxx-8xxx-xxxxxxxxxxxx'.replace(/x/g, randomDigit);
}
//
function desativarBotao(){
	$(function() {
		$("#tweetar").prop('disabled', true);
		$('#tweetar').css('cursor', 'default');
		
	});
}
function Tweet() 
{
	$(function() {
		const min = 1;
		const max = 280;
		desativarBotao();
		
		$("#textoHashTags").keyup(function() {
			// Conta caracteres.
			var tamanho = $("#textoHashTags").val().length;
				if(tamanho > max) { 
					desativarBotao()
					$("#aqui").html(tamanho);
				}
				else if(tamanho < min){
					desativarBotao()
					$("#aqui").html("");
				}
				else{
					$("#tweetar").prop('disabled', false);
					$('#tweetar').css('cursor', 'pointer');
					$("#aqui").html(tamanho);
				}				
			});
	});
}
//
function Guid(){
	$(document).ready(function(){
		jQuery.ajax({
			method: 'POST',
			url : "guid.php",
			data: {valor_guid: guid},
			async : true,
			/*beforeSend: function(){
				$("#guid").html("ENVIANDO...");
			}*/				
		})	
		.done(function(msg){
			$("#guid").html(msg);
		})
		.fail(function(jqXHR, textStatus, msg){
			alert(msg);
		});
	});
}