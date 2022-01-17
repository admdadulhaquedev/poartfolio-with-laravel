<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Str;


class Visitors {
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
    public function handle(Request $request, Closure $next){

        $user_ip = request()->ip();

        if (Visitor::whereDate('created_at', Carbon::today())->exists()) {

            $today_visitors_ips = Visitor::whereDate('created_at', Carbon::now()->format('Y/m/d'))->first()->ip;
            $check_ip = Str::contains($today_visitors_ips, $user_ip);

            if (!$check_ip) {
                Visitor::whereDate('created_at', Carbon::now()->format('Y/m/d'))->update([
                    'ip' => $today_visitors_ips.",".$user_ip,
                ]);
                Visitor::whereDate('created_at', Carbon::now()->format('Y/m/d'))->increment('visitors');
            }

        }else{
            Visitor::insert([
                'ip' =>  $user_ip,
                'visitors' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        return $next($request);

    }
}
