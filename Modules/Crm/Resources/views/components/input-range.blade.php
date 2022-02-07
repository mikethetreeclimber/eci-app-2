@props(['model' => null])
<div class="flex flex-wrap w-1/6">
    <div class="flex w-8/12">
        <input wire:model="{{ $model }}" type="text"
            class="bg-base-200 text-sm text-white text-center focus:outline-none border border-primary focus:border-primary-focus rounded-l-md w-full">
    </div>
    <div class="flex flex-col w-4/12">
        <button wire:click="inc"
            class="text-base text-center text-md font-semibold rounded-tr-md px-1 bg-primary focus:bg-primary-focus focus:outline-none border border-primary focus:border-primary-focus">
            +
        </button>
        <button wire:click="dec"
            class="text-base text-center text-md font-semibold rounded-br-md px-1 bg-primary focus:bg-primary-focus focus:outline-none border border-primary focus:border-primary-focus">
            -
        </button>
    </div>
</div>
