<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 23/02/2018
 * Time: 18:47
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EmailSchedule Extends Model
{
    protected $table = 'installation_schedule';
    public $timestamps = true;
    protected $guarded = [];


}