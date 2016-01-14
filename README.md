# laravel-telegram-event-output
Laravel extension to send command output trough telegram bots

## requirements

`laravel-telegram-event-output` requires another Laravel extension: [irazasyed/telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk). This requirement is managed by Composer and you should don't care for it. Although this, some configurations of `telegram-bot-sdk` are required.

## installation

Download using composer:

```shell
composer require alberto-bottarini/laravel-telegram-event-output
```
    
Edit `config/app.php` and add a new ServiceProvider:
```php
Telegram\Bot\Laravel\TelegramServiceProvider::class
```
    
and a new Alias:

```php
'Telegram'  => Telegram\Bot\Laravel\Facades\Telegram::class
```
    
Publish telegram configuration executing:

```shell
php artisan vendor:publish --provider=irazasyed/telegram-bot-sdk
```
    
Edit `config/telegram.php` or `.env` and add your Telegram API token id. This will be provided by BotFather. [Here](https://core.telegram.org/bots) you can find some documentation.
    
Improve your `App\Console\Kernel` with a new Trait:

```php
use \AlbertoBottarini\LaravelTelegramEventOutput\TelegramConsoleKernel;
```
     
## usage

Thanks to the trait, from this moment, your ConsoleEvent presents a new method: `telegramOutputTo` that should call in the same way you call `emailOutputTo`. This method accept a required parameter `chatId`. This will be the id of the chat/group where you want to receive the command notification. You can obtain this using getUpdates BOT command ([documentation](https://core.telegram.org/bots/api)).

## example

```php
$telegramChatId = 1234567890;
$schedule->command('inspire')->cron('* * * * *')
    ->sendOutputTo(storage_path('logs/test.log'))
    ->telegramOutputTo($telegramChatId);
```