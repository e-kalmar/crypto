@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row d-flex">
                <div class="col">

                </div>
                <div class="col-10">
                    <div class="card">

                        <div class="card-header ">
                            
                            <h1 class="text-black-50">{{$crypto->name}}</h1>
                            <h3 class="card-title">Current price: {{round($crypto->price)}}</h3>
                            
<<<<<<< HEAD
                               {{-- <h1></h1> --}}
=======
                               
>>>>>>> 22210c57b8384f0f97a26701c7f38f530166467e
                            
                        </div>
                        <div class="card-body">
                            <img src="{{$crypto->image}}" class="img-fluid rounded  mx-auto d-block"
                            alt="{{$crypto->name}} image">
                            <hr>
<<<<<<< HEAD
=======

>>>>>>> 22210c57b8384f0f97a26701c7f38f530166467e
                            <div class="text-center">{!!$description!!}</div>
                        </div>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </section>

@endsection

