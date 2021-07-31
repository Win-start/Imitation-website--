<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EnableCrossRequestMiddleware extends Middleware
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
       $response = $next($request);
       $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
//        $allow_origin = [
//            'http://127.0.0.1:9001',//允许访问
//            'http://localhost:9001'
//        ];
//        if (in_array($origin, $allow_origin)) {
//            $response->header('Access-Control-Allow-Origin', $origin);
//            $response->header('Access-Control-Allow-Origin', '*');
//            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN');
//            $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
//            $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
//            $response->header('Access-Control-Allow-Credentials', 'true');
//        }

        $response->header('Access-Control-Allow-Origin', $origin);
        $response->header('Access-Control-Allow-Headers', 'Accept,Accept-Encoding,Accept-Language,Connection,Content-Length,Content-Type,x-xsrf-token, Cookie,Host,Origin,Referer,User-Agent, Authorization,X-Requested-With,OsType');
        $response->header('Access-Control-Allow-Methods', 'POST,GET, HEAD,PUT, DELETE, TRACE, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'true');
        return $response;
    }
}
