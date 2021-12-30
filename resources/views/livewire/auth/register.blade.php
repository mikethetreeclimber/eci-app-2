@section('title', 'Create a new account')

<div>
    <x-header>
        <x-slot name="title">
            Create a new account
        </x-slot>
        <x-slot name="subtitle">
            Or
            <a href="{{ route('login') }}"
                class="font-medium text-secondary hover:text-secondary-focus focus:outline-none focus:underline transition ease-in-out duration-150">
                sign in to your account
            </a>
        </x-slot>
    </x-header>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="p-10 card bg-base-200">
            <form wire:submit.prevent="register">

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input wire:model.lazy="name" id="name" type="name" required
                        class="input input-bordered @error('name') input-error @enderror">
                    @error('name')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="email" class="label">
                        <span class="label-text">Email address</span>
                    </label>
                    <input wire:model.lazy="email" id="email" type="email" required
                        class="input input-bordered @error('name') input-error @enderror" />
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

                <div class="form-control">
                    <label for="password_confirmation" class="label">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input wire:model.lazy="passwordConfirmation" type="password" required id="password_confirmation"
                        class="input input-bordered" />
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
