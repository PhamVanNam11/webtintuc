<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// trong Model muốn sử dụng đối tượng nào thì f khai báo đối tượng đó
// sử dụng đối tượng DB để thao tác csdl
use DB;
// đối tượng để lấy GET,POST,FILE
use Request;

class News extends Model
{
    use HasFactory;
    // hàm lấy các bản ghi có phân trang
    public function modelRead(){
        $data= DB::table("news")->orderBy("id","desc")->paginate(10);
        return $data;
    }
    // update 
    public function modelGetRecord($id){
        $record = DB::table("news")->where("id","=",$id)->first();
        return $record;
    }
    // update
    public function modelUpdate($id){
        $name = request("name");
        $category_id = request("category_id");
        $mota = request("mota");
        $noidung = request("noidung");
        $hot = request("hot") != "" ? 1 : 0;
        $date = request("date");
        // update bản ghi
        DB::table("news")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"mota"=>$mota,"noidung"=>$noidung,"hot"=>$hot,"date"=>$date]);
        // nếu có ảnh thì upload ảnh
        if(Request::hasFile("photo")){
            // --
            // lấy ảnh để xóa
            // select("photo") -> chỉ lấy trường dữ liệu có tên là photo trong table news
            $oldPhoto= DB::table("news")->where("id","=",$id)->select("photo")->first();
            if(isset($oldPhoto->photo)&& file_exists('upload/news/'.$oldPhoto->photo)&&$oldPhoto!="")
                unlink('upload/news/'.$oldPhoto->photo);
            // ---
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            // thực hiện upload ảnh
            Request::file("photo")->move("upload/news",$photo);
            // update bản ghi
            DB::table("news")->where("id","=",$id)->update(["photo"=>$photo]);
        }
        
    }
    //create
    public function modelCreate(){
        $name = Request::get("name");
        $category_id = Request::get("category_id");
        $mota = Request::get("mota");
        $noidung = Request::get("noidung");
        $hot = Request::get("hot") != "" ? 1 : 0;
        $photo = "";        
        //neu co anh thi upload anh
        if(Request::hasFile("photo")){
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move("upload/news",$photo);
        }
        $date = Request::get("date");
        //update ban ghi
        DB::table("news")->insert(["name"=>$name,"category_id"=>$category_id,"mota"=>$mota,"noidung"=>$noidung,"hot"=>$hot,"photo"=>$photo,"date"=>$date]);
    }
    public function modelDelete($id){
        //---
        //lay anh cu de xoa
        $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if(isset($oldPhoto->photo) && file_exists('upload/news/'.$oldPhoto->photo)&&$oldPhoto->photo!="")
            unlink('upload/news/'.$oldPhoto->photo);
        //---
        DB::table("news")->where("id","=",$id)->delete();
    }
}
