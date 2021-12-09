<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// trong controller muốn sử dụng đối tượng nào thì phải khai báo ở đây
use DB;
// đối tượng mã hóa password
use Hash;

// thực hiện Query Builder: sử dụng đối tượng DB

class UsersController extends Controller
{
    // url: public/admin/users
    public function read(){
        // paginate(4) -> phân 4 bản ghi trên 1 trang
        $data =DB::table("users")->orderBy("id","desc")->paginate(4);
        // gọi view
        return view("backend.users_read",["data"=>$data]);
    }
    public function update($id){
        // tạo 1 action để đưa vào thuộc tính action của thẻ form
        $action =  url("admin/users/update/$id");
        // lấy 1 bản ghi
        // first() -> lấy 1 bản ghi
        $record = DB::table("users")->where("id","=",$id)->first();
        return view("backend.users_create_update",["record"=>$record,"action"=>$action]);
    }
    // update -POST
    public function updatePost($id){
        $name = request("name");
        $password = request("password");
        // update name
        DB::Table("users")->where("id","=",$id)->update(["name"=>$name]);
        // nếu password ko rỗng thì update password
        if($password != ""){
            // mã hóa password
            $password = Hash::make($password);
            DB::Table("users")->where("id","=",$id)->update(["password"=>$password]);
        }
        // di chuyển đến 1 url khác
        return redirect(url("admin/users"));
    }
    // create - GET
    public function create(){
        // tạo 1 action để đưa vào thuộc tính action của thẻ form
        $action = url("admin/users/create");
        return view("backend.users_create_update",["action"=>$action]);
    }
    //create - POST
    public function createPost(){
        $name = request("name");
        $email=request("email");
        $password = request("password");
        // mã hóa password
        $password =Hash::make($password);
        // ktra email đã tồn tại chưa
        $countEmail = DB::Table("users")->where("email","=",$email)->Count();
        if($countEmail ==0){
            //create name
            DB::Table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$name]);
            //di chuyen den mot url khac
            return redirect(url("admin/users"));
        }else   
        return redirect(url("admin/users/create?notify=emailExists"));
    }
    // delete
    public function delete($id){
        // lấy 1 bản ghi
        // first() -> lấy 1 bản ghi
        DB::table("users")->where("id","=",$id)->delete();
        //di chuyen den mot url khac
        return redirect(url("admin/users"));
    }
}
