@extends('navigations.admin')
@section("content")

  <section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Login</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
					<h3>Log<span class="alternate">in</span></h3>
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <p  class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif

				</div>
			</div>
		</div>
        <form class="row" method="POST" action="{{ route('login.authenticate') }}" enctype="multipart/form-data">
            @csrf
			<div class="col-md-12">
				<input type="email" class="form-control main" name="email" id="email" placeholder="Email">
			</div>
            <div class="col-md-12">
				<input type="password" class="form-control main" name="password" id="password" placeholder="Password">
			</div>
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-main-md">Login</button>
			</div>
		</form>
	</div>
</section>

@endsection
