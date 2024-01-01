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
                    @elseif ($errors->any())
                        @foreach($errors->all() as $error)
                            <p  class="alert alert-danger mb-4">{{ $error }}</p>
                        @endforeach
                    @endif
                    <p id="result" class="error"></p>
				</div>
			</div>
		</div>
        <form class="row" method="POST" action="{{ route('admins.updatePassword', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="">your new password</label>
				<input type="password" class="form-control main" name="password" id="password"
                placeholder="Your New Password" oninput="verifypassword()">
			</div>

            <div class="col-md-6">
                <label for="">Repeat password</label>
				<input type="password" class="form-control main" name="repeat-password" id="repeat-password"
                placeholder="Repeat your Password" oninput="verifypassword()">
			</div>

        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-main-md">Update Your Password</button>
        </div>
		</form>
	</div>
</section>
<script>

function verifypassword() {
    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("repeat-password").value;

    if (password1 === "" && password2 === "") {
        document.getElementById("result").innerHTML = "";
    } else if (password1 === password2) {
        document.getElementById("result").innerHTML = "The texts match!";
        document.getElementById("result").className = "";
    } else {
        document.getElementById("result").innerHTML = "The texts do not match!";
        document.getElementById("result").className = "error";
    }
}
</script>
@endsection

