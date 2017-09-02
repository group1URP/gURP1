<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckRole
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


            if (Auth::check() && Auth::user()->is_client ) {

                $routeName = $request->route()->getName() ;
                switch ($routeName){
                    case 'projects.create' :
                    case 'projects.update':
                    case 'projects.store':
                    case 'projects.destroy':
                    case 'projects.show':
                    case 'projects.index':
                        return $next($request);
                        break;
                }

                return redirect('/dashboard');
            }
            if (Auth::check() && !Auth::user()->is_client ){

                $routeName = $request->route()->getName() ;
                switch ($routeName){
                    case 'projects.create' :
                    case 'projects.update':
                    case 'projects.store':
                    case 'projects.destroy':
                        return redirect('/dashboard');
                        break;
                }


                    return $next($request);


            }
            $routeName = $request->route()->getName() ;
            switch ($routeName){
                case 'projects.index':
                case 'projects.show':
                    return $next($request);
                    break;
            }







        /*
        if ($request->user() === null){
            return response("Insufficient permissions", 401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        ////
        if($roles === $request->user()->userRole()){
            return $next($request);
        } else
            return response("Insufficient permissions", 401);

       ////
        if ($roles === 'client' && $request->user()->is_client){
            return $next($request);
        }
        */


    }
}
