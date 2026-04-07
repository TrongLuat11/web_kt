<x-movie-layout>
    <x-slot name="title">
        @if(isset($currentGenre))
            {{ $currentGenre->genre_name_vn }} - Movie DB
        @elseif(isset($keyword))
            Tìm kiếm: {{ $keyword }} - Movie DB
        @else
            Trang chủ - Movie DB
        @endif
    </x-slot>

    @if(isset($currentGenre))
        <h4 style="margin-bottom: 15px; color: #032541; font-weight: 700;">
            <i class="fa fa-film"></i> {{ $currentGenre->genre_name_vn }}
        </h4>
    @elseif(isset($keyword))
        <h4 style="margin-bottom: 15px; color: #032541; font-weight: 700;">
            Kết quả tìm kiếm cho: "{{ $keyword }}"
        </h4>
    @endif

    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie">
                <a href="{{ url('/phim/' . $movie->id) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie->image }}" alt="{{ $movie->movie_name_vn ?: $movie->movie_name }}" style="width:100%; height:270px; object-fit:cover;">
                    <div style="padding: 10px;">
                        <b>{{ $movie->movie_name_vn ?: $movie->movie_name }}</b>
                        <p style="color: #666; margin-top: 5px;">{{ $movie->release_date }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @if(count($movies) === 0)
        <div style="text-align:center; padding: 50px; color: #999;">
            <i class="fa fa-film" style="font-size: 48px; margin-bottom: 15px;"></i>
            <p>Không tìm thấy bộ phim nào.</p>
        </div>
    @endif
</x-movie-layout>