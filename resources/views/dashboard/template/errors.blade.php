@if( count($errors) > 0 )
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">@yield('errorMessage','Error')</h4>
        <hr>
        <ul>
            @foreach( $errors->all() AS $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif