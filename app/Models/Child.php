<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['first_name','last_name','birthdate','country','address','city','postal_code','scolar_note','behavior_note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gift()
    {
        return $this->belongsToMany(Gift::class);
    }
}
