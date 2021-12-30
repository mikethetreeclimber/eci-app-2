@section('title', 'Sign in to your account')

<div>
    <x-header>
        <x-slot name="title">
            Sign in to your account
        </x-slot>
        <x-slot name="subtitle">
            Or
            <a href="{{ route('register') }}"
                class="font-medium text-secondary hover:text-secondary-focus focus:outline-none focus:underline transition ease-in-out duration-150">
                create a new account
            </a>
        </x-slot>
    </x-header>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="p-10 card bg-base-200">
            <form wire:submit.prevent="authenticate">

                <div class="form-control">
                    <label for="email" class="label">
                        <span class="label-text">Email address</span>
                    </label>
                    <input wire:model.lazy="email" id="email" type="email" required autofocus
                        class="input input-bordered @error('email') input-error @enderror" />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input wire:model.lazy="password" id="password" type="password" required
                        class="input input-bordered @error('password') input-error @enderror" />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-3">
                    <div class="form-control">
                        <label class="cursor-pointer label">
                            <input wire:model.lazy="remember" id="remember" type="checkbox"
                                class="checkbox checkbox-primary">
                            <span class="ml-4 label-text">Remember me</span>
                        </label>
                    </div>
                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}"
                            class="font-medium text-accent hover:text-accent-focus transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn btn-primary">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
