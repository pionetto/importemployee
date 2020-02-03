<?php

namespace App\Exports;

use App\FolhaPagamento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection;

class RelatorioSicgesp implements FromCollection{
    public function collection()
    {
        return new Collection([
            FolhaPagamento::first()
        ]);
        // return FolhaPagamento::first();
        // return new Collection([
        //     [1, 2, 3],
        //     [4, 5, 6]
        // ]);
    }
}