<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'priority_id'
    ];

    public function priority() 
	{
		return $this->belongsTo(Priority::class);  
	}
}
