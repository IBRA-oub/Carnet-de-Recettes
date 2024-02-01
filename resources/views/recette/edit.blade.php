<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>edit Page</title>
</head>
<body>
    <section class="max-w-4xl p-6 mx-auto  bg-gray-200 rounded-md shadow-xl mt-[9%]">

        <h1 class="text-3xl font-bold text-black capitalize mb-4">update Recette</h1>
    
        <form action="{{route('recette.update', ['recette' => $editRecette->id])}}" method="POST" 
            class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            {{-- cross site request forgery / csr  --}}
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="text-black">Title</label>
                <input id="title" type="text" name="title" value="{{$editRecette['title']}}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring">
                    @error('title')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
            </div>
    
            <div>
                <label for="description" class="text-black">Description</label>
                <textarea id="description" name="description" 
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring">{{$editRecette['description']}}</textarea>
                        @error('description')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
            </div>
    
            <div>
                <label for="ingredients" class="text-black">Ingredients</label>
                <textarea id="ingredients" name="ingredients"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring">{{$editRecette['ingredients']}}</textarea>
                    @error('ingredients')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
            </div>

            <div>
                <label for="prepare" class="text-black">How to prepare</label>
                <textarea id="prepare" name="prepare" 
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring">{{$editRecette['prepare']}}</textarea>
                    @error('prepare')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
            </div>
    
            <div>
                <label class="block text-sm font-medium text-black">Picture</label>
                <div class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-black border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                            aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer bg-black rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload a file</span>
                                <input id="file-upload" name="picture" value="{{$editRecette['picture']}}" type="file" class="sr-only">
                            </label>
                            <p class="pl-1 text-black">or drag and drop</p>
                        </div>
                        <p class="text-xs text-black">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                    
                </div>
            </div>
    
            <div class="col-span-2 flex justify-end">
                <button type="submit"
                    class="px-8 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-600">update</button>
            </div>
    
        </form>
    </section>
    
</body>
</html>