@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row d-flex">
                <div class="col">

                </div>
                <div class="col-10">
                    <div class="card card-coin">
                        <div class="container-fluid card-name">
                            <h1 class="text-black-50">{{$crypto->name}}</h1>
                        </div>
                        <div class="card-header ">
                            <h3 class="card-title">Current price: {{round($crypto->price)}}</h3>
                            <div class="image ">
                                <img src="{{$crypto->image}}" class="img-fluid rounded "
                                     alt="{{$crypto->name}} image">
                            </div>
                        </div>
                        <div class="card-body">
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

