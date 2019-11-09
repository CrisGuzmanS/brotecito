@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <canvas id="canvas" width="600" height="300"></canvas>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script type="text/javascript" src="{{ URL::asset('js/Chart.min.js') }}"></script>
<script>

hostname = window.location.hostname;
port = window.location.port;
domain = "http://"+hostname+":"+port+"/";

chart = new Chart(document.getElementById("canvas"), {
    type: 'line',
    data: {
        labels: [0,1,2,3,4,5,6,7,8,9],
        datasets: [{ 
            data: [0,0,0,0,0,0,0,0,0,0],
            label: "TEMPERATURA",
            borderColor: "#3e95cd",
            fill: false
        },
        ]
    },
    options: {
        title: {
        display: true,
        text: 'TEMPERATURA'
        },
        scales: {
                yAxes : [{
                    ticks : {
                        max : 100,    
                        min : 0
                    }
                }]
            }
    }
    });


    function addData(chart, label, data) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
        });
        chart.update();
    }

    function removeData(chart) {
        chart.data.labels.shift();
        chart.data.datasets.forEach((dataset) => {
            dataset.data.shift();
        });
        chart.update();
    }

setInterval(function(){

    var today = new Date();
    var hours = today.getHours();
    hours = ("0" + hours).slice(-2);

    var seconds = today.getSeconds();
    seconds = ("0" + seconds).slice(-2);

    var minutes = today.getMinutes();
    minutes = ("0" + minutes).slice(-2);

    var time = hours + ":" + minutes + ":" + seconds;

    // // temperatura = Math.floor((Math.random()*100)+1);
    // // console.log(temperatura);
    // addData( chart, time, temperatura );
    // removeData( chart );

    $.get( domain+"api/temperatura/actual", function( temperatura ) {
        // console.log(data);
        
        addData( chart, time, temperatura );
        removeData( chart );
    });
    

    console.log(domain);


 }, 1000);

</script>

@endsection