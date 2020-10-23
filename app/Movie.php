<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];

    protected $appends = ['poster_path', 'image_path', 'is_favored'];

############-----------------------Attributes---------------------------################
    public function getPosterPathAttribute()
    {
        return Storage::url('images/' . $this->poster);
    }


    public function getImagePathAttribute()
    {
        return Storage::url('images/' . $this->image);
    }


    public function getIsFavoredAttribute() {

        if(auth()->user()) {
            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();  //true or false
        }
        return false;
    }



############-----------------------Scopes---------------------------################

    public function scopeWhenSearch($query, $search) {
        return $query->when($search, function($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('year', 'like', "%$search%")
                ->orWhere('rating', 'like', "%$search%");
        });
    }


    public function scopeWhenCategory($query, $category) {

        return $query->when($category, function($q) use ($category) {

            return $q->whereHas('categories', function($qry) use ($category) {
                return $qry->whereIn('category_id', (array)$category)
                           ->orWhereIn('name', (array)$category);
            });
        });
    }


    public function scopeWhenFavorite($query, $favorite) {

        return $query->when($favorite, function($q) use ($favorite) {
            return $q->whereHas('users', function($qu) use ($favorite) {
                return $qu->where('user_id', auth()->user()->id);
            });
        });
    }



############-----------------------Relations---------------------------################

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movie_category');
    }


    public function users() {
        return $this->belongsToMany(User::class, 'user_movie');
    }







}
