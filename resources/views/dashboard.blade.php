<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hrvatska burza utovara - Administracijska stranica') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="display: flex; flex-direction: column; align-items: center;">
                {{ __("You're logged in as Admin!") }}
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
    <div class="py-3 justify-content-start">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
                    <p> Broj trenutnih korisnika: {{ \App\Models\User::all()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 justify-content-center">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
                    {{ __("Broj broj trenutnih objava ponuda utovara: 422") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 justify-content-end">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
                    {{ __("Broj broj trenutnih objava pošiljki: 240") }}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</x-app-layout>
