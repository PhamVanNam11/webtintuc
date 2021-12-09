<?php

namespace App\Http\Middleware;

use Closure;
// muốn sử dụng đối tượng nào thì phải khai báo đối tượng đó
// sử dụng đối tượng Auth để ktra đăng nhập
use Auth;
use Illuminate\Http\Request;
    
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // ktra xem user đã đăng nhập chưa
        // url('login') -> tạo url
        // redirect -> di chuyển đến 1 url
        if(Auth::check() == false)
            return redirect(url('login'));
        return $next($request);
    }
}