<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads_rows';
    public $timestamps = true;
    protected $guarded = [];
}