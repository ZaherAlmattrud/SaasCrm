<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SelectBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(   $request->session()->get('businessId') ){
 


        }else{

            $currentUser =  Auth::user();
            $businessCount = $currentUser->businesses->count();
            if(  $businessCount == 1){
                //add to session
                $request->session()->put('businessId', $currentUser->businesses[0]->id);
                $request->session()->put('businessName', $currentUser->businesses[1]->name);
                return redirect('/dashboard');
    
    
            }elseif( $businessCount == 0 ){
    
                return redirect('/?register=true');
    
            }elseif($businessCount>1){
                
                return redirect('/?selectBusiness=true');
            }
          
        }

       

 

        return $next($request);
    }
       
}
