<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.__header')
<body>
@include('layouts.partials.__loader')
@include('layouts.partials.__top-nav')
@include('layouts.partials.__lower-nav')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

@include('layouts.partials.__sidebar')

<!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                @yield('content')
            </div>
        </div>

        @include('layouts.partials.__footer')
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

@include('layouts.partials.__scripts')
@livewireScripts

</body>
</html>
