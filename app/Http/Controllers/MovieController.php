<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->paginate(12);

        return view("movie.index", compact('movies'));
    }

    public function theloai($id)
    {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->where('movie.status', 1)
            ->select('movie.*')
            ->orderBy('movie.release_date', 'desc')
            ->paginate(12);

        return view("movie.index", compact('movies'));
    }

    public function view($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();
        return view("movie.detail", compact('movie'));
    }

    public function timkiem(Request $request)
    {
        $keyword = $request->query('keyword');
        $movies = DB::table('movie')
            ->where('status', 1)
            ->where('movie_name_vn', 'LIKE', "%$keyword%")
            ->orderBy('release_date', 'desc')
            ->paginate(12)
            ->appends(['keyword' => $keyword]);

        return view("movie.index", compact('movies'));
    }

    public function admin()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->get();
        return view('movie.admin', compact('movies'));
    }

    public function delete($id)
    {
        DB::table('movie')->where('id', $id)->update(['status' => 0]);
        return redirect('/admin')->with('success', 'Xóa phim thành công');
    }

    public function create()
    {
        return view('movie.create');
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
