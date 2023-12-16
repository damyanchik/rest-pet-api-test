<section class="row">
    <form method="get" action="{{ route('petShow') }}" class="col-4 mx-auto mt-5">
        @method('GET')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Wpisz identyfikator pupila</label>
            <input type="number" class="form-control" name="id" min="0">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Odnajdź</button>
            <a href="{{ route('petCreate') }}" class="btn btn-primary">Utwórz</a>
        </div>
    </form>
</section>
