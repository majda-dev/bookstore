@extends('navigations.admin')
@section("content")

  <section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Admin</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="#">Add book</a></li>
				  {{-- <li class="breadcrumb-item active">Our Speaker</li> --}}
				</ol>
			</div>
		</div>
	</div>
</section>


<section class="section contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Add<span class="alternate"> Book</span></h3>
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @elseif ($errors->has('name'))
                        <p class="alert alert-danger mb-4">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('book_series.update', ['id' => $book_serie->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control main" name="name"
                 id="name"
                 value="{{ $book_serie->name }}" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="desctiption">Desctiption</label>
                <textarea class="form-control main" name="description"
                id="description"
                rows="5"
                required> {{ $book_serie->description }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Photo</label>
                <input accept="image/*" type="file"
                 class="form-control main" name="photo"
                 id="photo" placeholder="photo"
                 value="{{ basename($book_serie->photo) }}"
                 >
            </div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Number Of Books</label>
                <input type="number" class="form-control main"
                 name="number_of_books" id="number_of_books"
                 placeholder="number_of_books"
                 value="{{ $book_serie->number_of_books }}"
                 required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="category">Category</label>
                <select class="form-control main selectpicker" name="category" id="category" required>
                    <option value="">-- Choose book's category --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $book_serie->category->id ? 'selected' : '' }}                            >
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="writer">Writer</label>
                <select class="form-control main selectpicker" name="writer" id="writer">
                    <option value="">-- Choose book's writer --</option>
                    @foreach ($writers as $writer)
                        <option value="{{ $writer->id }}" {{ $writer->id == $book_serie->writer->id ? 'selected' : '' }}>
                            {{ $writer->first_name }} {{ $writer->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="price">Price</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control main"
                    name="price" id="price" aria-describedby="basic-addon1"
                    value="{{ $book_serie->price }}">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">DH</span>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label" for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity"
                class="form-control main"
                value="{{ $book_serie->quantity }}"/>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection
