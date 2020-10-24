<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class=" p-4">

                    <form action="/card/{{$card->id}}" method="post">
                        @csrf

                        <x-input.group for="name" label="Card name">
                            <x-input.text name="name" value="{{ old('name',$card->name) }}"></x-input.text>
                            @error('name') <div class="text-red-500">{{ $message }}</div>@enderror

                        </x-input.group>

                        <x-input.group for="note" label="Card note">
                            <x-input.textarea name="note">
                                {{ old('note',$card->note) }}
                            </x-input.textarea>
                            @error('note') <div class="text-red-500">{{ $message }}</div>@enderror

                        </x-input.group>
                        <div class="text-right">
                            <x-button.primary type="submit">Save</x-button.primary>
                        </div>

                    </form>
                </div>

                <div class="p-4 mt-4">
                    <form method="post" action="/card/{{ $card->id }}/photo" enctype="multipart/form-data">
                        @csrf
                        <div class="flex" >
                            <div class="w-full" >
                                <x-input.group class="w-full" inline="true" for="photo" label="Photos">
                                    <input type="file" id="photo" name="photo">

                                </x-input.group>
                            </div>
                            <div style="width:120px">
                                <x-button.primary type="submit">Upload file</x-button.primary>
                            </div>
                        </div>

                        <div class="text-right">

                        </div>
                    </form>
                </div>
                <div class="flex">
                    @foreach($card->photos as $photo)
                    <div class="text-center">
                        <a class="inline-block" href="{{ route('photo.delete',['card'=>$card->id,'photo'=>$photo->id]) }}">X</a>
                        <img class="ml-2" src="/storage/photos/{{auth()->user()->id}}/tn_{{ $photo->filepath }}" />

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>