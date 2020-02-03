<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Employee;

class EmployeesImport implements ToModel{
    function model(array $row){
        return new Employee([
            'matricula'=>$row[0],
            'nome'=>$row[1],
            'escolaridade'=>$row[17],
        ]);
    }
}