<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grafik extends Model
{
    use HasFactory;

    protected $table = 'grafik';

    protected $fillable = [
        'nama_content',
        'level_content',
        'like',
        'view',
        'comment',
        'tanggal',
        'created_at',
        'updated_at'
    ];

    public function nama_content(){
        return $this->belongsTo(Content::class);
    }
    public function level_content(){
        return $this->belongsTo(Marketing::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
