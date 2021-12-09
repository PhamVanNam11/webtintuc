<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// sử dụng mô hình MVC
// load class Model để sử dụng ở đây
use App\Models\News;

// sử dụng mô hình MVC: lấy dữ liệu từ model

class NewsController extends Controller
{
    // tạo biến $model (là 1 biến bên trong class NewsController)
    public $model;
    // hàm tạo
    public function __construct(){
        // gán biến $model trở thành biến object của class News
        $this->model = new News();
    }
    // lấy danh sách các bản ghi
    public function read(){
        // lấy dữ liệu từ hàm modelRead của class News
        $data = $this->model->modelRead();
        // gọi view, truyền dữ liệu ra view
        return view("backend.news_read",["data"=>$data]);
    }
    // update 
    public function update($id){
        $action = url("admin/news/update/$id");
        // lây 1 bản ghi
        $record = $this->model->modelGetRecord($id);
        return view("backend.news_create_update",["record"=>$record,"action"=>$action]);
    }
    // update post
    public function updatePost($id){
        $this->model->modelUpdate($id);
        return redirect(url('admin/news'));
    }
    //create
    public function create(Request $request){
        //tao mot action de dua vao thuoc tinh action cua the form
        $action = url("admin/news/create");
        return view("backend.news_create_update",["action"=>$action]);
    }
    //create post
    public function createPost(Request $request){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    //delete
    public function delete(Request $request,$id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
