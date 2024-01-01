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
                    <h3>Add<span class="alternate"> Writer</span></h3>
                    @if (session('success'))
                        <p class="alert alert-success mb-4">{{ session('success') }}</p>
                    @elseif ($errors->has('email'))
                        <p class="alert alert-danger mb-4">{{ $errors->first('email') }}</p>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <form class="row" method="POST" action="{{ route('writers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label class="form-label" for="first_name">First Name</label>
                <input type="text" class="form-control main" name="first_name" id="first_name" placeholder="Author's First Name" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="last_name">Last Name</label>
                <input type="text" class="form-control main" name="last_name" id="last_name" placeholder="Author's Last Name" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="bio">Author's Biography</label>
                <textarea class="form-control main" name="bio" id="bio" placeholder="Author's Biography" rows="5" required></textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="email">Author's E-mail</label>
                <input type="email" class="form-control main" name="email" id="email" placeholder="Author's Email"  required>
            </div>

            <div class="col-md-12">
                <label type="text" class="form-label" for="phone_">Author's Phone Number</label>
                <input type="text" class="form-control main" name="phone" id="phone" placeholder="Author's Phone Number" rows="5" required></textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Author's Picture</label>
                <input type="file" class="form-control main" name="photo" id="photo" placeholder="Author's Picture" required>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Add</button>
            </div>
        </form>
    </div>
</section>

@endsection
