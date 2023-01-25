<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallyHistory extends Model
{
    use HasFactory;
    protected $table = 'tally_history';

    protected $fillable = [
        'count',
        'tally_id',
        'created_at'
    ];

    public function click()
    {
        return $this->belongsTo(Click::class);
    }
}
