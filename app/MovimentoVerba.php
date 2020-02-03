<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentoVerba extends Model
{
    protected $connection = 'siap';
    protected $table = 'fp_calculomovimentoverbas';

    public function scopeCompetencia($query, $competencia)
    {
        return $query->where('fp_calculocompetencia', '=', $competencia);
    }
}
