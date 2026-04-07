<x-movie-layout>
    <x-slot name="title">
        {{ $movie->movie_name_vn ?: $movie->movie_name }} - Movie DB
    </x-slot>

    <div>
        <h4 style="font-size: 24px; margin-bottom: 15px; font-weight: normal; margin-top: 0; color: #333;">
            @if($movie->movie_name_vn)
                {{ $movie->movie_name_vn }} - {{ $movie->original_name ?: $movie->movie_name }}
            @else
                {{ $movie->original_name ?: $movie->movie_name }}
            @endif
        </h4>
        
        <div class="movie-info">
            <div class="movie-poster">
                <img src="{{ asset('images/' . $movie->image) }}" onerror="this.onerror=null;this.src='https://image.tmdb.org/t/p/w500/{{ ltrim($movie->image, '/') }}';" alt="{{ $movie->movie_name_vn ?: $movie->movie_name }}" style="width: 100%;">
            </div>
            
            <div style="padding-left: 20px; font-size: 15px; color: #222;">
                <p style="margin-bottom: 8px;">Ngày phát hành: <strong>{{ $movie->release_date }}</strong></p>
                <p style="margin-bottom: 8px;">Quốc gia: <strong>{{ $movie->country_name }}</strong></p>
                <p style="margin-bottom: 8px;">Thời gian: <strong>{{ $movie->runtime }} phút</strong></p>
                <p style="margin-bottom: 15px;">Doanh thu: <strong>{{ $movie->revenue }}</strong></p>
                
                <p style="margin-bottom: 5px;"><strong>Mô tả:</strong></p>
                <p style="text-align: justify; margin-bottom: 15px; line-height: 1.6;">
                    {{ $movie->overview_vn ?: ($movie->overview ?: 'Đang cập nhật...') }}
                </p>
                
                <p>
                    <a href="{{ $movie->trailer ?? '#' }}" target="_blank" class="btn btn-success" style="background-color: #28a745; border-color: #28a745; border-radius: 2px; text-decoration: none; display: inline-block; padding: 6px 12px; margin-top: 5px;">Xem trailer</a>
                </p>
            </div>
        </div>
    </div>
</x-movie-layout>
