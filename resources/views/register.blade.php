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

    <title>Coin Luminexx | Register Account</title>
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
    <div class="pt-45">
        <div class="tf-container">
            @livewire('user-account')

        </div>
    </div>

    <script>
        function toggleSubmitButton() {
            var checkbox = document.getElementById("form-checkbox");
            var submitButton = document.getElementById("submit-btn");

            // Enable or disable the submit button based on the checkbox state
            submitButton.disabled = !checkbox.checked;

            // Toggle the button color
            if (checkbox.checked) {
                submitButton.classList.add('bg-primary');
            } else {
                submitButton.classList.remove('bg-primary');
            }
        }
    </script>


    <script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/main.js') }}"></script>


</body>

</html>
