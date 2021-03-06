<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 19:43
 */
class My_Mailer
{

    private $transport;

    /**
     * My_Mailer constructor.
     */
    public function __construct()
    {
        $this->transport = $transport = Swift_SmtpTransport::newInstance($_ENV["MAILER_HOST"], $_ENV["MAILER_PORT"], $_ENV["MAILER_SECURITY"])
            ->setUsername($_ENV["MAILER_LOGIN"])
            ->setPassword($_ENV["MAILER_PASSWORD"]);
    }


    public function send($email, $text)
    {
        $message = Swift_Message::newInstance();

        $message->setSubject('Feedback')
            ->setFrom($_ENV["MAILER_LOGIN"])
            ->setTo($_ENV["MAILER_RECEIVE"])
            ->setBody("From:".$email."\n".$text);

        $mailer = Swift_Mailer::newInstance($this->transport);

        $result = $mailer->send($message);

        return $result;
    }
}