<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toDoList extends Model
{
    use HasFactory;
    
    protected $table ="lists";
    protected $fillable = [
        'title',
        'description',
        'd_from',
        'd_to',
        'user_id'
    ];
    
}
