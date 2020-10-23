<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];



############----------------------Attributes------------------------################

    public function getNameAttribute($value) {
        return ucfirst($value);
    }






############-----------------------Scopes---------------------------################

    public function scopeWhenSearch($query, $search) {

        return $query->when($search, function($q) use ($search) {

            return $q->where('name', 'like', "%$search%");
        });
    }





############-----------------------Relations---------------------------################

    public function movies() {
        return $this->belongsToMany(Movie::class, 'movie_category');
    }
}
