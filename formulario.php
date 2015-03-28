<?
// Coloque a mensagem que irá ser enviada para
//seu e-mail abaixo:
// $msg = "Mensagem enviada em ".date("d/m/Y").", os dados seguem abaixo: ";


// while(list($campo, $valor) = each($HTTP_POST_VARS))
// {
//   $msg .= ucwords($campo).": ".$valor."
// ";
// }
// // Agora iremos fazer com que o PHP envie os dados do
// //Formulário para seu e-mail: 
// mail("espacoanimalveterinaria@espacoanimalveterinaria.com.br",  "Assunto do E-mail",$msg,"From: $REMOTE_ADDR");
// echo "Seu e-mail foi enviado com sucesso. Obrigado";


// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nome     			 = $_REQUEST['nome'];
$email   			 = trim($_REQUEST['email']);
$emaildestinatario 	 = 'atendimento@espacoanimalveterinaria.com.br'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$mensagem         	 = $_REQUEST['mensagem'];
$assunto 			 = $_REQUEST['assunto'];

 

$data = date("d/m/y"); //pega a data
$ip = $_SERVER['REMOTE_ADDR']; //pega o ip de quem enviou
$hora = date("H:i"); //pega a hora
$url = $_SERVER['REMOTE_URI']; 
$servername = $_SERVER['SERVER_NAME'];






/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '
<div style="padding:20px; background: #EDEFF0; padding: 40px 0; width:100%; margin:0"> 
	<div style="width: 480px; margin: 0 auto;">
		<a style="margin:  0 auto; display: block;" href="http://espacoanimalveterinaria.com.br/">
			<img style="margin:  0 auto; display: block;" alt="Logotipo: Espaço Animal Veterinária" src="http://espacoanimalveterinaria.com.br/static/imagens/marca_petshop.png">  
		</a>
		<h1 style="font-size:24px; text-align: center;">Mensagem de '.$nome.' </h1>
		<h3 style="font-size:17px; text-align: center; color: #909AA6;font-weight: 100;">Email enviado pelo site por '.$nome.' : '.$email.'   </h3>
	</div>
	<div style="width:480px;padding: 20px;background:#ffffff;margin:0 auto;border:1px solid #ccc;border-radius: 6px;">
		<h4 style="font-size:18px;color:#684736;margin: 0;">Dados do formulário preenchido</h4>
		<hr style="border:1px solid #E8EBED">
		<p style="font-size:16px;"> <span>Assunto</span>  <span style="color:#50B25A; font-style: italic;">" '.$assunto.' "</span> </p>
		<p style="font-size:16px;"> <span>Mensagem:</span> <span style="color:#50B25A; font-style: italic;">" '.$mensagem.' "</span> </p>
		<small> Formulário preenchido por <strong>'.$nome.' </strong> no dia <strong>'.$data.'</strong> às <strong>'.$hora.'</strong> horas
		<br> IP do usuário <strong>'.$ip.'</strong> e site: <strong>'.$servername.' </strong>, </small>
	</div>
</div>';


 

// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: [$nome] <$email>\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
 
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
  





// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers_ = "MIME-Version: 1.1\r\n";
$headers_ .= "Content-type: text/html; charset=utf-8\r\n";
$headers_ .= "From: [Espaço Animal] <$emaildestinatario>\r\n"; // remetente

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML2 = '
<div style="padding:20px; background: #EDEFF0; padding: 40px 0; width:100%; margin:0"> 
	<div style="width: 480px; margin: 0 auto;">
		<a style="margin:  0 auto; display: block;" href="http://espacoanimalveterinaria.com.br/">
			<img style="margin:  0 auto; display: block;" alt="Logotipo: Espaço Animal Veterinária" src="http://espacoanimalveterinaria.com.br/static/imagens/marca_petshop.png">  
		</a>
		<h1 style="font-size:24px; text-align: center;">Olá '.$nome.', </h1>
		<h3 style="font-size:17px; text-align: center; color: #909AA6;font-weight: 100;">Obrigado pelo contato, seu email chegou em nosso servidor  em breve entraremos em contato.</h3>
	</div>
	<div style="width:480px;padding: 20px;background:#ffffff;margin:0 auto;border:1px solid #ccc;border-radius: 6px;">
		<h4 style="font-size:18px;color:#684736;margin: 0;">Dados do formulário preenchido</h4>
		<hr style="border:1px solid #E8EBED">
		<p style="font-size:16px;"> <span>Assunto</span>  <span style="color:#50B25A; font-style: italic;">" '.$assunto.' "</span> </p>
		<p style="font-size:16px;"> <span>Mensagem:</span> <span style="color:#50B25A; font-style: italic;">" '.$mensagem.' "</span> </p>
		<small> Formulário preenchido por <strong>'.$nome.' </strong> no dia <strong>'.$data.'</strong> às <strong>'.$hora.'</strong> horas
		<br> IP do usuário <strong>'.$ip.'</strong> e site: <strong>'.$servername.' </strong>, </small>
	</div>
</div>';

 mail($email,$assunto,$mensagemHTML2,$headers_); 
  


	header("Location: mensagem-enviada.php");


?>


