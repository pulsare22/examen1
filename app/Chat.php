<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chats";
    protected $primary_key ="id";
    protected $fillable=['usuario','mensaje'];
    public $timestamps = false;
}
