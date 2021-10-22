<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\scores;

class Timestamp extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $fillable = ['response1', 'response2', 'response3', 'response4', 'response5', 'response6', 'response7', 'response8', 'response9', 'response10',
                            'response11', 'response12', 'response13', 'response14', 'response15', 'response16', 'response17', 'response18', 'response19', 'response20',
                            'response21', 'response22', 'response23'];

    public function scores() {
        return $this->belongsTo(scores::class);
    }
}
