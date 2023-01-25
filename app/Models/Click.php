<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $table = 'click';
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
