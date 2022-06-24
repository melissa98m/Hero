@extends('layout')

@section('content')
    <div class="bg-secondary text-light rounded-lg shadow-sm p-5">
        <h2 class="text-center m-3"><strong>{{ $hero->hero_name }}</strong></h2>

<img src="{{asset('images/' . $hero->photo) }}" alt="{{ $hero->hero_name }}" class="rounded mx-auto d-block" width="400px" height="400px">
<div class="text-center">
<p class="m-2"><strong>Genre</strong>: {{ $hero->gender }}</p>
<p class="m-2"><strong>Type de héro</strong>: {{ $hero->type }}</p>

<p class="m-2"><strong>Skill</strong>: {{ $hero->skill->skill_name }}</p>

    <p class="m-2"><strong>Descritpion de {{ $hero->hero_name }}</strong></p>
<p class="m-2">
        {{ $hero->description }}
</p>
    <p class="m-2"><strong>Ces univers</strong></p>
@foreach($universes as $universe)
    <p>{{ $universe->universe_name }}</p>
@endforeach
    </div>

    </div>

@endsection
