@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('PGSO')])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="alert alert-danger" id="error" style="display: none;"></div>
        <div class="card card-login card-hidden mb-3" >
          <div id="verify1">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <!-- <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div> -->
          </div>
          <div class="card-body ">
          <div class="alert alert-danger" id="error" style="display: none;"></div>
            <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-check mr-auto ml-3 mt-3">
              <p align="right">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" name="showpass"> {{ __('Show Password') }}
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
              </p>
            </div>

            <div class="bmd-form-group{{ $errors->has('phone') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="{{ __('Cellphone number...+639..') }}" value="{{ old('phone') }}" required>
              </div>
              @if ($errors->has('phone'))
                <div id="phone-error" class="error text-danger pl-3" for="phone" style="display: block;">
                  <strong>{{ $errors->first('phone') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <!-- <i class="material-icons">email</i> -->
                  </span>
                </div>
                <div class="block mt-1 w-full g-recaptcha" id="recaptcha-container" required></div>
              </div>
            </div>
            <!-- <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div> -->
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg" onclick="sendOTP();">{{ __('Send code') }}</button>
          </div>
          </div>

          <div class="alert alert-success" id="success" style="display: none;"></div>
          <div id="verify2" style="display: none;">
              <div class="bmd-form-group mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">code</i>
                      </span>
                    </div>
                    <input id="verification" type="text" name="verification" class="form-control" placeholder="{{ __('verification code...') }}" required>
                  </div>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-link btn-lg" onclick="verify();">{{ __('Confirm Registration') }}</button>
              </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

    <script>
        var firebaseConfig = {
          apiKey: "AIzaSyBTE-L_xzyjxvKzIxSyje4H2ynYpDIg9js",
          authDomain: "phone-auth-76c3d.firebaseapp.com",
          projectId: "phone-auth-76c3d",
          storageBucket: "phone-auth-76c3d.appspot.com",
          messagingSenderId: "895111600975",
          appId: "1:895111600975:web:f01e477e890fd2932fc33a",
          measurementId: "G-KEZCY0Q795"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };
        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        function sendOTP() {
          var email =  $("#email").val();
            var pass = $("#password").val();

            var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            var passw=  /^[A-Za-z]\w{7,14}$/;
            // var num = $count;
            // var me = "unique";
            // var colors = [$user['email']];

            // colors.forEach(function(color){
            //     if(color == email){
            //         me = "not";
            //     }
            // });

            // foreach($user as $user){
            //     if($user['email'] == email)){
            //         me = "not";
            //     }
            // }
            //   for (let i = 0; i < num; i++) {
            //       if($user[i]->email == email)){
            //           me = "not";
            //       }
            //  }

            //  if(me == "not"){
                if($("#password_confirmation").val() != "" && $("#password").val() != "" && $("#email").val() != "" && $("#name").val() != "" ){
                    if(email.match(pattern)){
                        if(pass.match(passw)){
                                if($("#password_confirmation").val() != $("#password").val()){
                                    $("#error").text("Password doesn't match!");
                                    $("#error").show();
                                }
                                else if(pass.length < 8){
                                    $("#error").text("The password must be at least 8 characters.");
                                    $("#error").show();
                                }else{
                                    var number = $("#phone").val();
                                    if(number.charAt(0) == "+" && number.charAt(1) == "6" && number.charAt(2) == "3" && number.charAt(3) == "9"){
                                        if(number.length > 12){
                                            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                                            window.confirmationResult = confirmationResult;
                                            coderesult = confirmationResult;

                                            console.log(coderesult);
                                            $("#success").text("Message sent");
                                            $("#success").show();
                                            var element = document.getElementById("error");
                                            element.style.display = "none";
                                            var element = document.getElementById("verify1");
                                            element.style.display = "none";
                                            var element = document.getElementById("verify2");
                                            element.style.display = "block";
                                        }).catch(function (error) {
                                            $("#error").text(error.message);
                                            $("#error").show();
                                        });
                                        }else{
                                          $("#error").text("Phone number is too short");
                                          $("#error").show();
                                        }
                                    }else{
                                      $("#error").text("Incorrect phone number format!");
                                    }
                                }
                        }else{
                                $("#error").text("Password must contain combination of letters and number");
                                $("#error").show();
                            }
                    }
                    else{
                        $("#error").text("Please input a valid email address");
                        $("#error").show();
                    }
                }else{
                    $("#error").text("Please Input the necessary fields!");
                    $("#error").show();
                }
            //  }else{
            //      $("#error").text($count);
            //      $("#error").show();
            //  }
        }
        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                // var element = document.getElementById("error1");
                // element.style.display = "none";
                // var element = document.getElementById("verify1");
                // element.style.display = "none";
                // var element = document.getElementById("success");
                // element.style.display = "none";
                //  $("#success").text("Successful Registration");
                //  $("#success").show();
                //  $("#successOtpAuth").text("Successful Registration");
                //  $("#successOtpAuth").show();
                document.getElementById("mySubmit").submit();
            }).catch(function (error) {
                // var element = document.getElementById("success");
                // element.style.display = "none";

                $("#error1").text("Invalid code");
                $("#error1").show();
            });
        }
        function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }

                var p = document.getElementById("password_confirmation");
                if (p.type === "password") {
                    p.type = "text";
                } else {
                    p.type = "password";
                }
        }
    </script>
@endsection
