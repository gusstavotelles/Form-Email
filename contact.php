<?php

	require("PHPMailer/src/PHPMailer.php");
	require("PHPMailer/src/SMTP.php");
		
	$mail->IsMail();
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

	// Definimos Para quem vai ser enviado o email
    $para = "gustavinho-telles2011@hotmail.com";
	// Resgatar os dados digitados no formulário e  grava em suas respectivas variáveis 
	$nome = $_POST['nomeRemetente'];
	$assunto = $_POST['assunto'];
	$emailRemetente = $_POST['emailRemetente'];
	$mensagem = $_POST['mensagem'];
	$senha = $_POST['senha'];

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // Usar 465 (ou 587) como porta SMTP
    $mail->IsHTML(true);
    $mail->Username = ($emailRemetente); //"guustavotelles@gmail.com"; // Usuário do servidor SMTP (endereço de email)
    $mail->Password = $senha; // Senha do servidor SMTP (senha do email usado)
    $mail->SetFrom($emailRemetente); //("From: " . $nomeRemetente . " <" . $emailRemetente . ">" . "\r\n" . "Reply-To: " . $emailRemetente); //("guustavotelles@gmail.com");
    $mail->Subject = $assunto;
    $mail->Body = $mensagem; // "hello";
    $mail->AddAddress ($para); //("contato@gw.eng.br");
	$mail->Send();
	if(!$mail->Send()){
		echo "Error sending: " . $mail->ErrorInfo;
	}
	else	{
		echo "Mensagem enviada com sucesso</p>\n";
	}
?>

