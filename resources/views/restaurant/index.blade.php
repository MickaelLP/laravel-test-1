<x-guest-layout title="List of restaurants">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Restaurants
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">List of restaurants</h1>
                    <p>
                        @can('create', App\Model\Restaurant::class)
                            <a class="hover:text-slate-200 text-green-500" href="{{ route('restaurant.create') }}">Create restaurant</a>
                        @endcan
                    </p>
                    @empty($restaurants)
                        <p>No restaurants found...</p>
                    @else
                        <ul>
                            @foreach ($restaurants as $restaurant)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('restaurant.show', $restaurant) }}">{{ $restaurant->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
    