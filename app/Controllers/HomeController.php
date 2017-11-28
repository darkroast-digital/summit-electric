<?php

namespace App\Controllers;

use App\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;


class HomeController extends Controller
{
    public function index($request, $response, $args)
    {

        return $this->view->render($response, 'home.twig');
    }

    public function post($request, $response, $args)
    {
        $mail = new PHPMailer;
        $params = $request->getParams();

        $name = $params['name'];
        $email = $params['email'];
        $company = $params['company'];
        $subject = $params['subject'];
        $message = $params['message'];

        if(isset($params['phone'])) {
             $phone = $params['phone'];
             $subject = "New query from Summit-Electric.com";
        } else {
            $subject = $name . " is requesting a quote.";
        }

        $mail->setFrom($email, $name);
        $mail->addAddress('sales@summit-electric.com', 'Summit Electric');
        $mail->addReplyTo('sales@summit-electric.com', 'Summit Electric');
        $mail->ReutrnPath='sales@summit-electric.com';

        $mail->isHTML(true);

        if(isset($params['phone'])) {
            $body = 'Name: ' . $name . "<br/> Company: " . $company . " <br/>Subject: " . $subject . "<br/> Email: " . $email . " <br/>Phone: " . $phone . "<br/>" .
                    'Message: ' . $message;
        } else {
            $body = 'Name: ' . $name . "<br/> Company: " . $company . " <br/>Subject: " . $subject . "<br/> Email: " . $email . "<br/>" .
                    'Message: ' . $message;
        }

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Success!';
        }

    }
}
