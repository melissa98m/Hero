@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-secondary text-light rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h2 class="text-center"><strong>Liste des univers</strong></h2>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                            <a href="{{ route('universes.create') }}" class="btn btn-success btn-sm m-2">Ajouter un univers</a>
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($universes as $universe)
                                    <tr>
                                        <td>{{$universe->id}}</td>
                                        <td>{{$universe->universe_name}}</td>
                                        <td>
                                            <a href="{{ route('universes.edit', $universe->id) }}" class="btn btn-primary btn-sm m-2">Editer</a>

                                            <form action="{{ route('universes.destroy',$universe->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm m-2" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer cette univers?')">Supprimer</button>
                                            </form>
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
