<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    protected $table = 'fp_calculomovimento';
    protected $connection = 'siap';
    protected $primaryKey = 'fp_calculoservidorid';
    public $incrementing = false;
    protected $keyType = 'string';

    public function escolaridade(){
        return $this->belongsTo(Employee::class, 'fp_calculoservidorid', 'matricula' );
    }

    public function folha()
    {
        return $this->belongsTo(Folha::class, 'fp_calculofolhaid', 'folhaid')->competencia($this->fp_calculocompetencia);
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
            
            switch ($this->rubrica->first()->fp_calculoverbaid) {
                case '1017': return '0'; break;
                case '2039': return '0'; break;
                case '2254': return '0'; break;
                case '3084': return '0'; break;
                case '2778': return '0'; break;
                case '3999': return '0'; break;
                case '1002': return '0'; break;
                case '1009': return '0'; break;
                case '1012': return '0'; break;
                case '1013': return '0'; break;
                case '2063': return '0'; break;
            }
            return '180';
        }
        return $this->fp_calculohoraaula;
    }

    public function getCodVinculoAttribute()
    {
        return !empty($this->folha->folhatipo) ? $this->folha->folhatipo : null;
    }
    
    public function getNomeVinculoAttribute()
    {
        if (empty($this->folha->folhatipo)) return null;

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
        return !empty($this->funcionario->fp_calculoservidorcpf) ? $this->funcionario->fp_calculoservidorcpf : null;
    }

    public function getDataCompetenciaAttribute()
    {
        return !empty($this->folha->folhareferencia) ? $this->folha->folhareferencia : null;
    }
    
    public function getDataNascimentoAttribute()
    {
        return !empty($this->funcionario->fp_calculoservidornascto) ? $this->funcionario->fp_calculoservidornascto : null;
    }

    public function getSexoAttribute()
    {
        return !empty($this->funcionario->fp_calculoservidorsexo) ? $this->funcionario->fp_calculoservidorsexo : null;
    }

    public function getNomeAttribute()
    {
        return trim($this->fp_calculoservidornome, ' ');
    }

    public function getMatriculaAttribute()
    {
        return $this->fp_calculoservidorid;
    }

    public function getCodLotacaoAttribute()
    {
        return $this->fp_calculolotacaoid;
    }

    public function getNomeLotacaoAttribute()
    {
        return trim($this->fp_calculolotacaodescricao, ' ');
    }

    public function getCodFuncaoAttribute()
    {
        return $this->fp_calculofuncaoid;
    }

    public function getNomeFuncaoAttribute()
    {
        return trim($this->fp_calculofuncaodescricao, ' ');
    }

    public function getDataAdmissaoAttribute()
    {
        return $this->fp_calculoservidoradmissao;
    }

    public function getCodRecursoAttribute()
    {
        return !empty($this->folha->fp_recursoid) ? $this->folha->fp_recursoid : null;
    }

    public function getNomeRecursoAttribute()
    {
        if (empty($this->folha->recurso->fp_recursodescricao)) return null;
        return trim($this->folha->recurso->fp_recursodescricao, ' ');
    }

    public function getRemuneracaoAttribute()
    {
        return $this->fp_calculobruto;
    }

    public function getCodEscolaridadeAttribute()
    {
        return !empty($this->escolaridade->escolaridade) ? $this->escolaridade->escolaridade : null;
    }
}