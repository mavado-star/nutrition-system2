<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class CheckSubscription
{
    public function handle(Request $request, Closure $next){
        $user = auth()->user();
        if($user && $user->role !== 'super_admin'){
            if(!$user->clinic || !$user->clinic->isActive()){
                return redirect()->route('subscription.expired');
            }
        }
        return $next($request);
    }
}