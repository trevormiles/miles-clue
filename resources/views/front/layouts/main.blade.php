<!DOCTYPE html>
<html lang="en">
    <head>
        @include('front.layouts.shared.meta')
        @include('front.layouts.shared.styles')
        @include('front.layouts.shared.scripts')
    </head>

    <body>
        <x-header-nav />
        <main class="bg-gray-100 fill-view-height">@yield('main-content')</main>
        <x-site-footer />
    </body>
</html>