<div>
    <div class ="relative mt-3 md:mt-0" x-data= "{ isOpen : true }" @click.away = "isOpen = false">
        <input wire:model.debounce.500ms = "search" type ="text" class ="text-sm  bg-gray-800 rounded-full w-64 py-1 pl-8 px-4 focus:outline-none focus:shadow-outline" placeholder ="Search" @focus = "isOpen = true"  @keydown.escape.window = "isOpen = false" @keydown.shift.tab = "isOpen = false" @keydown = "isOpen = true"/>
        <div class ="absolute top-0">
            <svg class="fill-current text-gray-500 w-4 mt-2 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <div wire:loading class = "spinner  top-0 right-0 mt-3 mr-4"></div>
        @if(strlen($search) >= 2)
            <div class = "z-50 absolute bg-gray-800 rounded text-sm w-64 mt-4" x-show = "isOpen" x-show.transition.opacity = "isOpen">
                @if ($searchResults->count() > 0)
                    <ul>
                        @foreach ($searchResults as $result )
                            <li class = "border-b  border-gray-700">
                                <a href = "{{ route('movies.show', $result['id'])}}" class ="flex items-center block hover:bg-gray-700 px-3 py-3" 
                                    @if($loop->last) @keydown.tab = "isOpen = false" @endif
                                    >
                                    @if($result['poster_path'])
                                        <img src = "https://tmdb.org/t/p/w92/{{$result['poster_path']}}" alt = "poster" class = "w-8"> 
                                    @else
                                        <img src = "https://via.placeholder.com/50x75" alt = "poster" class = "w-8" >
                                    @endif
                                    <span class = "ml-4"> {{$result['title']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class = "px-3 py-3">No Results for "{{ $search }}"</div>
                @endif
            </div>
        @endif
    </div>
</div>
