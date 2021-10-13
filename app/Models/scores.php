<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scores extends Model
{
    use HasFactory;

    protected $fillable = ['response1', 'response2', 'response3', 'response4', 'response5'];

    public $timestamps = false; 

    public function tabulateScore() {
        $totalScore = $this->response1 + $this->response2 + $this->response3 + $this->response4 + $this->response5;
        return $totalScore; 
    }

    public function attachStudent($student_identifier) {
        $this->student_identifier = $student_identifier;
    }
}
