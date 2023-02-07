<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'importance'
    ];

    public function todoLists () 
	{
		return $this->hasMany(TodoList::class);  
    }
}
