<!-- load file layout.blade.php -->
@extends("backend.layout")
@section("do-du-lieu")
<div class="col-md-12"> 
    <div class="panel panel-primary" style="border:1px solid #192a56; border-radius:5px">
        <div class="panel-heading"  style="background:#192a56; color:#fff; padding:10px 15px">Chỉnh sửa user</div>
        <div class="panel-body" style="padding:10px">
        <!-- muốn upload ảnh thì f có thuộc tính enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" action="{{ $action }}" style="color:#222222">
        @csrf
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tên</div>
                <div class="col-md-10">
                <input style="color:#222222" type="text" name="name" value="{{ isset($record->name)?$record->name:'' }}" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Thể loại</div>
                <div class="col-md-10">
                <select name="category_id" class="form-control" style="width: 300px;">
                        <?php 
                            //co the dung cau lenh sql de truy van
                            $categories = DB::select("select * from categories order by id desc");
                            ?>
                            @foreach($categories as $rows)
                        <option @if(isset($record->category_id)&&$record->category_id==$rows->id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mô tả</div>
                <div class="col-md-10">
                    <textarea name="mota" id="mota">{{ isset($record->mota)? $record->mota : "" }}</textarea>
                    <script type="text/javascript">CKEDITOR.replace('mota');</script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Nội dung</div>
                <div class="col-md-10">
                    <textarea name="noidung" id="noidung">{{ isset($record->noidung)? $record->noidung : "" }}</textarea>
                    <script type="text/javascript">CKEDITOR.replace('noidung');</script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Nổi bật</div>
                <div class="col-md-10">
                    <input type="checkbox" @if(isset($record->hot)) checked @endif name="hot" id="hot"><label for="hot">Hot</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày đăng</div>
                <div class="col-md-10">
                    <input type="date" name="date">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input style="background-color: #192a56; border:1px solid #192a56" type="submit" value="Lưu" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection("do-du-lieu")