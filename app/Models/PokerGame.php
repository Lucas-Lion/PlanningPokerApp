<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokerGame extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'caption',
        'voting_system',
        'created_by',
        'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function votes()
    {
        return $this->hasMany(PokerVote::class);
    }
}
