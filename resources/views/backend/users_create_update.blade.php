<!-- load file layout.blade.php -->
@extends("backend.layout")
@section("do-du-lieu")
<div class="col-md-12">  
    @if(Request::get("notify") == "emailExists")
    <div class="alert alert-danger">Email đã tồn tại</div>
    @endif
    <div class="panel panel-primary" style="border:1px solid #192a56; border-radius:5px">
        <div class="panel-heading"  style="background:#192a56; color:#fff; padding:10px 15px">Chỉnh sửa user</div>
        <div class="panel-body" style="padding:10px">
        <form method="post" action="<?php echo $action; ?>" style="color:#222222">
        @csrf
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Họ tên</div>
                <div class="col-md-10">
                <input style="color:#222222" type="text" name="name" value="<?php echo isset($record->name) ? $record->name : ""; ?>" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10">
                <input style="color:#222222" type="email" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> value="<?php echo isset($record->email) ? $record->email : ""; ?>" name="email" class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mật khẩu</div>
                <div class="col-md-10">
                <input style="color:#222222"  type="password" name="password" <?php if(isset($record->email)): ?> placeholder="Không đổi mật khẩu thì không nhập thông tin" <?php else: ?> required <?php endif; ?> class="form-control">
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