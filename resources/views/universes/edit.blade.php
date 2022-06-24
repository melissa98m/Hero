@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Modifier un univers </h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('universes.update', $universe->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Nom de l'univers </label>
                                    <input type="text" name="universe_name" value="{{ $universe->universe_name }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill m-2">Modifier l'univers</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
