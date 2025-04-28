<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $fillable = ['coach_id', 'maintenance_date', 'description', 'performed_by'];

    // Relationship to Coach
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
