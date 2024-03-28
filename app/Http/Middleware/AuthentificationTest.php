<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\APP;
use Illuminate\Support\Facades\Session;


class AuthentificationTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', config('app.locale'));
        App::setLocale($locale);

        if (!session()->has("loginID") && ($request->path() != "login") && ($request->path() != "reg")) {
            return redirect("login")->with("fail", __("Privaloma prisijungti"));
        }

        if (session()->has("loginID") && ($request->path() == "login" || $request->path() == "reg")) {
            return back();
        }

        return $next($request);
    }
}
