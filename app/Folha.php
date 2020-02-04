<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folha extends Model
{
    protected $connection = 'siap';
    protected $table = 'fp_folha';
    protected $primaryKey = 'folhaid';

    public function recurso()
    {
        return $this->belongsTo(Recurso::class, 'fp_recursoid', 'fp_recursoid');
    }
}
