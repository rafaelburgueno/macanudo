<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\GenerarUnNuevoPedido;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDeStock;


class Kernel extends ConsoleKernel
{

    protected $commands = [
        // Aquí van las clases de tus comandos
        GenerarUnNuevoPedido::class,
    ];

    /**
     * Define el cronograma de comandos de la aplicación.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->command('pedido:generar')->everyMinute();
        $schedule->command('pedido:generar')->daily();

        // realizar un backup de la base de datos cada dos días
        //$schedule->command('database:backup')->everyTwoDays();
        $schedule->command('database:backup')->daily();

        // eviar un correo cada 5 minutos a rburg@vivaldi.net con el texto 'tarea programada cada 5 minutos'.
        /*$schedule->call(function () {
            Mail::to('rburg@vivaldi.net')->queue(new EmailDeStock('email cada 5 minutos'));
        })->everyFiveMinutes();*/
        // })->hourlyAt(15);



    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
