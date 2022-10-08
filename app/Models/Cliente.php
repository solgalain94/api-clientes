<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'apellido', 'cuil', 'nacimiento', 'domicilio', 'telefono', 'email'];

}
