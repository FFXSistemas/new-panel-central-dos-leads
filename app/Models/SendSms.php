<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 01/03/2018
 * Time: 12:40
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SendSms extends Model
{
    protected $table = 'send_sms';
    protected $guarded = [];
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::Class,'id','user_id');
    }

}