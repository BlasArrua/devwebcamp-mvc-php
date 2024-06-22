<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = $_ENV['EMAIL_HOST'];
         $mail->SMTPAuth = true;
         $mail->Port = $_ENV['EMAIL_PORT'];
         $mail->Username = $_ENV['EMAIL_USER'];
         $mail->Password = $_ENV['EMAIL_PASS'];
         $mail->SMTPSecure = 'tls';
         $mail->setFrom('b.paginasweb@gmail.com');
         $mail->addAddress($this->email, $this->nombre);
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = "<html>";
         $contenido .= " Hola <strong>". $this->nombre."</strong>. ";
         $contenido .= "<p>Has REGISTRADO CORRECTAMENTE tu cuenta en DevWebCamp, pero es necesario confirmarla.</p>";
         $contenido .= "<p>Presiona aquí para hacerlo: <a href='" . $_ENV['HOST'] . "/confirmar-cuenta?token=" . $this->token . "'>CONFIRMAR CUENTA</a>";       
         $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar el mensaje.</p>";
         $contenido .= "<p>Soporte - <strong>DevWebcamp</strong>-</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();

    }

    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('b.paginasweb@gmail.com');    
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= " Hola <strong>" . $this->nombre .  "</strong><br>.Has solicitado REESTABLECER TU PASSWORD, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/reestablecer?token=" . $this->token . "'>REESTABLECER PASSWORD</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= "<p>Soporte - <strong>DevWebcamp</strong> -</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}