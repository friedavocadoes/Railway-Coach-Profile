<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = ['coach_number', 'coach_type', 'description'];

    // Relationship to MaintenanceLog
    public function maintenanceLogs()
    {
        return $this->hasMany(MaintenanceLog::class);
    }
}
