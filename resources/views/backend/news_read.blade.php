<!-- load file layou.blade.php -->
@extends("backend.layout")
<!-- đổ dữ liệu bên dưới vào file layout.blade.php, đổ vào tag do-du-lieu -->
@section("do-du-lieu")
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{ url('admin/news/create') }}" style="background:#192a56; border:1px solid #192a56" class="btn btn-primary"><i class="fas fa-user-plus"></i> Thêm mới</a>
    </div>
    <div class="panel panel-primary" style="border:2px solid #192a56; border-radius:5px">
        <div class="panel-heading" style="background:#192a56; color:#fff; padding:10px 15px">Danh sách tin tức</div>
        <div class="panel-body" style="padding:10px">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="color:#222222;width:100px;">Ảnh</th>
                    <th style="color:#222222">Tên</th>
                    <th style="color:#222222;width:100px;">Thể loại</th>
                    <th style="color:#222222;width:100px;">Nổi bật</th>
                    <th style="color:#222222;width:150px;">Ngày đăng</th>
                    <th style="width:170px;color:#222222">Chức năng</th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td style="color:#333">
                        @if(file_exists('upload/news/'.$rows->photo))
                        <img src="{{ asset('upload/news/'.$rows->photo) }}" style="width:100px;">
                        @endif
                    </td>
                    <td style="color:#333" >{{ $rows->name }}</td>
                    <td style="color:#333" >
                        <?php 
                            $category = DB::table("categories")->where("id","=",$rows->category_id)->first();
                            echo isset($category->name) ? $category->name : "";
                        ?>
                    </td>
                    <td style="color:#333;text-align:center;" >
                        @if($rows->hot == 1)
                        Hot
                        @endif
                    </td>
                    <td style="color:#333"> {{ $rows->date }}</td>
                    <td style="text-align:center;">
                        <a href="{{ url('admin/news/update/'.$rows->id) }}" style="color: #222222;text-decoration:none"><i class="fas fa-edit"></i>Sửa</a>&nbsp;
                        <a href="{{ url('admin/news/delete/'.$rows->id) }}" onclick="return window.confirm('Xóa?');" style="color: #222222;text-decoration:none"><i class="fas fa-trash-alt"></i>Xóa</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
                svg{
                    width: 50px;
                    height:20px
                }
                .shadow-sm{
                    display:flex;
                    align-items:center;
                }
                p.leading-5{
                    margin-top:25px;
                }
            </style>
            <ul class="pagination" style="display:flex">
                {{ $data->render() }} 
            </ul> 
        </div>
    </div>
</div>
@endsection