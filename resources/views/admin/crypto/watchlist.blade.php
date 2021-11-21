@extends('layouts.app')

@section('content')

  <section class='content'>
    <div class="container-fluid pt-3">
      <div class="card">
        <div class="card-body">
          <canvas id="chart" ></canvas>
        </div>
      
      </div>
      <div class="row">
        

          @foreach($favorites as $element)

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <div class="float-left"><h3 class="cart-title">{{ $element['rank'] }} {{ $element['name'] }}</h3></div>
                <div class="float-right"><img src="{{ $element['image'] }}" class="card-img-right" width="40"></div>
              </div>
              <div class="card-body">
                
                  <p>Price: {{ $element['price'] }} $</p>
                  <p></p>
                  <p>ATH: {{ $element['ath'] }}</p>
                
              </div>
              
            </div>
          </div>
        
          @endforeach


      
      </div>
          
    </div>
  </section>
@endsection

@section('scripts')
<script>
        var ctx = document.getElementById("chart");
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