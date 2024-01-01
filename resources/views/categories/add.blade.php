@extends("navigations.admin")
@section('content')

  <section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Category</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Add Category</a></li>
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
					<h3>Add<span class="alternate"> Category</span></h3>
                    @if (session('success'))
                        <p  class="alert alert-success mb-4">{{ session('success') }}</p>
                    @elseif ($errors->has('name'))
                        <p  class="alert alert-danger mb-4">{{ $errors->first('name') }}</p>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p  class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
        <form class="row" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
			<div class="col-md-12">
				<input type="name" class="form-control main" name="name" id="name" placeholder="Category's name" required>
			</div>

            <div class="col-md-12">
                <label class="form-label" for="photo">Photo</label>
                <input type="file" class="form-control main" name="photo" id="photo" placeholder="photo">
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-main-md">Add</button>
        </div>
		</form>
	</div>
</section>

@endsection



