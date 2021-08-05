<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaire extends Model
{
    use HasFactory;
    protected $fillable = ['id_product','Nom_product','note','date_creation','Enstock','quanaj'];
}
