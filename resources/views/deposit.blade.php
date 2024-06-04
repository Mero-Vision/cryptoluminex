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


    <div class="pt-68 pb-80">
        <div class="bg-menuDark tf-container">

            <div class="card-body p-4">
                <h5 class="card-title text-center">Submit Deposit Verification</h5>
                <form action="{{ url('recharge-verification/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                    <label>Amount</label>
                    <input type="text" class="clear-ip value_input ip-style2" name="amount" id="purchasePrice"
                        placeholder="Enter send amount value" />
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="file" class="form-control mt-3" id="frontPhotoInput"
                        placeholder="Verification Image" name="verification_image" />


                    <img id="frontPhotoPreview" src="#" alt="Front Photo Preview" class="img-fluid m-2"
                        style="max-width: 100px; max-height: 100px; display: none;">
                    @error('verification_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <br>
                    <button type="submit" class="btn btn-secondary buy text-light px-3 mt-3 ">Submit</button>
                </form>

            </div>

        </div>


    </div>

    @include('layouts.menu')













    @include('layouts.footer')





</body>

</html>
