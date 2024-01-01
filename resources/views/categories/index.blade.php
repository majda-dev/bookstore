@extends('navigations.admin')
@section("content")

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Our Categories</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  <li class="breadcrumb-item active">Our Categories</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--==============================
=            Sponsors            =
===============================-->

<section class="sponsors section  overlay-white">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Our <span class="alternate">Categories</span></h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor incididunt ut labore dolore</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Title -->
				<div class="block text-center">
                    <!-- Sponsors image list -->
                    <ul class="list-inline sponsors-list">
                        @foreach ($categories as $category)
                            <li class="list-inline-item">
                                <div class="image-block text-center">
                                    <a href="#">
                                        <label for="categorie" class="img-fluid">{{ $category->name}}</label>
                                    </a>

                                    <div class="social-section">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="social-icon">Update</a>
                                            <button type="submit" class="list-inline-item delete">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>





				<div class="sponsor-btn text-center">
					<a href="{{ route('categories.add') }}" class="btn btn-main-md">Add Category</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection




