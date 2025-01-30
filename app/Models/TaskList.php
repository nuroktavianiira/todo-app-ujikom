<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = ['name'];
    #berpungsi untuk megontrol fariable nama 
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
#berpungsi untuk mengontrol pariable id, create, update
    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}
