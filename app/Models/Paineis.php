<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paineis extends Model
{
    use HasFactory;

    protected $table = 'paineis';

    protected $fillable = ['dsc_nome_painel', 'dsc_descricao_painel', 'dsc_link_painel', 'image'];
}
