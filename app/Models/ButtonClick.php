<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonClick extends Model
{
    use HasFactory;
    protected $fillable = [
        'clicks',
        'date'
    ];

    public function histories()
    {
        return $this->hasMany(TallyHistory::class, 'tally_id', 'id')->latest()->take(5);
    }
}
