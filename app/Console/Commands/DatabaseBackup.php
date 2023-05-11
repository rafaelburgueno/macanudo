<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $comando = 'mysqldump -u '.env('DB_USERNAME').' -p'.env('DB_PASSWORD').' '.env('DB_DATABASE').' > '.$nombreArchivo;
        exec($comando);
        $this->info('Backup de la base de datos realizado con éxito');

        // envia el archivo al directorio de backups
        $comando = 'mv '.$nombreArchivo.' ../database-backups/';
        exec($comando);


        return Command::SUCCESS;
    }
}
