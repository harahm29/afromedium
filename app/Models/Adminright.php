<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminright extends Model
{
    use HasFactory;
    protected $table = 'admin_rights';
    protected $primaryKey = 'id';
    protected $fillable = ['type','name' ];
}
