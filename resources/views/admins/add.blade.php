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
				  <li class="breadcrumb-item"><a href="index.html">Add Admins</a></li>
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
                        <p  class="alert alert-success mb-4">{{ session('success') }}</p>
                    @elseif ($errors->has('email'))
                        <p  class="alert alert-danger mb-4">{{ $errors->first('email') }}</p>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p  class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
        <form class="row" method="POST" action="{{ route('admins.store') }}" enctype="multipart/form-data">
            @csrf
			<div class="col-md-12">
				<input type="name" class="form-control main" name="name" id="name" placeholder="Full name">
			</div>
            <div class="col-md-6">
				<input type="email" class="form-control main" name="email" id="email" placeholder="E-mail">
			</div>
            <div class="col-md-6">
				<input type="password" class="form-control main" name="password" id="password" placeholder="Password">
			</div>

            <div class="col-md-12">
				<input type="file" class="form-control main" name="photo" id="photo" placeholder="Phoro">
			</div>

            <div class="col-md-4">
                <label class="form-label">Privilege</label>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="privilege" id="super_admin" value="super_admin">
                    <label class="form-check-label" for="super_admin">Super Admin</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio" name="privilege" id="admin" value="admin">
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
            </div>




        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-main-md">Add</button>
        </div>
		</form>
	</div>
</section>
@endsection

