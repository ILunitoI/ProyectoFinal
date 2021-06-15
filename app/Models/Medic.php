<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'id_card', 'sales_rep', 'email', 'user', 'password'];
}
