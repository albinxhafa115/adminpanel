<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaileAttempt extends Model
{
    protected $table = 'failed_attempts';

    protected $fillable = [
        'rfid',
        'pfc_id',
        'channel_id',
        'type',
    ];
	
	public function getDateFormat(){
        return 'U';
    }
}
