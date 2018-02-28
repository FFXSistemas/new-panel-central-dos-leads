<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ChatbotInteraction extends Model
{
    protected $table = "chatbot_interaction";
    public $timestamps = true;
    protected $guarded = [];
}