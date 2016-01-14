# laravel-telegram-event-output
Laravel extension to send command output trough telegram bots

## requirements

`laravel-telegram-event-output` requires another Laravel extension: [irazasyed/telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk). This requirement is managed by Composer and you should don't care for it. Although this, some configurations of `telegram-bot-sdk` are required.

## installation

Download using composer:

    composer require alberto-bottarini/laravel-telegram-event-output
    
Edit `config/app.php` and add a new ServiceProvider:

    Telegram\Bot\Laravel\TelegramServiceProvider::class
    
and a new Alias:

    'Telegram'  => Telegram\Bot\Laravel\Facades\Telegram::class
    
Publish telegram configuration executing:

    php artisan vendor:publish --provider=irazasyed/telegram-bot-sdk
    
Edit `config/telegram.php` or `.env` and add your Telegram chat id. This will be the chat/group that will receive Laravel notification.
    
Improve your `App\Console\Kernel` with a new Trait:

     use \AlbertoBottarini\LaravelTelegramEventOutput\TelegramConsoleKernel;
     
## usage

Thanks to the trait, from this moment, your ConsoleEvent presents a new method: `telegramOutputTo` that should call in the same way you call `emailOutputTo`.

