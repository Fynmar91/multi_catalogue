<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    
    protected $fillable = ['align', 'order', 'filterable', 'active', 'item_id', 'field_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
