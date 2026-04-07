<x-movie-layout>
    <x-slot name="title">
        Tìm kiếm: {{$keyword}}
    </x-slot>

    <h3>Kết quả tìm kiếm: "{{$keyword}}"</h3>
    <div class='list-movie'>
        @foreach($movies as $movie)
        <div class='movie'>
            <a href="#">
                <img src="{{$movie->image_link}}" style="width:100%; height:300px; object-fit:cover;">
                <p><b>{{$movie->movie_name_vn ?? $movie->movie_name}}</b></p>
                <p>{{$movie->release_date}}</p>
            </a>
        </div>
        @endforeach
    </div>

    @if(count($movies) == 0)
        <p>Không tìm thấy phim nào với từ khóa "{{$keyword}}".</p>
    @endif
</x-movie-layout>
