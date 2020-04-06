<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        $data = [
            ['name' => '山田太郎', 'mail' => 'taro@yamada'],
            ['name' => '田中花子', 'mail' => 'hanako@flower'],
            ['name' => '鈴木幸子', 'mail' => 'sachico@happy']
        ];
        $request->merge(['data' => $data]);
        $response  = $next($request);
        $content = $response->content();

        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
