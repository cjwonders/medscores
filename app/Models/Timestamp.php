<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\scores;

class Timestamp extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $fillable = ['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10',
                            'question11', 'question12', 'question13', 'question14', 'question15', 'question16', 'question17', 'question18', 'question19', 'question20',
                            'question21', 'question22', 'question23'];

    public function scores() {
        return $this->belongsTo(scores::class);
    }
}
