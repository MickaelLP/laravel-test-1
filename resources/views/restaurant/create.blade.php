<x-app-layout title="List of restaurant">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a restaurant
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                
                    <a class="text-slate-500 hover:text-slate-200" href="{{ route('restaurant.index') }}">Back to list</a></li>
                    <form action="{{ route('restaurant.store') }}" method="post">
                        @csrf
                        <p>
                            <input placeholder="Name" name="name" value="{{ old('name') }}"/>
                            @error('name')  
                                <br>{{$message}}
                            @enderror
                        </p>
                        <p>
                            <input placeholder="description" name="description" value="{{ old('description') }}"/>
                            @error('description')  
                                <br>{{$message}}
                            @enderror
                        </p>
                        <p><button class="hover:text-slate-200 text-green-500" type="submit">Create</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    