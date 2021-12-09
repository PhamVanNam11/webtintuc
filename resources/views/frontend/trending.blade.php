<div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php 
                // offset(1) -> từ bản ghi thứ 1
                // take(4) -> lấy 4 bản ghi
                // get() -> lấy hết các kết quả trả về
                    $trending =DB::table("news")->orderBy("id","desc")->offset(5)->take(6)->get();
                    $n = 0;
            ?>
            @foreach($trending as $rows)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt="" class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="{{ url('news/detail/'.$rows->id) }}" class="text-white"> {{ $rows->name }} </a>
                        <div class="fh5co_latest_trading_date_and_name_color"> {{ $rows->date }}</div>
                    </div>
                </div>
            </div>
            @endforeach    
        </div>
    </div>