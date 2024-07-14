<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserId
{
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id(); // Dapatkan ID pengguna yang sedang login
        $requestedId = $request->route('id'); // Dapatkan ID dari route

        if ($userId != $requestedId) {
            return redirect('/unauthorized'); // Atau tampilkan pesan kesalahan
        }

        return $next($request);
    }
}
