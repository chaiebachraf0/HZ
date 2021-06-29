<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depense extends Model
{
    public $timestamps = false;
    protected $fillable =['type','fournisseur','montant','categorie','datereg','note'];
}
