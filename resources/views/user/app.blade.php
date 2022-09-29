<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('user.layouts.head')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
@include('user.responsive.responsive')
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    @include('user.header.header-top')
    <div class="container">
        @include('user.header.header')
    </div>
</header>


<!-- Header Section End -->

<!-- Section Start -->
@yield('section_main')
<!-- Section End -->

<!-- Footer Section Begin -->
<footer class="footer spad">
    @include('user.footer.footer');
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
@include('user.layouts.scripts')

</body>

</html>
