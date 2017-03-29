<?php

namespace App\PiplModules\admin\Middleware;
use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class RedirectLogin
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     
     * @return mixed
     
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->check())
        {
         return redirect('admin/dashboard');
        }else
        {
	   return $next($request);
           
        }
    }
}
