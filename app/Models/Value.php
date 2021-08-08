<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;
    
    protected $fillable = ['value', 'item_id', 'field_id'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
