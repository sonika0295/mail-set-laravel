<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading" data-textdirection="ltr">

<!-- BEGIN: Head-->
@include('partial.head', ['title' => isset($title) ? $title : config('app.name')])
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
    <!-- BEGIN: Header-->
    @include('partial.header')

    <!-- BEGIN: App content-->
    @yield('content')

    <!-- END: App content-->

    <!-- BEGIN: footer-->
    @include('partial.footer')
    <!-- END: Footer-->

    @yield('js')

    @stack('scripts')


</body>

</html>
