@extends('layout')

@section('content')

<h2>{{ $hero->hero_name }}</h2>
<img src="{{ $hero->photo }}" alt="{{ $hero->hero_name }}">

<p>Genre: {{ $hero->gender }}</p>
<p><strong>Type de héro</strong>: {{ $hero->type }}</p>

<p><strong>Skill</strong>: {{ $hero->skill->skill_name }}</p>

<p>Descritpion de {{ $hero->hero_name }}</p>
<p>
        {{ $hero->description }}
</p>

<p>Ces univers</p>
@foreach($universes as $universe)
    <p>{{ $universe->name }}</p>
@endforeach



@endsection
