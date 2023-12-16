@extends('layout')

@section('content')
    <section class="row mt-5">
        <form method="post" action="{{ route('petUpdate', $pet['id']) }}" class="col-4 mx-auto">
            @method('PUT')
            @csrf
            <legend>Edycja ID {{ $pet['id'] }}</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Imię</label>
                <input name="name" type="text" id="disabledTextInput" class="form-control"
                       value="{{ $pet['name'] ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Linki do fotografii psa (przecinek oddziela linki)</label>
                <textarea class="form-control" name="photoUrls">{{ implode(',', $pet['photoUrls']) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Kategoria</label>
                <input name="category[name]" type="text" id="disabledTextInput" class="form-control"
                       value="{{ $pet['category']['name']  ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Tagi (przecinek oddziela tagi)</label>
                <textarea class="form-control" name="tags">{{ implode(',', array_column($pet['tags'], 'name')) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Status</label>
                <input name="status" type="text" id="disabledTextInput" class="form-control"
                       value="{{ $pet['status']  ?? '' }}">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Zapisz</button>
                <a href="{{ route('petIndex') }}" class="btn btn-primary">Powrót</a>
                <button class="btn btn-danger profile-button" type="button" data-bs-toggle="modal" data-bs-target="#deletePet">
                    Usuń
                </button>
            </div>
        </form>
    </section>
    @include('partials._delete-modal')
@endsection
