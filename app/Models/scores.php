<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timestamp;

class scores extends Model
{
    use HasFactory;

    protected $fillable = ['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10',
                            'question11', 'question12', 'question13', 'question14', 'question15', 'question16', 'question17', 'question18', 'question19', 'question20',
                            'question21', 'question22', 'question23'];

    public $timestamps = false; 

    public function tabulateScore() {
        $physical_exams = ($this->question1 + $this->question2 + $this->question19 + $this->question20)/10;
        
        $ordering_investigations = ($this->question3 + $this->question4)/10;

        $interpreting_cxr = ($this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10)/10;

        $interpreting_ecg = ($this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18)/10;

        $management = ($this->question21 + $this->question22 + $this->question23)/10;
        
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

    public function averageMonth() {
        $result = ['January' => 0,
                    'February' => 0,
                    'March' => 0,
                    'April' => 0,
                    'May' => 0,
                    'June' => 0,
                    'July' => 0,
                    'August' => 0,
                    'September' => 0,
                    'October' => 0,
                    'November' => 0,
                    'December' => 0
                ];
        
        if ($this->month == 1) {
            $result['January'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 2) {
            $result['February'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 3) {
            $result['March'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 4) {
            $result['April'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 5) {
            $result['May'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 6) {
            $result['June'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 7) {
            $result['July'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 8) {
            $result['August'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 9) {
            $result['September'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 10) {
            $result['October'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 11) {
            $result['November'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        } else if ($this->month == 12) {
            $result['December'] = ($this->question1 + $this->question2 + $this->question3 + $this->question4 + $this->question5 + $this->question6 + $this->question7 + $this->question8 + $this->question9 + $this->question10 + $this->question11 + $this->question12 + $this->question13 + $this->question14 + $this->question15 + $this->question16 + $this->question17 + $this->question18 + $this->question19 + $this->question20 + $this->question21 + $this->question22 + $this->question23) / 23;
        }

        return $result;
    } 

    public function averageQuestion() {
        
    }

    public function timestamp() {
        return $this->hasOne(Timestamp::class, 'test_id');
    }

}
