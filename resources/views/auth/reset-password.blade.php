{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<x-base-layout>
    <!--====== CONTACT PART START ======-->

    <section id="contact-page" class="pt-50 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Reset Password</h5>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <x-jet-validation-errors class="mb-4 error" />
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" name="email" placeholder="Email" :value="old('email', $request->email)" required autofocus />
                                            @error('email')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label for="password">New Password</label>
                                            <input id="password" type="password" placeholder="New Password" name="password" required autocomplete="new-password" />
                                            @error('password')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input  id="password_confirmation" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            @error('password_confirmation')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Reset Password</button>
                                        </div> <!-- singel form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
</x-base-layout>
