<x-guest-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of a restaurant
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('restaurant.index') }}">Back to restaurants</a></p>
                    <dl>
                        <dt class="text-[2rem]">Name</dt>
                        <dd>{{ $restaurant->name }}</dd>
                        <dt class="text-[2rem]">Description</dt>
                        <dd>{{ $restaurant->description }}</dd>
                    </dl>

                    <div>
                        <form action="{{ route('avis.store') }}" method="post">
                            @csrf
                            <p>
                                <h2>New rating</h2>
                                <input type="number" name="rating" placeholder="1" min="0" max="5">
                                @error('rating')  
                                    <br>{{$message}}
                                @enderror

                                <textarea placeholder="Your avis" name="content" value="{{ old('content') }}"></textarea>
                                @error('content')  
                                    <br>{{$message}}
                                @enderror

                                <input type="number" hidden name="restaurant_id" value="{{ $restaurant->id }}">

                                @empty(!Auth::user())
                                    <input type="number" hidden name="user_id" hidden value="{{ Auth::user()->id }}">
                                @endempty
                                
                            </p>
                            <p><button class="hover:text-slate-200 text-green-500 border rounded p-3" type="submit">Send !</button></p>
                        </form>
                    </div>


                    @if ($restaurant->avis->isNotEmpty())
                    <div class="space-y-2">

                        @foreach ($restaurant->avis as $avis)

                            <ul class="bg-gray-300">
                                @empty($avis->user_id)
                                    <p>{{$avis->created_at}} - Anonymous</p>
                                @else
                                    @empty(!Auth::user())
                                        @if($avis->user_id == Auth::user()->id)
                                            
                                            <p>
                                                Avis : {{ $avis->restaurant->id }}
                                                <a class="hover:text-slate-200 text-green-500" href="{{ route('avis.edit', $avis) }}">Edit</a></p>
                                        @endif
                                    @endempty
                                    <p>{{$avis->updated_at}} @if($avis->created_at != $avis->updated_at) (edited : {{$avis->updated_at}} )  @endif - {{ $avis->user->name }}</p>
                                @endempty
                                <p>{{$avis->content}}</p>
                            </ul>

                        @endforeach
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
    