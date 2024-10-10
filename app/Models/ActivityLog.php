<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
