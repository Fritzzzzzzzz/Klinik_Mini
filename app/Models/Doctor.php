<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

    use HasFactory;
    protected $fillable = ['name','poli_id','schedule_day','start_time','end_time'];

    public function poli() {
        return $this->belongsTo(Poli::class);
    }

    public function queues() {
        return $this->hasMany(Queue::class);
    }
}