<div style="background-image: url('Fond.jpg'); position:fixed ;top:0; left:0; min-width:100%; min-height:100%">
    <x-guest-layout>
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


            <form method="POST" action="{{ route('login') }}" class="form-horizontal" align="center" style="margin-top:100px;">
                @csrf

                <div class="input-group mb-3">
                    <x-jet-input class="form-control" style="width:25%;padding:15px 15px; margin:15px ; background-color:#fff ; border-left-width: thick; border-left-color: #03a9f4; border-top:none; border-right:none; border-bottom-none;"  name="name" :value="old('name')" placeholder="LOGIN" required autofocus />
                    <div class="mt-4">
                        <x-jet-input class="form-control" style="width:25%;padding:15px 15px; margin:15px ; background-color:#fff ; border-left-width: thick; border-left-color: #03a9f4; border-top:none; border-right:none; border-bottom-none;" type="password" name="password" placeholder="MOT DE PASSE" required autocomplete="current-password" />
                    </div>
                </div>
                <div style="display:inline-flex">
                    <div class="block mt-4" style="margin-right:-215px;">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600" style="color:#A4B6D6">{{ __('keep me signed in') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4" style="margin-left:325px;">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color:#1673FF;text-decoration:none" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                </div>
                <div style="padding-top:25px">
                    <x-jet-button class="ml-4" style="text-align:center; display:table-cell; vertical-align:middle; background-color:#3874B9 ; color:#fff ;padding:8px;border-radius:10px;border:none;width:20%">
                        {{ __('CONNEXION') }}
                    </x-jet-button>
                </div>



            </form>
        </x-jet-authentication-card>
    </x-guest-layout>
</div>
