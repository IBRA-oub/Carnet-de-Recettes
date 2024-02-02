<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>Home Page</title>
</head>
<body>
    <nav class="relative select-none bg-gray-200 lg:flex lg:items-stretch w-full">
        <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
            <div class="flex h-8 w-full mx-2 md:mx-10 my-3 md:max-w-screen-xl md:mx-auto">
                <form action="{{ route('recette.search') }}" method="GET" class="flex items-center bg-white rounded w-full md:w-auto">
                    <input class="flex-grow border-none bg-transparent px-2 md:px-4 py-2 text-gray-400 outline-none focus:outline-none" type="search" name="search" placeholder="Search..." />
                    <button type="submit" class="m-2 rounded px-4 py-2 text-amber-400">
                        <svg class="fill-current h-4 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.920,2.162,0.920  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.080,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                <button class="group relative mx-4 my-3 h-8 w-40 overflow-hidden rounded-lg bg-white text-sm shadow">
                    <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white"><a href="{{ route('recette.index') }}" >All content</a></span>
                  </button>
              </div>
            </div>
        </div>
    </div>
    <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
      <button class="group relative mx-4 my-3 h-8 w-40 overflow-hidden rounded-lg bg-white text-sm shadow">
          <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative text-black group-hover:text-white"><a href="{{route('recette.create')}}">Ajout Recette</a></span>
        </button>
    </div>
  </div>
    </nav>
   

      

        {{-- @if( count($recette) > 0) --}}
        <div class="min-h-screen  flex justify-center items-center py-20">
            <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
              @foreach($recette as $rec)
              <div class="max-w-sm bg-gray-100 px-6 pt-6 pb-2 rounded-xl shadow-lg   transform hover:scale-105 transition duration-500">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">{{$rec['title']}}</h3>
                    <div class="relative">
                    <img class="w-full rounded-xl" src="{{ asset('storage/image/' . $rec['picture']) }}" alt="Colors" />
                 
                    </div>
                    <p class="mt-4 text-gray-800 whitespace-pre-line   cursor-pointer">{{$rec['description']}}</p>
                    <div class="my-4">
                   
                    
                   
                    <button class="mt-4 text-xl w-full text-white bg-amber-400  py-2 rounded-xl shadow-lg"><a href="{{ route('recette.show', ['recette' => $rec['id']]) }}">show more</a></button>
                    </div>
              </div>
              @endforeach
             
            </div>
          </div>
      {{-- @else
      <p>there is no data to show</p>
      @endif --}}
    
</body>
</html>