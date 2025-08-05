<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;


class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$ip = hash('sha512', $request->ip());
        $ip = $request->ip();

        $date = Carbon::now()->toDateString();

        if (Visitor::where('record_date', today())->where('ip', $ip)->count() < 1)
        {
            Visitor::create([
                'record_date' => $date,
                'ip' => $ip,
            ]);
        }
        return $next($request);
    }
}
