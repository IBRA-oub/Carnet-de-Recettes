<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;

class RecetteControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recette.index',['recette' => Recette::all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recette.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'ingredients'=> 'required',
            'prepare'=> 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
             // 'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'] try agin this command  litter
            // au cas ona integer  'origin'=> ['required','integer']
        ]);

       

        $recette = new Recette();
        $recette->title = $request->input('title');
        $recette->description = $request->input('description');
        $recette->ingredients = $request->input('ingredients');
        $recette->prepare = $request->input('prepare');
        
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $recette->picture = $pictureName;
        }
        
        $recette->save();

        return redirect()->route('recette.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $index = Recette::findOrFail($id);
        return view('recette.show',['detailleRecette'=>$index]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('recette.edit',['editRecette'=> Recette::findOrFail($id)]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'ingredients'=> 'required',
            'prepare'=> 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            // au cas ona integer  'origin'=> ['required','integer']
        ]);

        $updateRecette = Recette::findOrFail($id);
        $updateRecette->title = $request->input('title');
        $updateRecette->description = $request->input('description');
        $updateRecette->ingredients = $request->input('ingredients');
        $updateRecette->prepare = $request->input('prepare');

        if ($updateRecette->hasFile('picture')) {
            $file = $request->file('picture');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $updateRecette->picture = $pictureName;
            
        }
       
        
        $updateRecette->save();

        return redirect()->route('recette.show' , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteRecette = Recette::findOrFail($id);
        $deleteRecette->delete();
        return redirect()->route('recette.index');
    }
}