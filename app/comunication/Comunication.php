<?php

namespace app\comunication;

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;
use TelegramBot\Api\Exception;
use TelegramBot\Api\Types\Update;

class Comunication
{

    private $bot;
    private $token;

    public function __construct($token)
    {
        $this->bot = new BotApi($token);
        return $this->bot->sendMessage(1450126657, "Vamos começar a configurar sua base de dados");
    }

    public function clientCommunication($token, $option)
    {
        $this->token = $token;
        try {
            $bot = new Client($this->token);

            $bot->command('connection', function($message) use ($bot){
                $bot->sendMessage($message->getChat()->getId(), "Escolhi Mysql");
            });


        $bot->on(function (Update $update) use ($bot) {
                $message = $update->getMessage();
                $id = $message->getChat()->getId();
                $bot->sendMessage($id, 'Your message: ' . $message->getText());
            }, function () {
                return true;
            });


            $bot->run();
        } catch(Exception $e) {
            $e->getMessage();
        }
        
    }
}