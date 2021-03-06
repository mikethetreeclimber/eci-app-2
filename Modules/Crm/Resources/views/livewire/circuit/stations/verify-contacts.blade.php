<div class="flex flex-col w-full">
    <div class="divider"></div>
    <label for="threshold">Adjust the Threshold for the Search</label>
    <x-crm::input-range model="threshold" />
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                <h3 class="pt-4 text-center text-2xl leading-6 font-medium text-primary-content">
                    All Units Associtated To <div class="text-primary">{{ $station->name }}
                    </div>
                </h3>
                <ul role="list" class="pb-4 grid sm:grid-cols-2 gap-4">
                    @foreach ($allStationsAssociatedToLastName as $stationAssociatedToLastName)
                        <li class="btn btn-lg col-span-1 flex">
                            <a
                                href="{{ route('crm.circuit.station.show', ['circuit' => $circuit, 'station' => $stationAssociatedToLastName->id]) }}">
                                <div class="">
                                    <p class="text-xl font-medium text-secondary">
                                        {{ $stationAssociatedToLastName->station_number }}</p>
                                    <p class=" text-base text-accent">
                                        {{ strtolower($stationAssociatedToLastName->unit) }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                @if ($contactInformationAddressAndName !== [] && isset($contactFoundWithAddressAndName))
                <div wire:loading="contactInformationAddressAndName"> <span class="text-accent font-semibold text-lg"> LOADING...</span></div>
                    <h3 class="pt-4 text-2xl leading-6 font-medium text-primary-content">
                        Possible Contact Information Found With <div class="text-primary text-center">
                            {{ $contactFoundWithAddressAndName }}</div>
                    </h3>
                    <ul role="list" class="divide-y divide-gray-200">

                        @foreach ($contactInformationAddressAndName as $contact)
                            <li class="py-4 flex">
                                <div class="ml-3">
                                    @if (!is_array($contact))
                                        <p class="text-xl font-medium text-secondary">{{ $contact->customer_name }}
                                        </p>
                                        <p class=" text-lg text-accent">{{ $contact->address }}</p>
                                        <p contenteditable="true" class=" text-lg text-accent">{{ $contact->primary_phone }}</p>
                                        <p contenteditable="true" class=" text-lg text-accent">{{ $contact->alt_phone }}</p>
                                        <button wire:click="verify({{ $contact->id }})" type="button"
                                            class="btn btn-primary">Verify</button>
                                    @else
                                        <p class="text-xl font-medium text-secondary">{{ $contact['customer_name'] }}
                                        </p>
                                        <p class=" text-lg text-accent">{{ $contact['address'] }}</p>
                                        <p wire:on.change='foo()' contenteditable="true" class=" text-lg text-accent">{{ $contact['primary_phone'] }}</p>
                                        <p wire:model='contact.alt_phone' contenteditable="true" class=" text-lg text-accent">{{ $contact['alt_phone'] }}</p>
                                        <button wire:click="verify({{ $contact['id'] }})" type="button"
                                            class="btn btn-primary">Verify</button>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                    @if ($contactInformationName !== [] && isset($contactFoundWithName))
                <div wire:loading="contactInformationName"> <span class="text-accent font-semibold text-lg"> LOADING...</span></div>

                        <h3 class="pt-4 text-2xl leading-6 font-medium text-primary-content">
                            Possible Contact Information Found With <div class="text-primary text-center">
                                {{ $contactFoundWithName }}</div>
                        </h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($contactInformationName as $contact)
                                <li class="py-4 flex">
                                    <div class="ml-3">
                                        @if (!is_array($contact))
                                            <p class="text-xl font-medium text-secondary">
                                                {{ $contact->customer_name }}
                                            </p>
                                            <p class=" text-lg text-accent">{{ $contact->address }}</p>
                                            <p class=" text-lg text-accent">{{ $contact->primary_phone }}</p>
                                            <p class=" text-lg text-accent">{{ $contact->alt_phone }}</p>
                                            <button wire:click="verify({{ $contact->id }})" type="button"
                                                class="btn btn-primary">Verify</button>
                                        @else
                                            <p class="text-xl font-medium text-secondary">
                                                {{ $contact['customer_name'] }}
                                            </p>
                                            <p class=" text-lg text-accent">{{ $contact['address'] }}</p>
                                            <p class=" text-lg text-accent">{{ $contact['primary_phone'] }}</p>
                                            <p class=" text-lg text-accent">{{ $contact['alt_phone'] }}</p>
                                            <button wire:click="verify({{ $contact['id'] }})" type="button"
                                                class="btn btn-primary">Verify</button>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                        @if ($contactInformationAddress !== [] && isset($contactFoundWithAddressAddress))
                <div wire:loading="contactInformationAddress"> <span class="text-accent font-semibold text-lg"> LOADING...</span></div>

                            <h3 class="pt-4 text-2xl leading-6 font-medium text-primary-content">
                                Possible Contact Information Found With <div class="text-primary text-center">
                                    {{ $contactFoundWithAddress }}</div>
                            </h3>
                            <ul role="list" class="divide-y divide-gray-200">
                                @foreach ($contactInformationAddress as $contact)
                                    <li class="py-4 flex">
                                        <div class="ml-3">
                                            @if (!is_array($contact))
                                                <p class="text-xl font-medium text-secondary">
                                                    {{ $contact->customer_name }}
                                                </p>
                                                <p class=" text-lg text-accent">{{ $contact->address }}</p>
                                                <p class=" text-lg text-accent">{{ $contact->primary_phone }}</p>
                                                <p class=" text-lg text-accent">{{ $contact->alt_phone }}</p>
                                                <button wire:click="verify({{ $contact->id }})" type="button"
                                                    class="btn btn-primary">Verify</button>
                                            @else
                                                <p class="text-xl font-medium text-secondary">
                                                    {{ $contact['customer_name'] }}
                                                </p>
                                                <p class=" text-lg text-accent">{{ $contact['address'] }}</p>
                                                <p class=" text-lg text-accent">{{ $contact['primary_phone'] }}</p>
                                                <p class=" text-lg text-accent">{{ $contact['alt_phone'] }}</p>
                                                <button wire:click="verify({{ $contact['id'] }})" type="button"
                                                    class="btn btn-primary">Verify</button>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h3 class="pt-4 text-xl leading-6 font-medium text-primary-content">
                                Sorry No Results Found
                            </h3>
                        @endif
            </div>
        </div>
    </div>
</div>
