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

    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie shadow-sm rounded overflow-hidden">
                <a href="{{ url('/view/'.$movie->id) }}" class="text-decoration-none">
                    <img src="{{ $movie->image_link }}" alt="{{ $movie->movie_name_vn }}" style="width:100%; height: 350px; object-fit: cover;">
                    <div class="p-2">
                        <div style="font-weight:bold; height: 45px; overflow: hidden; color: #333;" title="{{ $movie->movie_name_vn }}">{{ $movie->movie_name_vn }}</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-muted" style="font-size: 0.85rem;">{{ $movie->release_date }}</span>
                            <span class="badge badge-success" style="background-color: #1ed5a9;">{{ number_format($movie->vote_average, 1) }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-4 mb-5 d-flex justify-content-center">
        {{ $movies->links('pagination::bootstrap-4') }}
    </div>
</x-movie-layout>