<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timestamp;

class scores extends Model
{
    use HasFactory;

    protected $fillable = ['response1', 'response2', 'response3', 'response4', 'response5', 'response6', 'response7', 'response8', 'response9', 'response10',
                            'response11', 'response12', 'response13', 'response14', 'response15', 'response16', 'response17', 'response18', 'response19', 'response20',
                            'response21', 'response22', 'response23'];

    public $timestamps = false; 

    public function tabulateScore() {
        $physical_exams = ($this->response1 + $this->response2 + $this->response19 + $this->response20)/10;
        
        $ordering_investigations = ($this->response3 + $this->response4)/10;

        $interpreting_cxr = ($this->response5 + $this->response6 + $this->response7 + $this->response8 + $this->response9 + $this->response10)/10;

        $interpreting_ecg = ($this->response11 + $this->response12 + $this->response13 + $this->response14 + $this->response15 + $this->response16 + $this->response17 + $this->response18)/10;

        $management = ($this->response21 + $this->response22 + $this->response23)/10;
        
        $totalScore = ($physical_exams * 0.4) + ($ordering_investigations * 0.1) + ($interpreting_cxr * 0.1) + ($interpreting_ecg * 0.1) + ($management * 0.3);

        $letter_grade = 'undefined';

        if ($totalScore > 90) {
            $letter_grade = 'A';
        } else if ($totalScore > 75) {
            $letter_grade = 'B';
        } else {
            $letter_grade = 'C';
        }

        return ['totalscore' => $totalScore,
                'letter_grade' => $letter_grade, 
                'physical_exams' => $physical_exams, 
                'ordering_investigations' => $ordering_investigations,
                'interpreting_cxr' => $interpreting_cxr,
                'interpreting_ecg' => $interpreting_ecg,
                'management' => $management]; 
    }

    /* This function is retired
    public function attachStudent($student_identifier) {
        $this->student_identifier = $student_identifier;
    }
    */

    public function timestamp() {
        return $this->hasOne(Timestamp::class, 'test_id');
    }

}
