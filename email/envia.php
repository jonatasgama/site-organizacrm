<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.jgssistemas.com.br';  // Altere para o servidor SMTP que você deseja usar
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@jgssistemas.com.br'; // Altere para seu e-mail
        $mail->Password = '^cu[uWE%f2Sc'; // Altere para sua senha
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Destinatário e assunto
        $mail->setFrom('contato@jgssistemas.com.br', 'Contato do Site');
        $mail->addAddress('contato@jgssistemas.com.br');
        $mail->Subject = $subject;

        // Corpo do e-mail
        $mail->Body = "Nome: $name\nE-mail: $email\nMensagem: $message";

        $mail->send();
        echo "OK";
    } catch (Exception $e) {
        echo "Houve um erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>
