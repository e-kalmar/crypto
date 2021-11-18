@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">

@section('content')
<div class="chart-container">
                        <canvas id="chart"></canvas>
                    </div>
<section class='content'>
    <div class="container-fluid pt-3">
        <div class="card ">
            <div class="card-body">
                @if($favorites->count())
                    <table id="example1" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Target</th>
                                <th>ATH</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($favorites as $element)
                                <tr>
                                    <td><a href="{{ route('crypto.show',$element['rank']) }}"
                                            class="btn btn-dark">{{ $element['rank'] }}</a></td>
                                    <td><img src="{{ $element['image'] }}" width="40">
                                        {{ $element['name'] }}
                                        <input class="hiddenCryptoName" type="hidden" name="crypto-name"
                                            value="{{ $element['name'] }}">
                                    </td>
                                    <td>{{ $element['price'] }}</td>
                                    <td>{{ $element['target'] }}</td>
                                    <td>{{ $element['ath'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <h1>KOKO BOGA NA LARAVEL</h1>
                @endif
            </div>
            <div class="card-footer pb-0 px-0">

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
        var ctx = document.getElementById("chart").getContext("2d");
        var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Prices', 'Time'],
          datasets: [{
            label: 'Prices',
            backgroundColor: "#17a2b8",
            data: [2,4,6]
          }, 
          {
            label: 'Time',
            backgroundColor: "#00c0ef",
            data: [1,2,3]
          }],
        },
        options: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              fontColor: "#000080",
            }
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
</script>
@endsection