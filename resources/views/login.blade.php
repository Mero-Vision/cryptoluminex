<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <!-- font -->
    <link rel="stylesheet" href="fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/font-icons.css">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"type="text/css" href="{{ url('assets/css/styles.css') }}" />


    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ url('assets/img/logo.png') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ url('assets/img/logo.png') }}" />

    <title>Crypto Luminexx | Login</title>
      <script type="text/javascript">
      window.$crisp = [];
      window.CRISP_WEBSITE_ID = "1c4f9b8a-c62c-499c-aee1-94b7ad2512e8";
      (function() {
          d = document;
          s = d.createElement("script");
          s.src = "https://client.crisp.chat/l.js";
          s.async = 1;
          d.getElementsByTagName("head")[0].appendChild(s);
      })();
  </script>
</head>

<body>
    <!-- preloade -->
    {{-- <div class="preload preload-container">
        <div class="preload-logo" style="background-image: url('assets/img/144.png')">
          <div class="spinner"></div>
        </div>
    </div> --}}
    <!-- /preload -->
    <div class="header fixed-top bg-surface">
        <a href="{{ url('/') }}" class="left back-btn"><i class="icon-left-btn"></i></a>
    </div>
    <div class="pt-45 pb-20">
        <div class="tf-container">
            <div class="mt-32">
                <h2 class="text-center">Login Crypto Luminex</h2>
            </div>
            <div class="auth-line mt-12">Login</div>
            <form action="{{ url('login') }}" method="post" class="mt-16">
                @csrf
                <fieldset class="mt-16">
                    <label class="label-ip">
                        <p class="mb-8 text-small"> Email</p>
                        <input type="text" placeholder="Example@gmail" name="email">
                    </label>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="mt-16 mb-12">
                    <label class="label-ip">
                        <p class="mb-8 text-small">Password</p>
                        <div class="box-auth-pass">
                            <input type="password" required placeholder="Your password" class="password-field"
                                name="password">
                            <span class="show-pass">
                                <i class="icon-view"></i>
                                <i class="icon-view-hide"></i>
                            </span>
                        </div>
                    </label>
                </fieldset>
                <a href="reset-pass.html" class="text-secondary">Forgot Password?</a>
                <button class="mt-20">Login</button>
                <p class="mt-20 text-center text-small">Already have an Account? &ensp;<a href="{{url('register')}}">Sign
                        up</a></p>
            </form>
        </div>
    </div>



    <script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/main.js') }}"></script>


</body>

</html>
