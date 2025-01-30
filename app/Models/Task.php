<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    #buat mengontrol 
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
//cons adalah sebuah nilai yang tidak bisa di rubah
    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];
//success warna hijau, warning kuning, denger merah, default bawaan, secondery abuabu/bawaan 
//untuk mendapatkan sebuah prioritas yang nantinya setiap prioritas akan di berikan warna sesuai kondisi 
    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}
