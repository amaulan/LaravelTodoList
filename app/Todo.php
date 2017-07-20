<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
   protected $table = 'todo';//->Mendeklarasikan table todo
   protected $fillable = [//->Mendeklarasikan field table todo

   'todo','user_id',//->Mendeklarasikan nama field table todo

   ];
}
