<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\RelatorioSicgesp;
use Maatwebsite\Excel\Facades\Excel;

class ExportRelatorio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:relatorio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportar relatorio Sicgesp Excel';

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
     * @return mixed
     */
    public function handle()
    {
        $ano = $this->ask('Qual ano você deseja consultar?');
        $mes = $this->ask('Qual mês você deseja consultar?');

        Excel::store(new RelatorioSicgesp(strval($ano), strval($mes)), 'teste.xlsx');
    }
}
