<div class="sm:mx-auto sm:w-full sm:max-w-md">
    <a href="{{ route('home') }}">
        <p
            class="w-auto text-center text-5xl font-serif font-extrabold mx-auto text-primary hover:text-primary-focus">
            {{ config('app.name') }}
        </p>
    </a>

    <h2 class="mt-6 text-3xl font-extrabold text-center text-primary-content leading-9">
        {{ $title }}
    </h2>

    <p class="mt-2 text-sm text-center text-secondary-content leading-5 max-w">
        {{ $subtitle }}
    </p>
</div>
