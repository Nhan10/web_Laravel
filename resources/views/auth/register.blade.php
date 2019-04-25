@include('front_end.layouts.header')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"><img src="{{asset('storage/images/2cGuY4vvzJD1GmyiXDjJPh9aVv7Zv3x48cdFsM8D.png')}}" alt="" width="400"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user"  method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-user" name="name" value="{{ old('name') }}" required autofocus id="exampleInputName" placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ old('email') }}" required id="exampleInputEmail" placeholder="Email Address">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" name="password" required id="exampleInputPassword" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" required placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                    <input id="diachi" type="text" class="form-control" name="diachi" required placeholder="Địa chỉ">
                            </div>

                            <div class="form-group">
                                    <input id="sdt" type="text" class="form-control" name="sdt" required placeholder="Số điện thoại">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register') }}
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login')  }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('front_end.layouts.footer')