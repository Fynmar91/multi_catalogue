<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    
    protected $fillable = ['value', 'icon', 'active', 'field_id'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
