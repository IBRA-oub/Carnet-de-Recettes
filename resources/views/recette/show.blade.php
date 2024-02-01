<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>show detaille</title>
</head>
<body>
    <section class="max-w-4xl mx-auto p-6 mt-12">
        <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
            <!-- Titre de la carte -->
            <div class=" text-black p-4">
                <h1 class="font-caveat text-5xl font-bold">{{$detailleRecette['title']}}</h1>
            </div>
    
            <!-- Image du plat -->
            <img src="{{ asset('storage/image/' . $detailleRecette['picture']) }}" alt="Image du plat" class="w-full h-64 object-cover">
    
            <!-- Contenu de la carte -->
            <div class="p-4">
                <div class="flex">
                    <!-- Ingrédients à gauche -->
                    <div class="w-1/2 pr-4">
                        <h2 class="text-lg font-bold mb-2">Ingrédients</h2>
                        <p class="font-serif">{!! nl2br(e($detailleRecette['ingredients'])) !!}</p>
                      
                    </div>
    
                    <!-- Ligne de séparation -->
                    <div class="border-r border-gray-300"></div>
    
                    <!-- Instructions de préparation à droite -->
                    <div class="w-1/2 pl-4">
                        <h2 class=" font-Cormorant text-xl font-bold mb-2">Instructions de Préparation</h2>
                        <p class="font-serif">{!! nl2br(e($detailleRecette['prepare'])) !!}</p>
                      
                      
                        <!-- Ajouter d'autres étapes au besoin -->
                    </div>
                </div>
            </div>
            <div class="flex justify-end p-4">
                <a href="{{route('recette.edit' , $detailleRecette['id'])}}" class="text-blue-500 hover:text-blue-900 ">Éditer</a>
                <span class="mx-4">|</span>
                <form action="{{route('recette.destroy' , $detailleRecette['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input value="Supprimer" type="submit" class="text-red-500 hover:text-red-700">
                </form>
            </div>
        </div>


    </section>
    
</body>
</html>