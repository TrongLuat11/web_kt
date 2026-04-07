<x-movie-layout>
    <x-slot name="title">
        {{ $movie->movie_name_vn }}
    </x-slot>

    <div class="movie-detail p-4 rounded mt-4" style="background: white;">
        <h2 class="mb-4" style="font-weight: 500;">{{ $movie->movie_name_vn }} - {{ $movie->movie_name }}</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $movie->image_link }}" alt="{{ $movie->movie_name_vn }}" class="img-fluid rounded" style="width:100%">
            </div>
            <div class="col-md-8">
                <p>Ngày phát hành: <b>{{ $movie->release_date }}</b></p>
                <p>Quốc gia: <b>{{ $movie->country_name }}</b></p>
                <p>Thời gian: <b>{{ $movie->runtime }} phút</b></p>
                <p>Doanh thu: <b>{{ number_format($movie->revenue) }}</b></p>
                
                <h5 class="mt-4"><b>Mô tả:</b></h5>
                <p style="line-height: 1.6; text-align: justify;">
                    {{ $movie->overview_vn ?: $movie->overview }}
                </p>

                @if($movie->trailer)
                    <div class="mt-4">
                        <a href="{{ $movie->trailer }}" target="_blank" class="btn btn-success" style="background-color: #28a745; border: none; padding: 10px 20px;">
                            Xem trailer
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-movie-layout>
