<x-movie-layout>
    <x-slot name="title">
        Quản lý phim
    </x-slot>

    <div class="bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Danh sách quản lý phim</h2>
            <a href="{{ url('/admin/create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Thêm phim mới
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="id-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th style="width: 250px;">Tên phim (VN)</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>
                        <img src="{{ $movie->image_link }}" alt="" style="width: 60px; height: 90px; object-fit: cover;">
                    </td>
                    <td style="max-width: 250px; white-space: normal; word-wrap: break-word;">{{ $movie->movie_name_vn }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->vote_average }}</td>
                    <td>
                        <a href="{{ url('/view/'.$movie->id) }}" class="btn btn-sm btn-info">Xem</a>
                        <a href="{{ url('/delete/'.$movie->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ phim này?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                bStateSave: true,
                language: {
                    search: "Tìm kiếm:",
                    lengthMenu: "Hiển thị _MENU_ bộ phim",
                    info: "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ bộ phim",
                    paginate: {
                        first: "Đầu",
                        last: "Cuối",
                        next: "Tiếp",
                        previous: "Trước"
                    }
                }
            });
        });
    </script>
</x-movie-layout>
