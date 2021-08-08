<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'header', 'icon', 'component', 'options'];
    
    public function values()
    {
        return $this->hasMany(Value::class);
    }
    
    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
