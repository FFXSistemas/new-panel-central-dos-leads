<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 21/02/2018
 * Time: 10:57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RecoveryPassword extends Model
{
    protected $table = 'recovery_password';
    public $timestamps = true;
    protected $guarded = [];
}