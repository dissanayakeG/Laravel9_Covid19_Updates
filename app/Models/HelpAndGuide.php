<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpAndGuide extends Model
{
    // use HasFactory;

    protected $primaryKey = 'id';

    protected $guarded = [];

    protected $table = 'help_and_guides';

    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
