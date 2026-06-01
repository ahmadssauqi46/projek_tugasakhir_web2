<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AssessmentResult extends Model
{
    protected $fillable = ['session_id','student_name','module_id','type','score','correct_count','total_questions','answers'];
    protected $casts = ['answers' => 'array'];
    public function module(){ return $this->belongsTo(Module::class); }
}
