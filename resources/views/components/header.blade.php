<!-- Main jumbotron for a primary marketing message or call to action -->

<p>Mijn naam is Tristan</p>
<div class="jumbotron">
    <div class="container">
        <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">
            <h1>{{ __('misc.homepage_title') }}</h1>
        </a>
        {{ $introduction_text ?? '' }}
    </div>
</div>
