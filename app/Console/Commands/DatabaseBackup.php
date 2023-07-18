<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDeControl;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup de la base de datos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $fecha = date('Y-m-d_H-i-s');
        $nombreArchivo = 'backup_'.$fecha.'.sql';
        $comando = '/usr/bin/mysqldump -u '.env('DB_USERNAME').' -p"'.env('DB_PASSWORD').'" '.env('DB_DATABASE').' > '.$nombreArchivo;
        
        //exec($comando);
        exec($comando, $output, $return_var);

        // envia un email con $output
        $data = [
            'output' => $output,
            'return_var' => $return_var
        ];
        /*Mail::send('emails.backup', $data, function($message) use ($data) {
            $message->to('')->subject('Backup de la base de datos');
        });*/
        //Mail::to(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($data));


        // Imprime la salida en la consola
        foreach ($output as $line) {
            $this->info($line);
        }

        // Verifica si hay errores
        if ($return_var !== 0) {
            $this->error('Ocurrió un error al ejecutar el comando mysqldump');
        } else {
            $this->info('Backup de la base de datos realizado con éxito');
        }

        //$this->info('Backup de la base de datos realizado con éxito');

        // envia el archivo al directorio de backups
        $comando = 'mv '.$nombreArchivo.' ../database-backups/';
        exec($comando);


        return Command::SUCCESS;
    }
}
