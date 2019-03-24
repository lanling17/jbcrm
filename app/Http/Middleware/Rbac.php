<?php

namespace App\Http\Middleware;

use App\Models\Jurisdiction;
use App\Models\RoleJurisdiction;
use App\Models\UserRole;
use Closure;
use Auth;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取当前用户信息
        $uid = Auth::id();
        if (!$uid){
            return redirect()->route('login');
        }
        //获取当前用户角色
        $rids = UserRole::getUserRoleId($uid);
        if (!$rids){
            return redirect('/403');
        }
        //获取该角色下权限
        foreach ($rids as $rid) {
            $jids = RoleJurisdiction::getRoleJurisdictionId($rid);
            if ($jids){
                foreach ($jids as $jid){
                    $jurisdictions[] = Jurisdiction::find($jid);
                }
            }
        }
        //获取当前路由
        $route_uri = \Route::current()->uri;
        $uri_arr = explode('/',$route_uri);
        $route_method = $request->method();
        foreach ($jurisdictions as $k => $jurisdiction){
            //所有权限放行
            if ($jurisdiction->http_path == '*'){
                return $next($request);
            }
            //先判断请求方式
            if ($jurisdiction->http_method == 'ANY' || $jurisdiction->http_method == $route_method){
                //判断路径是否一样
                if ($route_uri == $jurisdiction->http_path){
                    return $next($request);
                }
                //匹配带*号的后缀全部通过
                $path_arr = explode('*',$jurisdiction->http_path);
                if ($path_arr[0] == $uri_arr[0]){
                    return $next($request);
                }
            }
//            $juri[$k]['method'] = $jurisdiction->http_method;
//            $juri[$k]['path'] = $jurisdiction->http_path;
        }
//        dd($route_uri,$route_method,$juri);
        return redirect('/403');
//        return $next($request);
    }
}
