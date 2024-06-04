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

    <div class="pt-68 pb-8">
        <div class="bg-menuDark tf-container">
            <h5 class="py-3">Verify Documents</h5>
        </div>
    </div>

    <div class="pt-10">
        <div class="bg-menuDark tf-container">


            <h5 class="card-title text-center pt-3">Submit Document Images</h5><br>
            <form action="{{ url('user-info/profile/verify-document') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-md-4 mt-2">
                        <label>Front ID Card Image</label>
                        <input type="file" class="form-control" id="frontPhotoInput" placeholder="Verification Image"
                            name="front_image" />


                        <img id="frontPhotoPreview" src="#" alt="Front Photo Preview" class="img-fluid m-2"
                            style="max-width: 100px; max-height: 100px; display: none;">
                        @error('front_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div><br>

                    <div class="col-md-4 mt-2">
                        <label>Back ID Card Image</label>
                        <input type="file" class="form-control" id="backPhotoInput" placeholder="Verification Image"
                            name="back_image" />


                        <img id="backPhotoPreview" src="#" alt="Front Photo Preview" class="img-fluid m-2"
                            style="max-width: 100px; max-height: 100px; display: none;">
                        @error('back_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div><br>

                    <div class="col-md-4 mt-2">
                        <label>ID Card In Hand Image</label>

                        <input type="file" class="form-control" id="handPhotoInput" placeholder="Verification Image"
                            name="id_in_hand" />


                        <img id="handPhotoPreview" src="#" alt="Front Photo Preview" class="img-fluid m-2"
                            style="max-width: 100px; max-height: 100px; display: none;">
                        @error('id_in_hand')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>





                <br>
                <button type="submit" class="btn btn-secondary buy text-light px-3 mt-3 ">Submit</button>
            </form>

        </div>



    </div>


    @include('layouts.menu')













    @include('layouts.footer')






</body>

</html>
