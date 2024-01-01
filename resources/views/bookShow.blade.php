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
						<div class="details">
							<p>
							{{ $book->price }} DH
							</p>

						</div>
						<div class="details">

                            <button type="submit" class="btn-main-md" onclick="addToCart({{ $book->id }})">
                                  Add to Cart
                            </button>

                            <script>
                                  function addToCart(bookId) {
                                        window.location.href = '/add-to-cart/' + bookId;
                                  }

                            </script>



                        </div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-main-md').on('click', function () {
            var bookId = {{ $book->id }};

            $.ajax({
                type: 'GET',
                url: '{{ route("addToCart", ["bookId" => ":bookId"]) }}'.replace(':bookId', bookId),
                success: function (response) {
                    console.log(response.message);
                },
                error: function (error) {
                    console.log(error.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection
