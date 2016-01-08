<?php

namespace AlbertoBottarini\LaravelTelegramEventOutput;

use Illuminate\Support\ServiceProvider;

class TelegramEventOutputServiceProvider extends ServiceProvider
{
	
    public function boot()
    {
        $this->publishes([
            $this->config_filepath => config_path('telegram-output.php'),
        ]);
    }

	public function register()
    {
        $this->registerAnalytics();
        $this->config_filepath = __DIR__.'/config/telegram-output.php';
        $this->mergeConfigFrom($this->config_filepath, 'telegram-output');
    }

}
