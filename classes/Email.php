<?php
	
	class Email
	{

		function __construct(){

		//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer;
	
			//Server settings
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'contato@jbwebdesigner.com.br';                     //SMTP username
			$mail->Password   = 'Bosco@39iee9i3!$';                               //SMTP password
			$mail->SMTPSecure = 'SSL';            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('contato@jbwebdesigner.com.br', 'João Bosco');
			$mail->addAddress('joao.bosco@srh.ce.gov.br', 'Brenda Lopes');     //Add a recipient
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Cadastro de Nova Barragem';
			$mail->Body    = 'Olá! foi evetuado o cadastro de uma nova barragem através do formulário no site da Secretaria dos Recursos Hídricos.</b>';
			$mail->AltBody = 'Se o corpo não aceita html';

			if(!$mail->send()){
			echo 'Message could not  be sent.';
			echo 'Maler Error: ' . $mail->ErrorInfo;
			} else {
			echo "A mensagem foi enviada com sucesso!";
			}
		}
		/*
		private $mailer;

		public function __construct($host,$username,$senha,$name){
			
			$this->mailer = new PHPMailer;

			$this->mailer->isSMTP();                                      // Set mailer to use SMTP
			$this->mailer->Host = 'smtp.gmail.com';  				  // Specify main and backup SMTP servers
			$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mailer->Username = 'joao.bosco@srh.ce.gov.br';                 // SMTP username
			$this->mailer->Password = 'Badeco@39iee9i3!$';                           // SMTP password
			$this->mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$this->mailer->Port = 465;                                    // TCP port to connect to

			$this->mailer->setFrom($username,$name);
			$this->mailer->isHTML(true);                                  // Set email format to HTML
			$this->mailer->CharSet = 'UTF-8';

		}

		public function addAdress($email,$nome){
			$this->mailer->addAddress($email,$nome);
		}

		public function formatarEmail($info){
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['corpo'];
			$this->mailer->AltBody = strip_tags($info['corpo']);
		}

		public function enviarEmail(){
			if($this->mailer->send()){
				return true;
			}else{
				return false;
			}
		}

		*/

	}
?>