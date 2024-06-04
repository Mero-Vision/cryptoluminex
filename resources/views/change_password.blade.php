<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

    <title>Crypto Luminexx</title>
</head>

<body>
    <!-- preloade -->
    {{-- <div class="preload preload-container">
        <div class="preload-logo" style="background-image: url('images/logo/144.png')">
            <div class="spinner"></div>
        </div>
    </div> --}}
    <!-- /preload -->



    <div class="header-style2 fixed-top bg-menuDark">
        @include('layouts.top_nav')
    </div>


    <div class="pt-20 pb-80">
        <div class="bg-menuDark tf-container">

            <div class="container settings mt-5">
                        <h5 class="card-title text-center p-4">Change Your Password</h5><br>
                        <form action="{{ url('change-password') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="row mx-3">


                                <label class="text-light">Current Password</label>
                                <input type="text" class="clear-ip value_input ip-style2 mt-1" name="current_password"
                                    placeholder="Enter current password" />
                                @error('current_password')
                                    <p class="text-danger mb-2">{{ $message }}</p>
                                @enderror
                                <br><br>

                                <label class="mt-4 text-light">New Password</label>
                                <input type="text" class="clear-ip value_input ip-style2 mt-1" name="new_password"
                                    placeholder="Enter new password" />
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label class="mt-4 text-light">Confirm Password</label>
                                <input type="text" class="clear-ip value_input ip-style2 mt-1" name="confirm_password"
                                    placeholder="Enter confirm password" />
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror




                            </div>
                            <br>
                            <button type="submit" class="btn btn-secondary buy text-light px-3 mt-3 mb-5">Change
                                Password</button>
                        </form>

                   

            </div>

        </div>


    </div>

    @include('layouts.menu')













    @include('layouts.footer')





</body>

</html>
