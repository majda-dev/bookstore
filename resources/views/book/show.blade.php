@extends('navigations.admin')
@section('content')


<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>{{ $book->title }}</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="#">By {{ $book->writer->first_name }} {{ $book->writer->last_name }}</a></li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="section single-speaker">
	<div class="container">
		<div class="block">
			<div class="row">
				<div class="col-lg-5 col-md-6 align-self-md-center">
					<div class="image-block">
						<img src="{{ asset('books/' .  $book->photo) }}" class="img-fluid show" alt="speaker">
					</div>
				</div>
				<div class="col-lg-7 col-md-6 align-self-center">
					<div class="content-block">
						<div class="name">
							<h3>{{ $book->title }}</h3>
						</div>
						<div class="profession">
							<a href="{{ route('writers.show_books', ['id' => $book->writer->id]) }}">
                                <p>{{ $book->writer->first_name }} {{ $book->writer->last_name }}</p>
                            </a>
						</div>
						<div class="details">
							<p>
							{{ $book->description }}
							</p>

						</div>

                        <button type="submit" class="btn-main-md">

                            Add to Cart

                    </button>





					</div>
				</div>
			</div>
		</div>
		<div class="block-2">
			<div class="row">
				<div class="col-md-6">
					<div class="personal-info">
						<h5>Personal Information</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi explicabo suscipit deleniti voluptatum quos nostrum iure doloremque cupiditate voluptatem a enim eaque quod perspiciatis repudiandae, mollitia adipisci ea, quidem eveniet consequatur veniam error. Adipisci, suscipit corporis repellat, soluta vitae deserunt perspiciatis labore reprehenderit sapiente provident vel maxime.</p>
						<ul class="m-0 p-0">
							<li>Morbi fermentum felis nec</li>
							<li>Fermentum felis nec gravida tempus.</li>
							<li>Morbi fermentum felis nec</li>
							<li>Fermentum felis nec gravida tempus.</li>
							<li>Morbi fermentum felis nec</li>
						</ul>
					</div>
				</div>

	</div>


</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-main-md').on('click', function () {
            var bookId = {{ $book->id }}; // Replace with the actual value of the book ID

            $.ajax({
                type: 'GET',
                url: '{{ route("addToCart", ["bookId" => ":bookId"]) }}'.replace(':bookId', bookId),
                success: function (response) {
                    // Handle success, for example, show a success message or update the UI
                    console.log(response.message);
                },
                error: function (error) {
                    // Handle error, for example, show an error message
                    console.log(error.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection
