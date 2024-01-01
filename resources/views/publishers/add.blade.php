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
        <form class="row" method="POST" action="{{ route('publishers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label class="form-label" for="name">Publisher's name</label>
                <input type="text" class="form-control main" name="name" id="name" placeholder="Publisher's name" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="email">Publisher's email</label>
                <input type="email" class="form-control main" name="email" id="email" placeholder="Publisher's email" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="phone">Publisher's phone number</label>
                <input type="text" class="form-control main" name="phone" id="phone" placeholder="Publisher's phone number" required>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="address">Publisher's address</label>
                <textarea class="form-control main" name="address" id="address" placeholder="Publisher's address" rows="5" required></textarea>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Add</button>
            </div>
        </form>
    </div>
</section>



@endsection







