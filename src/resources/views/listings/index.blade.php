<x-layout>
    @include('partials._hero')
    @include('partials._search')
    @unless(count($listings) === 0)
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach($listings as $listing)
                <x-card class="bg-gray-50 border border-gray-200 rounded p-6">
                    <x-listing-card :listing="$listing"/>
                </x-card>
            @endforeach
        </div>
    @else
        <h2 style="font-style: italic; color: #a0aec0; font-size: 3em !important;">
            No listings...
        </h2>
    @endunless
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
</x-layout>
