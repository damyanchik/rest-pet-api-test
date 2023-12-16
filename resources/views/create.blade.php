@extends('layout')

@section('content')
    <section class="row mt-5">
        <form method="post" action="{{ route('petStore') }}" class="col-4 mx-auto">
            @method('POST')
            @csrf
            <legend>Utwórz nowego pupila</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Imię</label>
                <input name="name" type="text" id="disabledTextInput" class="form-control"
                       value="">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Linki do fotografii psa (przecinek oddziela linki)</label>
                <textarea class="form-control" name="photoUrls">
                </textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Kategoria</label>
                <input name="category[name]" type="text" id="disabledTextInput" class="form-control"
                       value="">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Tagi (przecinek oddziela tagi)</label>
                <textarea class="form-control" name="tags">
                </textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Status</label>
                <input name="status" type="text" id="disabledTextInput" class="form-control"
                       value="">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Dodaj</button>
                <a href="{{ route('petIndex') }}" class="btn btn-primary">Powrót</a>
            </div>
        </form>
    </section>
@endsection
