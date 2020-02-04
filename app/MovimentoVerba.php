<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentoVerba extends Model
{
    protected $connection = 'siap';
    protected $table = 'fp_calculomovimentoverbas';
    protected $primaryKey = 'fp_calculoservidorid';

    public function scopeCompetencia($query, $competencia)
    {
        return $query->where('fp_calculocompetencia', '=', $competencia);
    }
}
