<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index(){
        return view("movie.index");
    }

    public function theloai($id){
        $genre = DB::table('genre')->where('id', $id)->first();
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->select('movie.*')
            ->get();
        return view("movie.theloai", compact('genre', 'movies'));
    }

    public function timkiem(Request $request){
        $keyword = $request->keyword;
        $movies = DB::table('movie')
            ->where('movie_name', 'like', '%'.$keyword.'%')
            ->orWhere('movie_name_vn', 'like', '%'.$keyword.'%')
            ->get();
        return view("movie.timkiem", compact('movies', 'keyword'));
    }

    public function create(){
        $genres = DB::table('genre')->get();
        return view("movie.create", compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_name_vn' => 'required',
            'release_date' => 'required|date_format:Y-m-d',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'overview_vn' => 'required',
            'vote_average' => 'required|numeric',
        ], [
            'required' => 'Trường :attribute là bắt buộc.',
            'image' => 'File tải lên phải là định dạng ảnh.',
            'date_format' => 'Ngày phát hành phải có định dạng yyyy-mm-dd.',
            'numeric' => 'Trường :attribute phải là một số.',
        ], [
            'movie_name' => 'Tên phim gốc',
            'movie_name_vn' => 'Tên phim (VN)',
            'release_date' => 'Ngày phát hành',
            'image' => 'Ảnh đại diện',
            'overview_vn' => 'Mô tả (VN)',
            'vote_average' => 'Điểm số',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        DB::table('movie')->insert([
            'movie_name' => $request->movie_name,
            'movie_name_vn' => $request->movie_name_vn,
            'release_date' => $request->release_date,
            'image' => '/'.$imageName,
            'image_link' => asset('images/'.$imageName),
            'overview_vn' => $request->overview_vn,
            'vote_average' => $request->vote_average,
            'status' => 1,
            'popularity' => 500, // Default popularity to show on home
        ]);

        return redirect('/admin')->with('success', 'Thêm phim mới thành công!');
    }
   
}
