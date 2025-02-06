<div class="py-12">
    <div class="max-w-[877px] mx-auto sm:px-6 lg:px-8">
        <div class="ml-3 lg:px-8 sm:px-6 overflow-hidden shadow-sm sm:rounded-lg">
            <div x-data="{ toggleSubmit: false }" class="p-6 {{ $bgColor }}">
    <!-- First Name Field -->
    <div class="mb-4">
        <label class="block text-gray-700">First Name</label>
        <input type="text" wire:model="firstName" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="Enter first name">
        @error('firstName') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <!-- Last Name Field -->
    <div class="mb-4">
        <label class="block text-gray-700">Last Name</label>
        <input type="text" wire:model="lastName" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="Enter last name">
        @error('lastName') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <!-- Department Input with Datalist for Searchable Selection -->
    <div class="mb-4">
        <label class="block text-gray-700">Department</label>
        <input type="text" wire:model="department" list="departmentList" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="Select department">
        <datalist id="departmentList">
            @foreach($departments as $dept)
                <option value="{{ $dept }}">{{ $dept }}</option>
            @endforeach
        </datalist>
        @error('department') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <!-- Dynamic Extra Fields Section -->
    <div class="mb-4">
        <h3 class="font-bold mb-2">Extra Fields</h3>
        @foreach($extraFields as $index => $field)
            <div class="flex items-center mb-2">
                <input type="text" wire:model="extraFields.{{ $index }}.name" class="mt-1 block w-full border-gray-300 rounded-md" placeholder="Extra field">
                <button type="button" wire:click="removeField({{ $index }})" class="ml-2 text-red-600">Remove</button>
            </div>
        @endforeach
        <button type="button" wire:click="addField" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">
            Add New Field
        </button>
    </div>

    <!-- Background Color Selector using Radio Buttons -->
    <div class="mb-4">
        <h3 class="font-bold mb-2">Background Color</h3>
        <div class="flex space-x-4">
            <label>
                <input type="radio" name="bgColor" value="bg-white" wire:model="bgColor"> White
            </label>
            <label>
                <input type="radio" name="bgColor" value="bg-red-100" wire:model="bgColor"> Red
            </label>
            <label>
                <input type="radio" name="bgColor" value="bg-green-100" wire:model="bgColor"> Green
            </label>
            <label>
                <input type="radio" name="bgColor" value="bg-blue-100" wire:model="bgColor"> Blue
            </label>
            <label>
                <input type="radio" name="bgColor" value="bg-yellow-100" wire:model="bgColor"> Yellow
            </label>
        </div>
    </div>

    <!-- Toggle Switch for Enabling/Disabling the Submit Button -->
    <div class="mb-4">
        <h3 class="font-bold mb-2">Enable Submit Button</h3>
        <label class="flex items-center cursor-pointer">
            <div class="relative">
                <input type="checkbox" x-model="toggleSubmit" class="sr-only">
                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                <!-- The dot moves when toggleSubmit is true -->
                <div x-show="toggleSubmit" class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
            </div>
            <div class="ml-3 text-gray-700 font-medium" x-text="toggleSubmit ? 'Enabled' : 'Disabled'"></div>
        </label>
    </div>

    <!-- Submit Button (disabled when toggle is off) -->
    <div>
        <button type="button" wire:click="save" x-bind:disabled="!toggleSubmit" class="bg-blue-500 text-white px-4 py-2 rounded disabled:opacity-50">
            Submit
        </button>
    </div>

    <!-- Display Flash Message if Employee Saved -->
    @if (session()->has('message'))
        <div class="mt-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div>
        </div>
    </div>
</div>
