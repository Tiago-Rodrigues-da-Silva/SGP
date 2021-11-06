<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>


<div class="container pt-3">
    <div class="row mt-5">
        <div class="col-3">
            <div class="card text-center ">
                <p class="dash-num" id="totalProcessos"></p>
                <p class="dash-text">Processos</p>
            </div>
            <div class="card text-center">
                <p class="dash-num" id="totalAudiencias"></p>
                <p class="dash-text">Audiências</p>
            </div>
        </div>

        <div class="col-6">
            <div class= "grafico ">
                <canvas id="primeiroGrafico"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    
    let ctx = document.getElementById('primeiroGrafico').getContext('2d');
    let chart = new Chart(ctx, {

        
        type: 'line',
                            
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Total de audiências por mês',
                    backgroundColor: 'rgb(128, 170, 255)',
                    borderColor: 'rgb(128, 170, 255)',
                    data: []              

                }
            ],
            scales: {
                        yAxes: [{
                        ticks: {
                            scaleOverride: true,
                            scaleSteps: 10,
                            scaleStepWidth: 1
                                }
                                }]
                    }
        }
    });
</script>

