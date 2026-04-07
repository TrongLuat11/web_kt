<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';

    public $timestamps = false;

    protected $fillable = [
        'movie_name', 'movie_name_vn', 'original_name',
        'image', 'image_link', 'backdrop', 'backdrop_link',
        'tagline', 'tagline_vn', 'overview', 'overview_vn',
        'runtime', 'budget', 'revenue', 'popularity',
        'vote_average', 'vote_count', 'country_code', 'country_name',
        'trailer', 'release_date', 'updated_at'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'id_movie', 'id_genre');
    }
}
