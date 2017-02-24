<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>TaskApp</title>

    @include('includes.styles')
    @yield('styles')
</head>

<body>

<section id="container">
    @include('includes.header')

    @include('includes.sidebar')

    <section id="main-content">
        <section class="wrapper site-min-height">
            @yield('content')
        </section>


    </section>
</section>

</body>
@include('includes.scripts')
@yield('scripts')

</html>