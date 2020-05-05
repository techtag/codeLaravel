@include('front.header')

    {{-- Front navigation --}}
@include('front.front_nav')

@include('includes.flash_message')

@yield('content')

@include('front.footer')
@yield('scripts')