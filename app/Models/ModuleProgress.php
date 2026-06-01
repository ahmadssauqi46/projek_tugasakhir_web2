<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ModuleProgress extends Model
{
    protected $fillable = ['session_id','module_id','latihan_completed','completed_at'];
    protected $casts = ['latihan_completed' => 'boolean', 'completed_at' => 'datetime'];
}
