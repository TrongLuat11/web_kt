<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <h3>Thêm phim mới</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="movie_name"><b>Tên phim gốc</b></label>
            <input type="text" class="form-control" id="movie_name" name="movie_name" value="{{ old('movie_name') }}" placeholder="Nhập tên phim gốc">
        </div>

        <div class="form-group mb-3">
            <label for="movie_name_vn"><b>Tên phim (Tiếng Việt)</b></label>
            <input type="text" class="form-control" id="movie_name_vn" name="movie_name_vn" value="{{ old('movie_name_vn') }}" placeholder="Nhập tên phim tiếng Việt">
        </div>

        <div class="form-group mb-3">
            <label for="release_date"><b>Ngày phát hành</b></label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date') }}">
        </div>

        <div class="form-group mb-3">
            <label for="image"><b>Ảnh đại diện</b></label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group mb-3">
            <label for="overview_vn"><b>Mô tả (Tiếng Việt)</b></label>
            <textarea class="form-control" id="overview_vn" name="overview_vn" rows="5" placeholder="Nhập mô tả phim">{{ old('overview_vn') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="vote_average"><b>Điểm số</b></label>
            <input type="number" step="0.1" min="0" max="10" class="form-control" id="vote_average" name="vote_average" value="{{ old('vote_average') }}" placeholder="VD: 8.5">
        </div>

        <button type="submit" class="btn btn-primary">Thêm phim</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</x-movie-layout>