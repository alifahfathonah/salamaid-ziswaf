<div class="container">
    <div>
        <canvas id="myChart" width="400" height="400"></canvas>  
    </div>
    </div>
    <?php
    $d=array();
    foreach($data['data'] as $kd => $vd)
    {
        $jenis[]=$kd;
        $jlh[]=$vd;
    }
    // echo json_encode($jlh);
    // echo $tgl;
    ?>

	<!--Load chart js-->
	
	<script>

            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($jenis);?>,
                    datasets: [{
                        label: '',
                        data : <?php echo json_encode($jlh);?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: '{{$data["title"]}}'
                    },
                    responsive:true,
                    
                    maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                    },
                    plugins: {
                    datalabels: {
                            align: 'end',
                            anchor: 'end',
                            color: "#000000",
                            formatter: function(value, context) {
                                return value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                            }
                        }
                    }
                }
            });
        
   	</script>

<style>
    canvas{
  
  width:100% !important;
  height:380px !important;

}

</style>