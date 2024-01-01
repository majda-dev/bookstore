@extends('navigations.admin')

@section('content')
<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Series Of Books List</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="r{{ route('index') }}">Home</a></li>
				  <li class="breadcrumb-item active">Our Books Series</li>
				</ol>
			</div>
		</div>
	</div>
</section>


<section class="section speakers white">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title">
					<h3>Books <span class="alternate">Series</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p>
				</div>
			</div>
		</div>

        @if (session('success'))
                <p class="alert alert-success mb-4">{{ session('success') }}</p>
        @elseif ($errors->has('name'))
            <p class="alert alert-danger mb-4">{{ $errors->first('name') }}</p>
        @endif

		<div class="row">
            @foreach ($book_series as $book_serie)
			<div class="col-lg-3 col-md-4 col-sm-6">
				<!-- Speaker 2 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('book_series/'.$book_serie->photo) }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials">
							<ul class="list-inline">
								<a href="{{  route('book_series.edit', ['id' => $book_serie->id]) }}" class="list-inline-item">Update</a>
								{{-- <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li> --}}
							</ul>
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="">{{ $book_serie->name }}</a></h5>
						<p>Author:<a href="{{ route('writers.show_books', ['id' => $book_serie->writer->id]) }}"> {{ $book_serie->writer->first_name }} {{ $book_serie->writer->last_name }}</a></p>
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</div>
</section>
@endsection
