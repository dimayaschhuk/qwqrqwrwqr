<?php

namespace App\Telegram;

use App\User;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Actions;

class FirstCommand extends Command
{

    protected $name = 'first';


    protected $description = 'FirstCommandFirstCommand';

    public function handle($arguments)
    {
        Log::info('TestCommand');
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $user = User::find(1);
        $this->replyWithMessage(['text' => 'Поста пользоваткля а в :' . $user->email]);
        $telegramUser = \Telegram::getWebhookUpdates()['message'];
        $text = sprintf('%s: %s' . PHP_EOL, 'Dffdgd', $telegramUser['from']['id']);
        $text .= sprintf('%s: %s' . PHP_EOL, 'Dffdgd', $telegramUser['from']['username']);

        $this->replyWithMessage(compact('text'));

    }
}
