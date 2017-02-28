<?php

require './PHPMailer/PHPMailerAutoload.php';                          // localise le fichier PHPMailerAutoload

class SendMail{

    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";                                            //encodage utilisé
    $mail->isSMTP();
    $mail->Host = 'smtp.laposte.net';                                  // Server SMTP
    $mail->SMTPAuth = true;                                           // Si il y à une authentification
    $mail->Username = 'media.social@laposte.net';                   // SMTP mail
    $mail->Password = '123456Seven';                              // SMTP pass
    $mail->SMTPSecure = '';                                      // Encryption en TLS ou SSL
    $mail->Port = 587;                                          // Port TCP du server SMTP
    $mail->setFrom('media.social@laposte.net', 'Mailer');                         //Ton MailAddresse
    $mail->addAddress('vincent.gerard70@gmail.com', 'Joe User');                 // Celui qui receptionne
    $mail->addReplyTo('php.mail@laposte.net', 'Information');                     // Pour le réponse
    $mail->Subject = 'Confirmation de votre compte';                               //Sujet du eMail
    $mail->Body = '' .$token['token'].                                     //Body du eMail

    if(!$mail->send()) {
        echo 'Message pas envoyé !';                                     //Si ton message ne s'envoie pas
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    else {                                                                    //Si envoyé
        header('location: ./confirmation.php');                             //Retourne la page de confirmation
        }
}
?>