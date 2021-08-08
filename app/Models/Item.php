<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'active', 'type', 'level'];
    
    public function parents()
    {
        return $this->belongsToMany(Item::class, 'hierarchies', 'child_id', 'id');
    }
    
    public function children()
    {
        return $this->belongsToMany(Item::class, 'hierarchies', 'parent_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
