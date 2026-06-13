<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleProgress extends Model
{
    protected $table = 'module_progress';

    protected $fillable = [
        'user_id',
        'session_id',
        'module_id',
        'latihan_completed',
        'completed_at',
    ];

    protected $casts = [
        'latihan_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}