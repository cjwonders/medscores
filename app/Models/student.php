<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\scores;

class student extends Model
{

    protected $fillable = ['student_alias'];

    public $timestamps = false; 

    use HasFactory;

    public function scores()
    {
        return $this->hasMany(scores::class, 'student_identifier');
    }
}
