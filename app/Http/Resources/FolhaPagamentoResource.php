<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FolhaPagamentoResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $request->datacompetencia,
            $request->nome,
            $request->matricula,
            $request->cpf,
            $request->codlotacao,
            $request->nomelotacao,
            $request->codvinculo,
            $request->nomevinculo,
            $request->codfuncao,
            $request->nomefuncao,
            $request->datanascimento,
            $request->codescolaridade,
            $request->sexo,
            $request->dataadmissao,
            $request->codrecurso,
            $request->nomerecurso,
            $request->remuneracao
        ];
    }
}
