<?php

namespace App\Console\Commands;

use App\Events\NotificacionEvent;
use App\Events\NotificacionPaciente;
use App\Models\Consulta;
use Illuminate\Console\Command;

class Notificacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notificacion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hola';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $consulta = Consulta::find(1)->load('user', 'paciente');
        event(new NotificacionEvent($consulta));
        event(new NotificacionPaciente($consulta));
    }
}
