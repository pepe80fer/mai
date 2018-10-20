@extends ('dashboard.template.main')

@section('title','Referencias')

@section('errorMessage','Error Referencias')

@section('content')

    <div id="main" class="card">
        <referencias inline-template>
            <div>
                <div class="card-header">
                    <div class="card-title">
                        Listado de referencias
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                            Nueva referencia
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
                @include('dashboard.referencias.create')
            </div>
        </referencias>
    </div>
@endsection