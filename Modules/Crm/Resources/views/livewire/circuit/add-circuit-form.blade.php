
<form wire:submit.prevent="addCircuit">
    <div class="form-control">
        <input wire:model="circuitName" placeholder="Circuit Name" class="input input-bordered" type="text">
        <input wire:model="city" placeholder="City" class="input input-bordered" type="text">
        <label class="label">
            <button type="submit" @click="open = false" class="btn btn-primary">Add</button>
            <a href="#" class="label-text-alt">
                Need help?
            </a>
        </label>
    </div>
</form>
