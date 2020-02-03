<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    protected $table = 'fp_calculomovimento';
    protected $connection = 'siap';

    public function escolaridade(){
        return $this->belongsTo(Employee::class, 'fp_calculoservidorid', 'matricula' );
    }

    public function folha()
    {
        return $this->belongsTo(Folha::class, 'fp_calculocompetencia', 'folhareferencia');
    }

    public function rubrica()
    {
        return $this->hasMany(MovimentoVerba::class, 'fp_calculoservidorid', 'fp_calculoservidorid')
                    ->competencia($this->fp_calculocompetencia);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'fp_calculoservidorid', 'fp_calculoservidorid');
    }

    public function scopeAno($query, $ano)
    {
        return $query->whereRaw('substring(fp_calculocompetencia, 1, 4) = ?', $ano);
    }

    public function scopeMes($query, $mes)
    {
        return $query->whereRaw('substring(fp_calculocompetencia, 5, 6) = ?', $mes);
    }

    public function scopeMatricula($query, $matricula)
    {
        return $query->where('fp_calculoservidorid', '=', $matricula);
    }

    public function getCargaHorariaAttribute()
    {
        if ($this->fp_calculohoraaula == '0'){
            if ($this->rubrica->first()->fp_calculoverbaid == '1017') {
                return '0';
            }
            return '180';
        }
        return $this->fp_calculohoraaula;
    }

    public function getVinculoAttribute()
    {
        switch ($this->folha->folhatipo) {
            case '1':
                return 'EFETIVO';
                break;
            case '2':
                return 'DAS';
                break;
            case '3':
                return 'TEMPORARIO';
                break;
        }
    }

    public function getCpfAttribute()
    {
        return $this->funcionario->fp_calculoservidorcpf;
    }

    public function getDataCompetenciaAttribute()
    {
        return $this->folha->folhareferencia;
    }
    
    public function getDataNascimentoAttribute()
    {
        return $this->folha->fp_calculoservidornascto;
    }

    public function getSexoAttribute()
    {
        return $this->folha->fp_calculoservidorsexo;
    }

}