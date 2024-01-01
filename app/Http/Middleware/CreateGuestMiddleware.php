<?php

namespace App\Http\Middleware;

use App\Helpers\SessionHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is not logged in
        if (!auth()->check()) {
            $session_id = SessionHelper::generate_unique_session_id();

            // Store the guest information in the database
            DB::table('guests')->insert([
                'session_id' => $session_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $next($request);
    }

}
