<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 30/01/2018
 * Time: 14:58
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'sent_emails';
    protected $guarded = [];
    public $timestamps = true;
}