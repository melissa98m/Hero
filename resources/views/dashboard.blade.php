@extends('layout')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="">
            <div class="bg-dark  shadow-sm rounded-lg">

                <div>
                    <a href="{{ route('heroes.index') }}" class="btn btn-primary">Voir les héros</a>
                    <a href="{{ route('skills.index') }}" >Voir les skills</a>
                    <a href="{{ route('universes.index') }}" >Voir les univers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
