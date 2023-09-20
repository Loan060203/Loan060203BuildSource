<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class LogSqlQuery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\JsonResponse
    {
        DB::enableQueryLog();

        $response = $next($request);

        $queries = DB::getQueryLog();

        $response->header('X-SQL-Queries', json_encode($queries));
        //$response = response()->json(['queries' => $queries]);

        return $response;
    }
}
