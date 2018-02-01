<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 31/01/2018
 * Time: 13:58
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    public $timestamps = true;
    protected $guarded = [];

}