<div>
    
    <div class="card lg:card-side card-bordered">
        <div class="card-body">
            <div class="grid grid-cols-6 gap-4">
                @forelse ($uniqueStations as $uniqueStation)

                    <div class="col-span-1 ">
                        <a href="{{ route('crm.circuit.station.show', ['circuit' => $circuit->circuit_name, 'station' => $uniqueStation['id']]) }}"
                            class="w-full h-full btn btn-outline btn-active">{{ $uniqueStation['first_name'] }} {{ $uniqueStation['last_name'] }}</a>
                    </div>

                @empty
                    <div class="col-span-12">
                        <h2 class="card-title">No Stations Have Been Added</h2>
                        <p>You can either import a csv file or add stations manually</p>
                    </div>
                @endforelse
            </div>

            <div class="card-actions">
                <label for="mailing-list" class="btn btn-primary">
                    <span class="text-base-300">Upload Mailing List</span>
                    <input id="mailing-list" wire:model="mailing" name="mailing-list" type="file" class="sr-only" />
                </label>
                <label for="contact-list" class="btn btn-primary">
                    <span class="text-base-300">Upload Contact List</span>
                    <input id="contact-list" wire:model="contacts" name="contact-list" type="file" class="sr-only" />
                </label>
                
                <button class="btn btn-ghost">More info</button>
            </div>
        </div>
    </div>
</div>
