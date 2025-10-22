<div class="mb-5">
    <div class="border border-gray-300 rounded-md">
        <x-card shadow="shadow-none" title="Personal Information">
            <form>
                @csrf
                <div class="space-y-3">
                    <x-native-select label="Type" wire:model="type_id">
                        <option value=""></option>
                        <option value="1">Freshmen</option>
                        <option value="2">Transferee</option>
                    </x-native-select>
                    <x-input wire:model.defer="first_name" autocomplete="on" label="First Name" />
                    <x-input wire:model.defer="middle_name" autocomplete="on" label="Middle Name"
                        hint="Leave it blank if not applicable" />
                    <x-input wire:model.defer="last_name" autocomplete="on" label="Last Name" />
                    <x-input wire:model.defer="extension" autocomplete="on" label="Extension"
                        hint="Leave it blank if not applicable" />
                    <x-native-select wire:model.defer="sex" label="Sex">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </x-native-select>
                    <x-input wire:model.defer="present_address" autocomplete="on" label="Present Address" />
                    <x-input wire:model.defer="permanent_address" autocomplete="on" label="Permanent Address" />
                    <x-input wire:model.defer="phone_number" autocomplete="on" label="Phone Number" />
                    <x-input wire:model="date_of_birth" max="{{ \Carbon\Carbon::now()->subYears(16)->format('Y-m-d') }}"
                        type="date" label="Date Of Birth" />
                    <x-input wire:model.defer="place_of_birth" autocomplete="on" label="Place Of Birth" />
                    <x-input wire:model.defer="age" disabled autocomplete="on" label="Age" />
                    <x-input wire:model.defer="tribe" autocomplete="on" label="Tribe" />
                    <x-input wire:model.defer="religion" autocomplete="on" label="Religion" />
                    <x-input wire:model.defer="nationality" autocomplete="on" label="Nationality" />
                    <!-- <x-input wire:model.defer="citizenship"
                        autocomplete="on"
                        label="Citizenship" /> -->
                    <div id="imagepreview">
                        @if ($personal_information?->photo)
                            <img src="{{ Storage::url($personal_information->photo) }}" alt="" class="h-40">
                        @endif
                    </div>
                   <div class="mb-3">
    <label class="block text-sm font-medium text-gray-700">
        Actual Photo
        <span class="text-xs text-gray-500">(Use white background with name tag)</span>
    </label>

    <input type="file" wire:model="photo" accept="image/*"
        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-500" />

    <p class="mt-1 text-xs text-gray-500">
        If you encounter an error while uploading your photo, try reducing the file size to less than 2 MB.
    </p>
</div>

<div wire:loading.flex wire:target="photo" class="mt-2 items-center text-sm text-gray-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <span class="ml-2">Please wait while preparing your photo...</span>
</div>

@if ($photo && $photo != $personal_information?->photo)
    <div class="mt-2 text-green-600">File is ready.</div>
@endif

                </div>
            </form>
            <x-slot name="footer">
                <div class="flex justify-end">
                    @if (auth()->user()->step == '2')
                        @if ($this->personal_information)
                            <x-button blue wire:click="update">
                                Update
                            </x-button>
                        @else
                            <x-button positive wire:click="create">
                                Save
                            </x-button>
                        @endif
                    @endif
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
