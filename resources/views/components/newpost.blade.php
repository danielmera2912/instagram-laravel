<x-app-layout>
<div class="py-12">
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir imagen') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data" class="flex justify-items-center flex-col">
        @csrf
        
        <div>
            <x-input-label for="image" :value="__('Añade tu imagen')" />
            <x-text-input id="image" name="image" type="file" autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        </br>
        <div >
            <label for="description">Descripción :</label>
            </br>
            <textarea name="description" placeholder="Descripción" required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <x-primary-button class="w-96">
            {{ __('Publicar') }}
        </x-primary-button>

    </form>
                </div>
            </div>
        </div>
    </div>
<div>
    
</x-app-layout>


