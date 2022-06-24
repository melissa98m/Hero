<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Skill;
use App\Models\Universe;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Hero::all();
        $universes = Universe::all();
        return view('heroes.index', compact('heroes', 'universes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $universes = Universe::all();
        return view('heroes.create', compact('skills', 'universes'));
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
            'hero_name'=>'required',
            'gender'=>'required',
            'type'=>'required',
            'description'=>'required',
            'photo'=>'required',
            'skill_id' => 'required',
        ]);
        $hero = Hero::create([
            'hero_name' => $request->hero_name,
            'gender' => $request->gender,
            'type' => $request->type,
            'description' => $request->description,
            'photo' => $request->photo,
            'skill_id' => $request->skill_id
        ]);

        $hero->universes()->attach($request->universe_id);


        // ou Product::create($request->all());

        return redirect()->route('heroes.index')
            ->with('success', 'Héro créer avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero =Hero::find($id);
        $skill = $hero->skill->skill_name;
        $universes = $hero->universes;
        // show the view and pass the product to it
        return view('heroes.show', compact('hero' , 'skill' , 'universes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        $skills = Skill::all();
        $universes = Universe::all();

        return view('heroes.edit', compact('hero' , 'skills', 'universes' ));
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
        $updateHero = $request->validate([
            'hero_name'=>'required',
            'gender'=>'required',
            'type'=>'required',
            'description'=>'required',
            'photo'=>'required',
            'skill_id' => 'required',
        ]);
        Hero::findOrFail($id)->universes()->sync($request->universes_id);
        Hero::whereId($id)->update($updateHero);

        return redirect()->route('heroes.index')
            ->with('success', 'Héro mis à jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);

        $hero->delete();
        return redirect('/heroes')->with('success', 'Héro supprimé');
    }
}
