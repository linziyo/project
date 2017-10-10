<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 上午 11:48
 */

namespace Jzyuchen\WechatComponent\Middleware;


use Closure;

class WechatComponentMiddleware
{
    public function handle($request, Closure $next, $guard = 'wechat')
    {
        return $next($request);
    }
}