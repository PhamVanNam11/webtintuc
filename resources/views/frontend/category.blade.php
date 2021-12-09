    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        <?php 
            $categories = DB::select("select * from categories order by id desc");
        ?>
        @foreach($categories as $rows)
        <a href="{{ url('news/category/'.$rows->id) }}" class="fh5co_tagg">{{ $rows->name }}</a>
        @endforeach
    </div>