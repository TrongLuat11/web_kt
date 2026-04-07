<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre1 = \App\Models\Genre::create([
            'genre_name' => 'Action',
            'genre_name_vn' => 'Hành động'
        ]);
        $genre2 = \App\Models\Genre::create([
            'genre_name' => 'Comedy',
            'genre_name_vn' => 'Hài hước'
        ]);

        $movie1 = \App\Models\Movie::create([
            'movie_name' => 'Avengers: Endgame',
            'movie_name_vn' => 'Biệt đội siêu anh hùng: Hồi kết',
            'original_name' => 'Avengers: Endgame',
            'image_link' => 'https://image.tmdb.org/t/p/w500/or06vS3ST0P36C0PbiSHwvGvQCj.jpg',
            'popularity' => 1000,
            'vote_average' => 8.5,
            'release_date' => '2019-04-26',
        ]);
        $movie1->genres()->attach($genre1->id);

        $movie2 = \App\Models\Movie::create([
            'movie_name' => 'Deadpool & Wolverine',
            'movie_name_vn' => 'Deadpool và Wolverine',
            'original_name' => 'Deadpool & Wolverine',
            'image_link' => 'https://image.tmdb.org/t/p/w500/8cdWjvZQUmS6pU9YmC9SssW61JJ.jpg',
            'popularity' => 5000,
            'vote_average' => 8.1,
            'release_date' => '2024-07-26',
        ]);
        $movie2->genres()->attach([$genre1->id, $genre2->id]);

        $movie3 = \App\Models\Movie::create([
            'movie_name' => 'Despicable Me 4',
            'movie_name_vn' => 'Kẻ trộm mặt trăng 4',
            'original_name' => 'Despicable Me 4',
            'image_link' => 'https://image.tmdb.org/t/p/w500/wWba30VvG8BvSOHSdp87UEOkp3Q.jpg',
            'popularity' => 2000,
            'vote_average' => 7.8,
            'release_date' => '2024-07-03',
        ]);
        $movie3->genres()->attach($genre2->id);
    }
}
