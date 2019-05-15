@extends('layouts.master')
@section('title')
<title>Beranda</title>
@endsection

@section('konten')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('beranda')}}">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
       
    </ul>
    
</div>
<h1 class="page-title"> Beranda
</h1>
<div class="row">
    <div class="col-md-4">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Jumlah Zakat/Infak & Beras</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="container" style="width:60%">
                    <canvas id="jns" height="250"></canvas>  
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Data Jumlah Zakat/Infak Muzzaki</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="container" style="width:60%">
                    <canvas id="myChart3" height="250"></canvas>  
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Data Aktivitas Muzzaki</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="container" style="width:60%">
                    <canvas id="myChart2" height="250"></canvas>  
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">{{$data['title']}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="container" style="width:100%">
                    
                    <canvas id="myChart" height="250"></canvas>  
                </div>
            </div>
        </div>      
    </div>
</div>

@endsection

@section('footscript')

<script src="{{asset('js/chartjs/chartjs.js')}}" type="text/javascript"></script>
<script src="{{asset('js/chartjs/datalabel.js')}}" type="text/javascript"></script>
<?php
    $d=$d2=array();
    $jenis=$jns=$jlh=$jenis2=$jlh2=$jlhjns=$jumlah=array();
    $sis=$muz=$total=0;
    foreach($data['data'] as $kd => $vd)
    {
        $jenis[]=$kd;
        $jlh[]=$vd;
        $total+=$vd;
    }
    $jenis[]='Total';
    $jlh[]=$total;
    foreach($data2['sis'] as $k => $v)
    {
        $jenis2[$k]=$v;
        $jlh2[$k]=$data2['jlh'][$k];
        $jumlah[$k]=$data2['jlhzakat'][$k];
    }
    foreach($data3['jns'] as $k => $v)
    {
        $jns[$k]=$v;
        if($k==1)
            $jlhjns[$k]=($data3['jlhjns'][$k]);
        else
            $jlhjns[$k]=($data3['jlhjns'][$k]/1000);
    }
?>
<script>
  


var oilData = {
    labels: <?php echo json_encode($jenis2);?>,
    datasets: [
        {
            data: <?php echo json_encode($jlh2);?>,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
            ]
        }]
};
var oilCanvas = document.getElementById("myChart2");
var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData,
  options: {
        tooltips: false,
        plugins: {
            datalabels: {
                    color: "#000000",
                    formatter: function(value, context) {
                        return value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.')+' Orang' ;
                    }
                }
            }
        }
});

var data2 = {
    labels: <?php echo json_encode($jenis2);?>,
    datasets: [
        {
            data: <?php echo json_encode($jumlah);?>,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
            ]
        }]
};
var data_pie = document.getElementById("myChart3");
var pieChart = new Chart(data_pie, {
    type: 'pie',
    data: data2,
    options: {
        tooltips: false,
        plugins: {
            datalabels: {
                    color: "#000000",
                    formatter: function(value, context) {
                        return 'Rp. '+value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                    }
                }
            }
        }
    
});
var data3 = {
    labels: <?php echo json_encode($jns);?>,
    datasets: [
        {
            data: <?php echo json_encode($jlhjns);?>,
            backgroundColor: [
                "#EE6384",
                "#63EE84",
            ]
        }]
};
var data_pie = document.getElementById("jns");
var pieChart = new Chart(data_pie, {
    type: 'pie',
    data: data3,
    options: {
        tooltips: false,
        plugins: {
            datalabels: {
                    color: "#000000",
                    formatter: function(value, context) {
                        //return value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                        return value;
                    }
                }
            }
        }
    
});
    
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
                    legend: false,
                    tooltips: false,
                    
                    elements: {
                            rectangle: {
                            backgroundColor: "#cc55aa"
                        }
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
@endsection
<style>
canvas{
  
  width:100% !important;
  height:250px !important;

}

</style>