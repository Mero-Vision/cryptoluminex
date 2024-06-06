<div>
    <form wire:submit="save" class="mt-32 mb-16">
        <h2 class="text-center">Register Crypto Luminex</h2>
        <fieldset class="mt-40">
            <label class="label-ip">
                <p class="mb-8 text-small">Name</p>
                <input type="text" wire:model.live="name">
            </label>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="mt-16">
            <label class="label-ip">
                <p class="mb-8 text-small">Email</p>
                <input type="text" placeholder="Example@gmail" wire:model.live="email">
            </label>
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="mt-16">
            <label class="label-ip">
                <p class="mb-8 text-small">Phone Number</p>
                <input type="text" placeholder="Phone number" wire:model.live="mobile_no">
            </label>
            @error('mobile_no')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="mt-16">
            <label class="label-ip">
                <p class="mb-8 text-small">Password</p>
                <div class="box-auth-pass">
                    <input type="password" required placeholder="4 -10 characters" class="password-field"
                        wire:model.live="password">
                    <span class="show-pass">
                        <i class="icon-view"></i>
                        <i class="icon-view-hide"></i>
                    </span>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </label>
        </fieldset>

        <fieldset class="group-cb cb-signup mt-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="form-checkbox" onchange="toggleSubmitButton()">
                <label class="custom-control-label" for="form-checkbox">
                    I agree to platform
                    <a href="{{ url('terms-conditions') }}" class="highlight-link">Terms and Conditions</a>
                    {{-- and
                    <a href="{{ url('privacy-policy') }}" class="highlight-link">Privacy Policy</a> --}}
                </label>
            </div>
        </fieldset>
        <button class="mt-40 btn-secondary" id="submit-btn" disabled>Create an account</button>
    </form>
</div>
