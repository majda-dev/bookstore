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
                    <h3>Update<span class="alternate"> Writer</span></h3>
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('writers.update', ['id' => $writer->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label class="form-label" for="first_name">First Name</label>
                <input type="text" class="form-control main" name="first_name"
                 id="first_name"
                 value="{{ $writer->first_name }}" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="last_name">Last Name</label>
                <input class="form-control main" name="last_name"
                id="last_name"
                rows="5" value="{{ $writer->last_name }}"
                required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="bio">Biography</label>
                <textarea class="form-control main" name="bio"
                id="bio"
                rows="5"
                required> {{ $writer->bio }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control main" name="email"
                id="email"
                rows="5" value="{{ $writer->email }}"
                required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control main" name="phone"
                id="phone"
                rows="5" value="{{ $writer->phone }}"
                required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Photo</label>
                <input accept="image/*" type="file"
                 class="form-control main" name="photo"
                 id="photo" placeholder="photo"
                 value="{{ basename($writer->photo) }}"
                 >
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection
