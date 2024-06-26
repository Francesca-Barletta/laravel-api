<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'progetto',
        'slug',
        'descrizione', 
        'link',
        'image',
        'type_id'
    ];

    protected $appends = ['image_fullpath'];

    protected function imageFullpath(): Attribute
    {
        return new Attribute(
            get: fn () =>
            $this->image ? asset('http://127.0.0.1:8000/storage/' . $this->image) : null,
        );
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
  
}
        