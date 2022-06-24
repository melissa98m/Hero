@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Modifier un Héro</h3>
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
                            <form method="POST" action="{{ route('heroes.update', $hero->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Nom du héro</label>
                                    <input type="text" name="hero_name" class="form-control" value="{{ $hero->hero_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Genre du héro</label>
                                    <select type="text" name="gender" class="form-control"  value="{{ $hero->gender }}">
                                        <option value= "feminin">Feminin</option>
                                        <option value= "masculin">Masculin</option>
                                        <option value= "autre">Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" class="form-control" value="{{ $hero->type }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" width="200px" value="{{ $hero->description }}">
                                </div>
                                <div class=" col-sm-6">
                                    <div class="form-group mb-4">
                                        <label>Photo</label>
                                        <input type="text" name="photo" class="form-control" placeholder="Copier le lien de votre image" value="{{ $hero->photo }}">
                                    </div>
                                </div>
                                <label class="label">Skill</label>
                                <div class="select">
                                    <select name="skill_id" value="{{ $hero->skill->skill_name }}">
                                        @foreach($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="label">Univers</label>
                                <div class="select">
                                    <select  name="universe_id[]" multiple="multiple" class="form-control">
                                        @foreach($universes as $universe)
                                            <option value="{{ $universe->id }}">{{ $universe->universe_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary rounded">Modifier le héro</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
