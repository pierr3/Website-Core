<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staff";

    protected $fillable = [
        'id', 'vatsim_id', 'staff_level', 'title', 'admin', 'atc_dpt', 'pilot_dpt', 'executive', 'events',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class, 'vatsim_id', 'vatsim_id');
    }
}
