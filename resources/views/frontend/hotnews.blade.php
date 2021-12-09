<div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <?php 
                // offset(0) -> từ bản ghi thứ 0
                // take(1) -> lấy 1 bản ghi
                // get() -> lấy hết các kết quả trả về
                    $hotnews =DB::table("news")->orderBy("id","desc")->offset(0)->take(1)->get();
                    $n = 0;
            ?>
            @foreach($hotnews as $rows)
            <?php $n++; ?>
            <div class="fh5co_suceefh5co_height" style="@if($n == 1) @endif"><img src="{{ asset('upload/news/'.$rows->photo)  }}" alt="img"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $rows->date }}
                    </a></div>
                    <div class=""><a href="{{ url('news/detail/'.$rows->id) }}" class="fh5co_good_font"> {{ $rows->name }} </a></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <div class="row">
            <?php 
                // offset(1) -> từ bản ghi thứ 1
                // take(4) -> lấy 4 bản ghi
                // get() -> lấy hết các kết quả trả về
                    $hotnews =DB::table("news")->orderBy("id","desc")->offset(1)->take(4)->get();
                    $n = 0;
            ?>
            @foreach($hotnews as $rows)
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $rows->date }} </a></div>
                            <div class=""><a href="{{ url('news/detail/'.$rows->id) }}" class="fh5co_good_font_2"> {{ $rows->name }} </a></div>
                        </div>
                    </div>
                </div>
            @endforeach    
            </div>
        </div>
    </div>