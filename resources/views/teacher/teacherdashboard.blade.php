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
    {{-- flex justify-center mt-16 px-0 sm:items-center sm:justify-between --}}
    <div class="container shadow text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 "style="margin-top:25%;">
                <div style="font-size:30px;"><b>
                        {{ 'Teacher Dashboard' }}
                    </b>
                </div>
                <div style="font-size:30px;"><b>
                        {{ 'Teacher Name' }} {{ Auth::guard('teacher')->user()->teacher_name }} -
                        ({{ Auth::guard('teacher')->user()->teacher_email }})
                        Teacher You're logged in!
                    </b>
                </div>
                <form method="POST" action="{{ route('teacher_logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('teacher_logout')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();">
                        <div style="font-size:30px;" class="btn btn-success"><b> {{ 'Log Out' }}</b> </div>
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
