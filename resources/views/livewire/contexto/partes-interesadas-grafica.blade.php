<div>
    
    <div id="container" style="width: 100%;">
        <canvas id="canvas"></canvas>
    </div>
    
    @push('scripts')
    <script src="{{ asset('backend/vendors/Chart.js/dist/Chart.bundle.js') }}"></script>
       <script>
            var DEFAULT_DATASET_SIZE = 7;
            var addedCount = 0;
            var randomScalingFactor = function() {
                return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
            };
            var randomColorFactor = function() {
                return Math.round(Math.random() * 255);
            };
            var randomColor = function() {
                return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
            };
             var bubbleChartData = {
                animation: {
                    duration: 10000
                },
                
                 datasets: [{
                  @foreach($table_partes_interesadas as $grafica)
                    label: "{{ $grafica->nombreInteresada }}",
                    backgroundColor: randomColor(),
                    data: [{
                       x: {{ $grafica->impacto }},
                       y: {{ $grafica->influencia }},
                       r: 10,
                    }]
                 },{
                  @endforeach  
                  
                  label: "Punto de inicio",
                    data: [{
                        x: 0,
                        y: 0,
                    
                    }] 
                    },{
                        label: "Punto final",
                        data: [{
                        x: 8,
                        y: 8,
                    }]         
                }]             
            };
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myChart = new Chart(ctx, {
                    type: 'bubble',
                    data: bubbleChartData,
                    options: {
                        responsive: true,
                        title:{
                            display:true,
                            text:'DIAGRAMA PARTES INTERESADAS'
                        },
                    }
                });
            };
            $('#randomizeData').click(function() {
                var zero = Math.random() < 0.2 ? true : false;
                $.each(bubbleChartData.datasets, function(i, dataset) {
                    dataset.backgroundColor = randomColor();
                    dataset.data = dataset.data.map(function() {
                        return {
                            x: randomScalingFactor(),
                            y: randomScalingFactor(),
                            r: Math.abs(randomScalingFactor()) / 5,
                        };
                    });
                });
                window.myChart.update();
            });
            $('#addDataset').click(function() {
                ++addedCount;
                var newDataset = {
                    label: "My added dataset " + addedCount,
                    backgroundColor: randomColor(),
                    data: []
                };
                for (var index = 0; index < DEFAULT_DATASET_SIZE; ++index) {
                    newDataset.data.push({
                        x: randomScalingFactor(),
                        y: randomScalingFactor(),
                        r: Math.abs(randomScalingFactor()) / 5,
                    });
                }
                bubbleChartData.datasets.push(newDataset);
                window.myChart.update();
            });
            $('#addData').click(function() {
                if (bubbleChartData.datasets.length > 0) {
                    for (var index = 0; index < bubbleChartData.datasets.length; ++index) {
                        bubbleChartData.datasets[index].data.push({
                            x: randomScalingFactor(),
                            y: randomScalingFactor(),
                            r: Math.abs(randomScalingFactor()) / 5,
                        });
                    }
                    window.myChart.update();
                }
            });
            $('#removeDataset').click(function() {
                bubbleChartData.datasets.splice(0, 1);
                window.myChart.update();
            });
            $('#removeData').click(function() {
                bubbleChartData.datasets.forEach(function(dataset, datasetIndex) {
                    dataset.data.pop();
                });
                window.myChart.update();
            });
        </script>
    @endpush 
</div>
