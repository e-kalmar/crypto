<x-admin-master>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @section('content')
        <div class="col-6">
            <div class="card card-coin">
                <div class="container-fluid card-name">
                    <h1 class="text-black-50">{{$crypto->name}}</h1>
                </div>                
                <div class="card-header">
                    <h3 class="card-title">Current price: {{round($crypto->price)}}</h3>  
                    <div class="image">
                      <img src="{{$crypto->image}}" class="rounded mx-auto d-block p-5" alt="{{$crypto->name}} image" >
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">{!!$description!!}</div>
                </div>
            </div>
        </div>

    @endsection

</x-admin-master>
