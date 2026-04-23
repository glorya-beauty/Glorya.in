<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\CartController;

class TransferGuestCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only transfer cart if user is authenticated and has guest cart
        if (auth()->check() && session()->has('guest_cart')) {
            $cartController = new CartController();
            $cartController->transferGuestCart();
        }
        
        return $next($request);
    }
}
