<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class LogRequest
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

        DB::table('request_logs')
            ->insert([
                'http_status_code' => $response->status(),
                'request_method'   => $request->getMethod(),
                'route'            => $request->path()
            ]);

        return $response;
    }
}
