<?php

namespace App\Models;

use App\Models\SeatAllocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function seatAllocation()
    {
        return $this->belongsTo(SeatAllocation::class);
    }
}
