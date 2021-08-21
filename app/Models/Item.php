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
        return $this->belongsToMany(Item::class, 'hierarchies', 'child_id', 'parent_id');
    }
    
    public function children()
    {
        return $this->belongsToMany(Item::class, 'hierarchies', 'parent_id', 'child_id');
    }

    public function values()
    {
        return $this->hasMany(Value::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function dates()
    {
        return $this->hasMany(Timestamp::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
