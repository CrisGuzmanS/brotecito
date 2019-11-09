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
            label: "PROXIMIDAD",
            borderColor: "#3e95cd",
            fill: false
        },
        ]
    },
    options: {
        title: {
        display: true,
        text: 'PROXIMIDAD'
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

    function getCurrentTime(){
        // OBTENER LA HORA FORMATEADA
        var today = new Date();
        var hours = today.getHours();
        hours = ("0" + hours).slice(-2);
        var seconds = today.getSeconds();
        seconds = ("0" + seconds).slice(-2);
        var minutes = today.getMinutes();
        minutes = ("0" + minutes).slice(-2);
        return hours + ":" + minutes + ":" + seconds;
    }

setInterval(function(){

    
    var time = getCurrentTime();

    // ACTUALIZAR LA GRAFICA DE PROXIMIDAD
    $.get( domain+"api/proximidad/actual", function( proximidad ) {
        addData( chart, time, proximidad );
        removeData( chart );
    });

}, 1000);

</script>

@endsection