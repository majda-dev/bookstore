<?php

namespace App\Http\Middleware;

use App\Models\Book;
use Closure;
use Illuminate\Http\Request;

class BookSessionMiddleware
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
    // Example: Get the book details from the database based on the book_id from the request
    $bookId = $request->input('id');
    $book = Book::find($bookId);

    if ($book) {
        // Store the book information in the session
        session([
            'selected_book' => [
                'id' => $book->id,
                'title' => $book->title,
                // Add other book details as needed
            ],
        ]);
    }

    return $next($request);
}
}
