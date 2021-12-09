<!-- load file layout.blade.php vào đây -->
@extends("frontend.layout")
@section("do-du-lieu")

        <?php 
            $categories = DB::select("select * from categories order by id desc");
        ?>
        @foreach($categories as $itemCategory)
        <?php 
            // ktra danh muc co bai tin moi cho hien thi
            $check = DB::table("news")->where("category_id","=",$itemCategory->id)->Count();
        ?>
        @if($check > 0)
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $itemCategory->name }}</div>
            </div>
            <div class="row pb-4">
                <?php 
                    // lay ban ghi
                    $other_news = DB::table("news")->orderBy("id","desc")->where("category_id","=",$itemCategory->id)->offset(0)->take(2)->get();
                ?>
                 @foreach($other_news as $rows)
                <div class="col-md-5" style="padding-top:8px;">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""/></div>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-7 animate-box">
                    <a href="{{ url('news/detail/'.$rows->id) }}" class="fh5co_magna py-2"> {{ $rows->name }} </a> 
                    <br>
                    <a href="#" class="fh5co_mini_time py-3"> {{ $rows->date }}</a>
                    <div class="fh5co_consectetur"> {!! $rows->mota !!}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
@endsection