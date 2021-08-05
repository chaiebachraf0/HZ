<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productinv extends Model
{
    protected $fillable = ['id_product','Enstock','Libelle','id_inv'];
    use HasFactory;
}
