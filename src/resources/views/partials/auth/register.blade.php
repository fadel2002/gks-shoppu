<!--================register_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Already have an account?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                            <a href="/login" class="btn_3">Login to an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        @if(session()->has('failed'))
                            <h3> {{ session('failed') }} </h3>
                        @else 
                            <h3>Hello! <br>
                                Sign up now</h3>
                        @endif
                        <form class="row contact_form" action="/register" method="post">
                            @csrf
                            {{-- <input name="a_id" type="hidden" value="11"> --}}
                            <input name="a_id" type="hidden" value=nextval('ACCOUNT_SEQ')>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                                    placeholder="Username" required value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Email address" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                    placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <textarea class="form-control @error('a_alamat') is-invalid @enderror" id="a_alamat" name="a_alamat" rows="3" cols="50" 
                                    placeholder="Home Address" required>{{ old('a_alamat') }}</textarea>
                                @error('a_alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================register_part end =================-->
