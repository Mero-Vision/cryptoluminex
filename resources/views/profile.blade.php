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




    <div class="header fixed-top bg-surface">
        <a href="javascript:void(0);" class="left back-btn"><i class="icon-left-btn"></i></a>
        <a href="{{ url('/') }}" class="right"><i class="icon-home2 fs-20"></i></a>

    </div>

    <div class="pt-45 pb-16">
        <div class="tf-container">
            <h4>Profile</h4>
            <a href="" class="mt-16 d-flex justify-content-between align-items-center">
                <div class="box-left">
                    <h5 class="mb-8">Verification</h5>
                    <span class="avatar-label tag-xs style-2 round-2 bg-success text-light" style="color: white;">
                        Verified <i class='bx bxs-badge-check'></i>
                    </span>

                    {{-- @if ($verifyEmail->verification_status == 'unverified')
                            <a href="{{url('user-info/profile/verify-document')}}" class="avatar-label tag-xs style-2 round-2 red text-light" style="color: white;">
                                Veriy Now
                                <i class="bi bi-patch-question-fill"></i>
                            </a>
                        @else
                            <span class="avatar-label tag-xs style-2 round-2 bg-success text-light" style="color: white;">
                                Verified <i class='bx bxs-badge-check'></i>
                            </span>
                        @endif --}}

                </div>
                {{-- <span class="icon-arr-right text-secondary fs-12"></span> --}}
            </a>
            <a href="#" class="mt-16 pb-12 line-bt d-flex justify-content-between align-items-center">
                <p class="text-small">Transaction fee tier</p>
                <span class="text-secondary d-flex gap-8 align-items-center">Level 1 </span>
            </a>
            <ul class="mt-16 pb-12 line-bt">

                <li>
                    <a href="" class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Authentication Code</p>
                        <span class="text-secondary d-flex gap-8 align-items-center">{{ $uuid }}</span>

                    </a>
                </li>
                <li>
                    <a href="" class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Name</p>
                        <span class="text-secondary d-flex gap-8 align-items-center">{{ auth()->user()->name }} </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Email</p>
                        <span class="text-secondary d-flex gap-12 align-items-center">{{ auth()->user()->email }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Mobile/Phone No.</p>
                        <span class="text-secondary d-flex gap-12 align-items-center">{{ auth()->user()->mobile_no }}
                        </span>
                    </a>
                </li>

            </ul>
            <ul class="mt-16 pb-16 line-bt">
                <li>
                    <h5>Setting</h5>
                </li>
                <li>
                    <a href="{{ url('change-password') }}"
                        class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Change Password</p>
                        <span class="icon-arr-right text-secondary fs-12"></span>
                    </a>
                </li>

                {{-- <li>
                    <a href="#" class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Privacy</p>
                        <span class="icon-arr-right text-secondary fs-12"></span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ url('terms-conditions') }}"
                        class="mt-16 d-flex justify-content-between align-items-center">
                        <p class="text-small">Terms and Conditions</p>
                        <span class="icon-arr-right text-secondary fs-12"></span>
                    </a>
                </li>


            </ul>
            <span class="text-button mt-32 d-inline-block text-red fw-6" data-bs-toggle="modal"
                data-bs-target="#logout">
                Log out
            </span>
        </div>
    </div>

    @include('layouts.menu')




    <!-- modal logout -->
    <div class="modal fade modalCenter" id="logout">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-sm">
                <div class="p-16 line-bt">
                    <h4 class="text-center">Log Out</h4>
                    <p class="mt-12 text-center text-large">Are you sure you want to sign out?</p>
                </div>
                <div class="grid-2">
                    <a href="#" class="line-r text-center text-button fw-6 p-10"
                        data-bs-dismiss="modal">Cancel</a>
                    <a href="{{ url('logout') }}" class="text-center text-button fw-6 p-10 text-red">Log Out</a>
                </div>

            </div>
        </div>
    </div>








    @include('layouts.footer')





</body>

</html>
