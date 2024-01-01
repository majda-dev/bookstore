@extends('navigations.client')
@section("content")

  <section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Admin</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Sign up</a></li>
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
                    <h3>Sign<span class="alternate">up</span></h3>
                    @if (session('success'))
                        <p class="alert alert-success mb-4">{{ session('success') }}</p>
                    @elseif ($errors->has('email'))
                        <p class="alert alert-danger mb-4">{{ $errors->first('email') }}</p>
                    @elseif ($errors->has('repeat-password'))
                        <p class="alert alert-danger mb-4">{{ $errors->first('repeat-password') }}</p>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <form class="row" method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <input type="text" class="form-control main" name="name" id="name" placeholder="Full name" required>
            </div>
            <div class="col-md-12">
                <input type="email" class="form-control main" name="email" id="email" placeholder="E-mail" required>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control main" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control main" name="repeat-password" id="repeat-password" placeholder="Repeat your Password" required>
            </div>

            <div class="col-md-12 text-center">
                <input type="checkbox" class="" name="remember" id="remember">
                <label for="remember">Remember Me</label>
			</div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-main-md">Sign Up</button>
            </div>
        </form>
    </div>
</section>



@endsection
