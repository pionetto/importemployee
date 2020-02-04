<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['matricula', 'nome', 'escolaridade'];
    protected $connection = 'pgsql';
}
