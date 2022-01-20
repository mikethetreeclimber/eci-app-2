<div>
    <div class="card lg:card-side card-bordered">
        <div class="card-body">
            <div class="grid grid-cols-12">
                @forelse ($uniqueStationNumbers as $uniqueStationNumber)

                    <div class="col-span-1">
                        <div><button class="btn btn-outline btn-lg btn-active">{{ $uniqueStationNumber['station_number'] }}</button>
                        </div>
                    </div>

                @empty
                    <div class="col-span-12">
                        <h2 class="card-title">No Stations Have Been Added</h2>
                        <p>You can either import a csv file or add stations manually</p>
                    </div>
                @endforelse
            </div>

            <div class="card-actions">
                <label for="file-upload" class="btn btn-accent">
                    <span>Upload a file</span>
                    <input id="file-upload" wire:model="file" name="file-upload" type="file" class="sr-only" />
                </label>
                <button wire:click="import" class="btn btn-primary">Get Started</button>
                <button class="btn btn-ghost">More info</button>
            </div>
        </div>
    </div>
</div>
