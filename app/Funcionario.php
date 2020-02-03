<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $connection = 'siap';
    protected $table = 'fp_calculo';
}
