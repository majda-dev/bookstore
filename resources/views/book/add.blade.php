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
                    @if (session('success'))
                        <p class="alert alert-success mb-4">{{ session('success') }}</p>
                    @elseif ($errors->has('title'))
                        <p class="alert alert-danger mb-4">{{ $errors->first('title') }}</p>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <form class="row" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label class="form-label" for="title" hidden>Id</label>
                <input type="text" class="form-control main" name="id" id="book_id" placeholder="Book ID" hidden>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control main" name="title" id="title" placeholder="Title" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="desctiption">Desctiption</label>
                <textarea class="form-control main" name="description" id="description" placeholder="Book's Description" rows="5" required></textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Photo</label>
                <input type="file" class="form-control main" name="photo" id="photo" placeholder="photo" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="category">Category</label>
                <select class="form-control main selectpicker" name="category" id="category" required>
                    <option value="">--Choose book's category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="writer">Writer</label>
                <select class="form-control main selectpicker" name="writer" id="writer">
                    <option value="">--choose the Books'writer</option>
                    @if(isset($writers) && count($writers) > 0)
                    @foreach ($writers as $writer)
                        <option value="{{ $writer->id }}">{{ $writer->first_name }} {{ $writer->last_name }}</option>
                    @endforeach
                @else
                    <option value="" disabled>No writers available</option>
                @endif
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="price">Price</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control main" name="price" id="price" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">DH</span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="publication date">Publication Date</label>
                <input type="date" id="publication_date" class="form-control main" name="publication_date" />
            </div>

            <div class="col-md-12">
                <label class="form-label" for="publisher">Publisher</label>
                <select class="form-control main selectpicker" name="publisher" id="publisher">
                    @if(isset($publishers) && count($publishers) > 0)
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                @else
                    <option value="" disabled>No publishers available</option>
                @endif
                </select>
            </div>


            <div class="col-md-12">
                <label class="form-label" for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity" class="form-control main" />
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Add</button>
            </div>
        </form>
    </div>
</section>
@endsection
