@extends('navigations.admin')
@section('content')

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Admins List</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  <li class="breadcrumb-item active">Event Schedule</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--==============================
=            Schedule            =
===============================-->

<section class="section schedule">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Admins <span class="alternate"> List</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">

				<div class="schedule-contents bg-schedule">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active schedule-item" id="nov20">
					  	<!-- Headings -->
					  	<ul class="m-0 p-0">
                            <li class="headings">
                                <div class="time" hidden>Time</div>
                                <div class="speaker">Picture</div>
                                <div class="subject">email</div>
                                <div class="venue">Privilege</div>
                                <div class="action">Action</div>
                            </li>


					  		<li class="schedule-details">
					  			<div class="block">
					  				<!-- time -->
                                      <div class="time" hidden>
                                        <i class="fa fa-clock-o"></i>
                                        <span class="time">9.00 AM</span>
                                    </div>
							  		<!-- Speaker -->
							  		<div class="speaker">
							  			<img src="{{ asset('admins/'.$admin->user->photo) }}" alt="Admin" class="admin_picture">
										<span class="name">{{ $admin->user->name }}</span>
							  		</div>
							  		<!-- Subject -->

							  		<!-- Venue -->
							  		<div class="subject">{{ $admin->user->email }}</div>



                                    @if($admin->user->isadmin==1)
                                        <div class="venue">Super Admin</div>
                                    @else
                                        <div class="venue">Admin</div>
                                    @endif

                                    <u><a href="{{  route('admins.edit', ['id' => $admin->user->id]) }}" class="action">Update</a></u>
					  			</div>
					  		</li>

					  	</ul>

					  </div>

					  <div class="tab-pane fade schedule-item" id="nov22">

					  </div>
					</div>
				</div>



			</div>
		</div>
	</div>
</section>



@endsection

