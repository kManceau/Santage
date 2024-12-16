<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = ['good','name','description'];

    public function category() 
    {
        return $this->belongsTo(Category::class); 
    }
    
}
