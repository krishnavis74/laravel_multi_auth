<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
    <div class="container shadow">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{ __('Student Dashboard') }}
                {{ Auth::guard('student')->user()->student_name }} - ({{ Auth::guard('student')->user()->student_email }})
                Student You're logged in!
                <form method="POST" action="{{ route('student_logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('student_logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
