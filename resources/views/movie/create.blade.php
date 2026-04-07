<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div class="bg-white p-4 rounded shadow-sm">
        <h2 class="text-center mb-4" style="color: #007bff; font-weight: bold;">THÊM PHIM</h2>

        <form action="{{ url('/admin/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label>Tên tiếng Anh</label>
                <input type="text" name="movie_name" class="form-control @error('movie_name') is-invalid @enderror" value="{{ old('movie_name') }}">
                @error('movie_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" class="form-control @error('movie_name_vn') is-invalid @enderror" value="{{ old('movie_name_vn') }}">
                @error('movie_name_vn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Ngày phát hành</label>
                <input type="text" name="release_date" placeholder="yyyy-mm-dd" class="form-control @error('release_date') is-invalid @enderror" value="{{ old('release_date') }}">
                @error('release_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="overview_vn" rows="4" class="form-control @error('overview_vn') is-invalid @enderror">{{ old('overview_vn') }}</textarea>
                @error('overview_vn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Ảnh đại diện</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ẩn điểm đánh giá hoặc đặt mặc định để khớp giao diện mẫu -->
            <input type="hidden" name="vote_average" value="0">

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2" style="background-color: #007bff; border: none; border-radius: 4px;">Lưu</button>
            </div>
        </form>
    </div>
</x-movie-layout>
