{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
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
                            <h5>Login</h5>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <x-jet-validation-errors class="mb-4" class="error" />
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label for="email">Email</label>
                                            <input name="email" id="email" type="email" placeholder="Email"
                                                :value="old('email')" required autofocus />
                                            @error('email')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label for="password">Password</label>
                                            <input name="password" id="password" type="password" placeholder="Password"
                                                required autocomplete="current-password" />
                                        </div> <!-- singel form -->
                                        @error('password')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label for="remember_me" class="flex items-center">
                                                <input type="checkbox" id="remember_me" name="remember"
                                                    style="position: absolute;height: 20px;width:20px;" />
                                                <span
                                                    class="pl-4 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            @if (Route::has('password.request'))
                                                <a class="text-sm text-primary"
                                                    href="{{ route('password.request') }}">
                                                    <u>{{ __('Forgot your password?') }}</u>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Login</button>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group text-center">
                                            @if (Route::has('register'))
                                                <p>Don't have account? <a class="text-sm text-primary"
                                                        href="{{ route('register') }}"><u>Register</u></a></p>
                                            @endif
                                        </div>
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
