@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-base-100 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <a href="{{ route('home') }}">
                        <p
                            class="w-auto text-center text-5xl font-serif font-extrabold mx-auto text-primary hover:text-primary-focus">
                            {{ config('app.name') }}
                        </p>
                    </a>
            @if (Auth::user())

                    <ul class="list-reset">
                        <li class="inline px-4">
                            <a href="#" class="link-primary text-bold text-xl">
                                Plant Id
                            </a>
                        </li>
                        <li class="inline px-4">
                            <a href="/crm" class="link-primary text-bold text-xl">
                                CRM
                            </a>
                        </li>
                        <li class="inline px-4">
                            <a href="#" class="link-primary text-bold text-xl">
                                Map
                            </a>
                        </li>
                        <li class="inline px-4">
                            <a href="#" class="link-primary text-bold text-xl">
                                Address Book
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
