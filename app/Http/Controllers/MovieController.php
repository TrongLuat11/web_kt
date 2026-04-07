<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    // Trang chủ: hiển thị 12 bộ phim có popularity > 450 và vote_average > 7
    // sắp xếp giảm dần theo release_date
    public function index()
    {
        $movies = Movie::where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->take(12)
            ->get();

        return view('movie.index', compact('movies'));
    }

    // Hiển thị 12 bộ phim theo thể loại, sắp xếp giảm dần theo release_date
    public function byGenre($id)
    {
        $genre = Genre::findOrFail($id);

        $movies = $genre->movies()
            ->orderBy('release_date', 'desc')
            ->take(12)
            ->get();

        return view('movie.index', [
            'movies' => $movies,
            'currentGenre' => $genre,
        ]);
    }

    // Hiển thị chi tiết bộ phim
    public function show($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return view('movie.show', compact('movie'));
    }

    // Tìm kiếm bộ phim
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $movies = \Illuminate\Support\Facades\DB::select("select * from movie where movie_name_vn like ?", ["%".$keyword."%"]);

        return view('movie.index', compact('movies', 'keyword'));
    }
}
