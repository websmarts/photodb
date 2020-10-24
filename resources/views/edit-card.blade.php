<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w-1/2 p-4">

                    <form action="/card/{{$card->id}}" method="post">
                        @csrf

                        <x-input.group for="name" label="Card name">
                            <x-input.text name="name" value="{{ old('name',$card->name) }}"></x-input.text>
                            @error('name') <div class="text-red-500">{{ $message }}</div>@enderror
                            <x-button type="submit">Save</x-button>
                        </x-input.group>
                    </form>

                    
                    <div class="w-full">Card photos</div>
                </div>

                <div class="w-1/2 p-4">
                    <form method="post" action="/card/{{ $card->id }}/photo" enctype="multipart/form-data">
                        @csrf
                        

                            <div>
                                <x-input.group for="photo" label="Photo">
                                    <input type="file" id="photo" name="photo">
                                </x-input.group>
                            </div>

                            <div class="text-right">
                                <x-button type="submit">Upload file</x-button>
                            </div>

                        
                    </form>
                </div>


            </div>
        </div>
    </div>


</x-app-layout>