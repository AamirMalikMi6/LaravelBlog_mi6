<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>
    @include('partials._nav')

    <main class="container">
        @include('partials._messages')

        <!-- {{ Auth::check() ? "Logged in as ". Auth::user()->name : "Not logged in" }} -->

        @yield('content')

        @include('partials._footer')

    </main>


    @include('partials._scripts')
</body>

</html>