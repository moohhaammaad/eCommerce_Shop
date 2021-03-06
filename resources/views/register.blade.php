@extends('layout')


@section('content')
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
                <form action="/make-register" method="post">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif

                    @csrf
                    <input name="name" type="text" placeholder="Enter Name..." required=" " >
                    <input name="address" type="text" placeholder="Enter Address..." required=" " >
				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input value="1" name="is_newsletters" type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>
				<h6>Login information</h6>
					<input name="email" type="email" placeholder="Email Address" required=" " >
					<input name="password" type="password" placeholder="Password" required=" " >
                    <input name="re_password" type="password" placeholder="Password Confirmation" required=" " >
                    
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="/">Home</a>
			</div>
		</div>
	</div>


@endsection