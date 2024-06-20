<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit an avis
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
                    <p>Restaurant : {{ $avis }}</p>
                    {{-- <a class="text-slate-500 hover:text-slate-200" href="{{ route('restaurant.show', $avis->restaurant) }}">Back to restaurant</a> --}}

                    <form action="{{ route('avis.update', $avis) }}" method="post">
                        @csrf
                        @method('PUT')
                        <p>
                            Published : {{ $avis->updated_at }}
                        </p>
                        <h2>Edit rating</h2>
                        <input type="number" name="rating" placeholder="1" min="0" max="5" value="{{ $avis->rating }}">
                        @error('rating')  
                            <br>{{$message}}
                        @enderror

                        <textarea placeholder="Your avis" name="content" value="{{ old('content') }}">{{ $avis->content }}</textarea>
                            @error('content')  
                                <br>{{$message}}
                            @enderror

                            <input type="number" hidden name="restaurant_id" value="{{ $restaurant->id }}">

                            @empty(!Auth::user())
                                <input type="number" hidden name="user_id" hidden value="{{ Auth::user()->id }}">
                            @endempty

                        <p><button class="hover:text-slate-200 text-green-500" type="submit" placeholder="Lastname">Save</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    