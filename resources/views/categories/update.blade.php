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
        <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control main" name="name"
                 id="name"
                 value="{{ $category->name }}" required>
            </div>



            <div class="col-md-12">
                <label class="form-label" for="photo">Photo</label>
                <input accept="image/*" type="file"
                 class="form-control main" name="photo"
                 id="photo" placeholder="photo"
                 value="{{ basename($category->photo) }}"
                 >
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection
