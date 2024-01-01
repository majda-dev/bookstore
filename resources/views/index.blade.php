@extends('navigations.admin')
@section("content")

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Our Books</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  {{-- <li class="breadcrumb-item active">Our Speaker</li> --}}
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--==============================
=            Speakers            =
===============================-->

<section class="section speakers white">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title">
					<h3>Best <span class="alternate">Sellers</span></h3>
					<p>Find the New York Times best new books each week sorted
                        by format and genre, including fiction, nonfiction,
                        advice & how-to, graphic novels, children's books, and more...</p>
				</div>
			</div>
		</div>
        @if (session('success'))
                <p class="alert alert-success mb-4">{{ session('success') }}</p>
        @endif
		<div class="row">
            @foreach ($books as $book)
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('books/'.$book->photo) }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials">
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <ul class="list-inline">
                                    <a href="{{  route('books.edit', ['id' => $book->id]) }}" class="list-inline-item">Update</a></li>
                                   <button type="submit" class="list-inline-item delete">Delete</button></li>
                                </ul>
                            </form>
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="{{ route('booksshow.show', ['encryptedId' => $hashids->encode($book->id)]) }}">{{ $book->title }}</a></h5>
						<p>Author: {{ $book->writer->first_name }} {{ $book->writer->   last_name }}</p>
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</div>
</section>

@endsection
