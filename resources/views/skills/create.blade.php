@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-secondary text-light rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h2 class="text-center"><strong> Ajouter un skill </strong></h2>
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
                            <form method="POST" action="{{ route('skills.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nom du skill</label>
                                    <input type="text" name="skill_name" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill m-2">Créer un skill</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
