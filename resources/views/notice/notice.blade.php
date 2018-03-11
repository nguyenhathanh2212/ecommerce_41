@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <strong>{{ Session::get('error') }}<strong>
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success fade in">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
