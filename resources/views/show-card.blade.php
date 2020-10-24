<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class=" p-4">
                    <div class="text-2xl text-bold">{{ $card->name}}</div>
                    <div class="font-style:italic">{{ $card->note }} </div>

                    <div class="sm:flex">
                    @foreach($card->photos as $photo)
                    
                    
                        <img class="ml-2 mt-4" src="/storage/photos/{{ $photo->user_id.'/'.$photo->filepath }}" />

                    
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>