<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'person';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['name', 'birth_date', 'gender', 'cpf', 'phone', 'email'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey = 'idperson';

    /**
     * Definir para que não seja incluida as tabelas de data de criação e atualização
     * @var bool
     */
    protected $timestamp = false;

    /**
     * Campos que devem ser ocultados indendentemente da chamada
     * @var array
     */
    protected $hidden = [];

    public function getBirthDate($value){
        return date('d/m/Y',strtotime($value));
    }
}
