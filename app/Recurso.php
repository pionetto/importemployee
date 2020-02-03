<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $connection = 'siap';
    protected $table = 'fp_recurso';
}
