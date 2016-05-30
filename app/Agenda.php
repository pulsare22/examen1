<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "contacto";
    protected $primary_key ="id";
    protected $fillable=['nombre','telefono'];
    public $timestamps = false;
}
