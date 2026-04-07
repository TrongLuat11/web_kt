<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div class="bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4">Thêm bộ phim mới</h2>

        <form action="{{ url('/admin/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tên phim gốc</label>
                    <input type="text" name="movie_name" class="form-control @error('movie_name') is-invalid @enderror" value="{{ old('movie_name') }}">
                    @error('movie_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Tên phim (VN)</label>
                    <input type="text" name="movie_name_vn" class="form-control @error('movie_name_vn') is-invalid @enderror" value="{{ old('movie_name_vn') }}">
                    @error('movie_name_vn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Ngày phát hành (yyyy-mm-dd)</label>
                    <input type="text" name="release_date" placeholder="2024-01-01" class="form-control @error('release_date') is-invalid @enderror" value="{{ old('release_date') }}">
                    @error('release_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Điểm số (VD: 8.5)</label>
                    <input type="text" name="vote_average" class="form-control @error('vote_average') is-invalid @enderror" value="{{ old('vote_average') }}">
                    @error('vote_average')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label>Ảnh đại diện</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Mô tả (VN)</label>
                <textarea name="overview_vn" rows="5" class="form-control @error('overview_vn') is-invalid @enderror">{{ old('overview_vn') }}</textarea>
                @error('overview_vn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success p-2 px-4" style="background-color: #28a745; border: none;">Lưu bộ phim</button>
                <a href="{{ url('/admin') }}" class="btn btn-secondary p-2 px-4">Hủy bỏ</a>
            </div>
        </form>
    </div>
</x-movie-layout>
