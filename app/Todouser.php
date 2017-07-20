<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todouser extends Model
{
   protected $table = 'user';
   protected $fillable = [

   'nama_user','password','alamat',

   ];
}
