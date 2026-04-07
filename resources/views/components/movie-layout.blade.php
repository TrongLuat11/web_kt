<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        <link rel="stylesheet" href="{{asset('library/bootstrap.min.css')}}">

        <script src="{{asset('library/jquery.slim.min.js')}}"></script>
        <script src="{{asset('library/popper.min.js')}}"></script>
        <script src="{{asset('library/bootstrap.bundle.min.js')}}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{asset('library/jquery-3.7.1.js')}}" ></script>
        <style>
          
            .list-movie
            {
                display:grid;
                grid-template-columns:repeat(4,25%);
            }
            .movie
            {
                margin:10px;
                text-align:center;
                border-radius:5px;
                border:1px solid #dbdbdb;
                overflow: hidden;
                cursor:pointer;
            }
            .movie a
            {
                color: black;
                text-decoration:none;
            }
            .movie-info
            {
                display:grid;
                grid-template-columns:repeat(2,30% 70%);
            }
            .banner
            {
                width: 100%;
                max-width: 1200px;
                min-height: 300px;
                background-image: linear-gradient(rgba(1, 180, 228, 0.7), rgba(3, 37, 65, 0.8)), url('{{asset('banner.jpg')}}');
                background-size: cover;
                background-position: center;
                color: white;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 40px;
                box-sizing: border-box;
                position: relative; 
                overflow: hidden;
            }
            .banner-logo-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0.35;
                pointer-events: none;
                z-index: 0;
            }
            .banner-content {
                text-align: center;
                width: 100%;
                position: relative;
                z-index: 1;
            }
            .banner h2 {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 5px;
            }
            .banner h3 {
                font-size: 2rem;
                font-weight: 500;
                margin-bottom: 60px;
            }
            .search-input
            {
                width: 100%;
                position: relative;
                margin: 0 auto;
            }
            .search-input input
            {
                width: 100%;
                height: 46px;
                border-radius: 30px;
                border: none;
                padding-left: 20px;
                padding-right: 120px; 
                font-size: 1rem;
                color: rgba(0,0,0,0.6);
                outline: none;
            }
            .search-btn
            {
                width: 100px; 
                height: 46px;
                color: white; 
                background-image: linear-gradient(to right, rgba(30,213,169,1) 0%, rgba(1,180,228,1) 100%);
                border-radius: 30px;
                border: none;
                position: absolute;
                right: 0;
                top: 0;
                font-weight: 600;
                cursor: pointer;
            }

            .list-group-movie a
            {
                padding:10px;
                text-decoration:none;
                color:white;

            }
            .list-group-movie a:hover
            {
                background:#000;

            }
        </style>
    </head>
    <body style="background-color: #f8f9fa;">
        <div style="background-color: #222; height: 35px; width: 100%; border-bottom: 2px solid #444;"></div>
            <div class='banner'>
                <img src="{{ asset('banner.jpg') }}" class="banner-logo-bg" alt="Logo">
                <div class="banner-content">
                    <h2>Welcome.</h2>
                    <h3>Millions of movies, TV shows and people to discover. Explore now.</h3>
                </div>
                <div class='search-input'>
                    <form method="get" action="{{url('/timkiem')}}">
                        <input type="text" name='keyword' value="{{ request('keyword') }}" placeholder="Nhập tên bộ phim yêu thích để tìm kiếm">
                        <button type="submit" class="search-btn">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        <main style="max-width:1200px; margin:2px auto;">
        <div class='row'>
            <div class='col-3 pr-0'>
                <div class="card" style="width: 18rem; background-color:#222;color:white;">
                    <div class="card-header">
                    <i class="fa fa-film" aria-hidden="true"></i> <b>Thể loại phim</b>
                    </div>
                    <ul class="list-group list-group-flush list-group-movie">
                       @foreach($genre as $row)
                       <a href="{{url('/theloai/'.$row->id)}}">{{$row->genre_name_vn}}</a>
                       @endforeach
                    </ul>
                    </div>
                </div>
                    <div class='col-9'>
                         {{$slot}}
                    </div>
                </div>
            </div>  
         </div>
        </main>
    </body>
</html>