<?php

namespace App\Telegram;

use App\User;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Actions;

class TestCommand extends Command
{

    protected $name = 'test';


    protected $description = 'TestCommand command, Get a list of commands';

    public function handle()
    {
        $this->replyWithChatAction(['action'=>Actions::TYPING]);
        $user=User::find(1);
        $this->replyWithMessage(['text'=>'Поста пользоваткля а в :' .$user->email]);
        $telegramUser=\Telegram::getWebhookUpdates()['message'];
        $text=sprintf('%s: %s' . PHP_EOL , 'Dffdgd', $telegramUser['from']['id']);
        $text.=sprintf('%s: %s' . PHP_EOL , 'Dffdgd', $telegramUser['from']['username']);

        $this->replyWithMessage(compact('text'));

    }
}
