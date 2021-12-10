@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <?php /*  <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> */ ?>

<?php /*<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					@foreach ($adminData as $adminimag) 
                    @endforeach

					<div class="card fat">
						<div class="card-body">
							<!-- <h4 class="card-title">Login</h4> -->

                           <div class="brand">
						        <img src="{{ asset('admin/img/' . $adminimag->image) }}" alt="logo">
					        </div>
                            <form method="POST" action="{{ route('login') }}">
                                <!-- <form method="POST"> -->
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-8 col-form-label text-md-left"><b>{{ __('E-Mail Address') }}</b></label>

                            <div class="col-md-12">
                                 <input id="adminMail" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                 value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <!-- <input type="text" name="email" id="adminMail" class="form-controller">                         -->
                                <div><span id="adminEmail" ></span></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-left   "><b>{{ __('Password') }}</b></label>

                            <div class="col-md-12">
                                <input id="adminPass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <!-- <input type="password" id="adminPass" name="password"><br> -->
                                <span id="adminPassword"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-6" id="remembers">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                    <b>{{ __('Remember Me') }}</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" name="submit" class="btn btn-primary" id="loginbtn">
                                <b>{{ __('Login') }}</b>
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
						</div>
					</div>
					<!-- <div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div> -->
				</div>
			</div>
		</div>
	</section>
</body>*/?>  


     
       
        <div class="wrapper">
            @foreach ($adminData  as $adminimag) 
            @endforeach
            <div class="logo"> <img src="{{ asset('admin/img/' . $adminimag->image) }}" alt="logo"> </div>
            <div class="text-center mt-4 name"> Login </div>
            <form class="p-3 mt-3" method="post" action="{{ route('login') }}">
                @csrf
                <!-- <div class="card-body"> -->
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span> 
                        <input type="text" name="email" id="userName" placeholder="Username" class=" @error('email') is-invalid @enderror"> 
                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                    </div>
                    <div>
                        <span id="adminEmail" ></span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-field d-flex align-items-center"> 
                        <span class="fas fa-key"></span> 
                        <input type="password" name="password" id="pwd" placeholder="Password" class="
                        @error('password') is-invalid @enderror">
                        {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                    </div>
                    {{-- <button class="btn mt-3">Login</button> --}}
                    <button type="submit" name="submit" class="btn mt-3" id="loginbtn">
                        <b>{{ __('Login') }}</b>
                    </button>
                <!-- </div>     -->
            </form>
            <div class="text-center fs-6"> 
                <a href="#">Forget password?</a> or <a href="#">Sign up</a>
            </div>
        </div>
       
</div>
@endsection
