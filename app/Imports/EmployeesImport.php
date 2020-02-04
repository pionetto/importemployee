<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Employee;

class EmployeesImport implements ToModel{
    function model(array $row){
        return new Employee([
            'matricula'=> str_pad($row[0], 5, '0', STR_PAD_LEFT),
            'nome'=> $row[1],
            'escolaridade'=> $row[17],
        ]);
    }
}