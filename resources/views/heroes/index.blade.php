@extends('layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="">
                <div class="bg-secondary text-light rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h2 class="text-center"><strong>Liste des Héros</strong></h2>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                            <a href="{{ route('heroes.create') }}" class="btn btn-success btn-sm mt-3">Ajouter un héro</a>
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Skill</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Univers</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($heroes as $hero)
                                    <tr>
                                        <td>{{$hero->id}}</td>
                                        <td>{{$hero->hero_name}}</td>
                                        <td>{{$hero->gender}}</td>
                                        <td>{{$hero->type}}</td>
                                        @if ($hero->skill)
                                            <td>{{$hero->skill->skill_name }}</td>
                                        @else
                                            <td>Pas de skill enregistré</td>
                                        @endif
                                        <td>{{ substr($hero->description , 0, 40) }}</td>
                                        <td>
                                            <img src="{{asset('images/' . $hero->photo) }}" width="50" height="50" alt="{{ $hero->hero_name }}">
                                        </td>
                                        <td>@foreach($hero->universes as $universe)
                                                {{ $universe->universe_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @auth
                                            <a href="{{ route('heroes.edit', $hero->id) }}" class="btn btn-primary btn-sm m-2">Editer</a>
                                            <form action="{{ route('heroes.destroy',$hero->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm m-2" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer le héro?')">Supprimer</button>
                                            </form>
                                            @endauth
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                            <a href="{{ route('dashboard') }}">Retourné au dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
