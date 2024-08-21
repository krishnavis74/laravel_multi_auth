<x-guest-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <div class=""> <a href="{{ route('login') }}">USER LOGIN</a> </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class=""> <a href="{{ route('register') }}">USER REGISTER</a> </div>
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <div class=""><a href="{{ route('admin_login') }}">ADMIN LOGIN</a></div>
                <div class=""> <a href="{{ route('admin_register') }}">ADMIN REGISTER</a> </div>
                <div class=""><a href="{{ route('student_login') }}">STUDENT LOGIN</a></div>
                <div class=""> <a href="{{ route('student_register') }}">STUDENT REGISTER</a> </div>
                <div class=""><a href="{{ route('teacher_login') }}">TEACHER LOGIN</a></div>
                <div class=""> <a href="{{ route('teacher_register') }}">TEACHER REGISTER</a> </div>

            </div>
        </div>

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm sm:text-left">
                {{-- <div class=""><a href="{{route('teacher_login')}}">TEACHER LOGIN</a></div> --}}
            </div>

            {{-- <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div> --}}
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form method="POST" action="{{ route('student_register') }}">
        @csrf
        <div class="text-center">Student Register</div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Student Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="student_name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="student_email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
