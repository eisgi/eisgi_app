@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Importer fichier Fourmateurs CSV</h5>
                    <form action="{{ route('import.Fourmateurs') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="file" accept=".csv">
                        </div>
                        <button type="submit" class="btn btn-primary">Importer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
