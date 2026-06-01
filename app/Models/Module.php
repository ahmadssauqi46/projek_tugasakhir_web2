<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','slug','summary','content','image','order','is_active'];
    public function questions(){ return $this->hasMany(Question::class); }
}
