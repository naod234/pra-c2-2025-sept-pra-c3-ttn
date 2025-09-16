<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body class="d-flex flex-column min-vh-100">

<x-navbar/>

<main class="flex-grow-1">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10 col-lg-8">
            <x-header/>

            <ul class="breadcrumb">
                <li><a href="/" title="{{ __('misc.home_alt') }}"
                       alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                {{ $breadcrumb ?? '' }}
            </ul>

            @if ( isset($_GET['q']) )
                <x-search_results/>
            @else
                {{ $slot }}
            @endif

            <ul class="breadcrumb">
                <li>
					<a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
				</li>
                {{ $breadcrumb ?? '' }}
            </ul>

        </div>

    </div>

</div>
</main>

<x-footer/>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
