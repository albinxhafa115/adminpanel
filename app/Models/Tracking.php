<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    public function getDateFormat(){
        return 'U';
    }
}
