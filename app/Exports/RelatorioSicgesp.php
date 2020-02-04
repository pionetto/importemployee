<?php

namespace App\Exports;

use App\FolhaPagamento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Http\Resources\FolhaPagamentoResource;

class RelatorioSicgesp implements WithHeadings, FromCollection
{
    use Exportable;

    protected $ano;
    protected $mes;

    public function __construct(string $ano, string $mes) {
        $this->ano = $ano;
        $this->mes = $mes;
    }

    // public function query()
    // {
    //     return FolhaPagamento::query()->ano($this->ano)->mes($this->mes);
    // }

    public function collection()
    {
        return new FolhaPagamentoResource(
            FolhaPagamento::all()
        );
    }
    
    public function headings(): array
    {
        return [
            'COMPETENCIA',
            'NOME',
            'MATRICULA',
            'CPF',
            'COD LOTAÇÃO',
            'NOME LOTAÇÃO',
            'COD VINCULO',
            'NOME VINCULO',
            'COD FUNÇÃO',
            'NOME FUNÇÃO',
            'DATA NASCIMENTO',
            'ESCOLARIDADE',
            'SEXO',
            'DATA ADMISSÃO',
            'COD RECURSO',
            'NOME RECURSO',
            'REMUNERAÇÃO',
        ];
    }
    
    // public function map($row) : array
    // {
    //     return [
    //         $row->datacompetencia,
    //         $row->nome,
    //         $row->matricula,
    //         // $row->cpf,
    //         $row->codlotacao,
    //         $row->nomelotacao,
    //         $row->codvinculo,
    //         $row->nomevinculo,
    //         $row->codfuncao,
    //         $row->nomefuncao,
    //         // $row->datanascimento,
    //         $row->codescolaridade,
    //         // $row->sexo,
    //         $row->dataadmissao,
    //         $row->codrecurso,
    //         $row->nomerecurso,
    //         $row->remuneracao
    //     ];
    // }
}