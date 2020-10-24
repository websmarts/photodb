<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end">
                    <a class="text-right inline-block p-4 " href="/card/0/edit">Add a Card </a>
                </div>

                <x-table>
                    <x-slot name="head">
                        <x-table.heading class=" w-1/3 sm:w-1/4 text-left">Card name</x-table.heading>
                        <x-table.heading class="sm:w-full text-left">Notes</x-table.heading>
                        <x-table.heading />

                    </x-slot>

                    <x-slot name="body">
                        @forelse($cards as $card)
                        <x-table.row>
                            <x-table.cell><a href="{{ route('card.show',['card'=>$card->id])}}">{{ $card->name }}</a></x-table.cell>
                            <x-table.cell>{{ $card->note }}</x-table.cell>
                            <x-table.cell> <a href="/card/{{ $card->id }}/edit">Edit</a></x-table.cell>
                        </x-table.row>
                        

                        @empty

                        <x-table.row>
                            <x-table.cell colspan="2">No Cards to display </x-table.cell>
                        </x-table.row>

                        @endforelse


                    </x-slot>




                </x-table>

            </div>
        </div>
    </div>
</x-app-layout>