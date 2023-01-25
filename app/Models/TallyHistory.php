<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallyHistory extends Model
{
    use HasFactory;
    protected $table = 'tally_history';
    protected $guarded = ['id'];

    public function click()
    {
        return $this->belongsTo(ButtonClick::class);
    }
}
