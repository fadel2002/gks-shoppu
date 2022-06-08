<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ["email", "username", "password", "a_no_hp"];
    protected $table = 'account';
    protected $primaryKey = 'a_id';
}
