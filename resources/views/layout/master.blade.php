@include('layout._session')

@include('layout.header')

@include('layout.nav')

@yield('content')

@include('layout.modal.login')
@include('layout.footer')
