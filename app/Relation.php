<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = ['source_id', 'word_id', 'reply_id', 'status'];
    
}
