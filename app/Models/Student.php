<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'nim',
        'nama',
        'program_studi',
        'no_hp',
    ];

    public function grade()
    {
        return $this->hasMany(Grade::class);
    }
}