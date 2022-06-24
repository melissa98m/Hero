

@extends('layout')

@section('content')

<div>
    <h2 class="text-center" >Bienvenue sur Héros</h2><br>

    <p class="text-center mt-4" id="bienvenue">Sur ce site vous pourrez créer des héros , des skills et des univers</p>

</div>
@guest
<button class="btn btn-danger">Se connecter</button>
@endguest
@auth
    <div class="text-center mt-6">
    <a href="{{ route('dashboard') }}" class="btn btn-danger">Aller au dashboard</a>
    </div>
@endauth

@endsection

