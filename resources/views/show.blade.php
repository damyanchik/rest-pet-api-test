@extends('layout')

@section('content')
    @include('partials._search')
    <section class="row mt-5">
        <div class="col-4 mx-auto">
            <fieldset disabled>
                <legend>Informacja o pupilu</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Imię</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input"
                           value="{{ $pet['name'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Linki do fotografii psa</label>
                    @foreach($pet['photoUrls'] as $photo)
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Brak informacji"
                               value="{{ $photo }}">
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Kategoria</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Brak informacji"
                           value="{{ $pet['category']['name']  ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Tagi</label>
                    @foreach($pet['tags'] as $tag)
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Brak informacji"
                               value="{{ $tag['name'] }}">
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Status</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Brak informacji"
                           value="{{ $pet['status']  ?? '' }}">
                </div>
            </fieldset>
            <div class="d-flex justify-content-between">
                <a href="{{ route('petEdit', $pet['id']) }}" class="btn btn-primary">Edytuj</a>
                <button class="btn btn-danger profile-button" type="button" data-bs-toggle="modal" data-bs-target="#deletePet">
                    Usuń
                </button>
            </div>
        </div>
    </section>
    @include('partials._delete-modal')
@endsection
