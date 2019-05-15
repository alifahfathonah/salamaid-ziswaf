@extends('layouts.master')
@section('title')
<title>Laporan</title>
@endsection

@section('konten')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('beranda')}}">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Laporan Per Kelas</span>
        </li>
    </ul>
    
</div>
<h1 class="page-title"> Data Laporan Per Kelas
</h1>
<div class="row">
    <div class="col-md-8">&nbsp;</div>
    <div class="col-md-4">
        <button type="button" onclick="reset()" class="btn btn-md btn-success pull-right"><i class="fa fa-refresh"></i> Reset</button>
        <button type="button" onclick="lihatlaporan()" class="btn btn-md btn-primary pull-right"><i class="fa fa-search"></i> Lihat Laporan</button>
        <div class="input-group input-small date pull-right" id="datepicker" data-date="{{date('d-m-Y')}}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
            <input type="text" class="form-control" readonly id="tanggal">
            <span class="input-group-btn">
                <button class="btn default" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
        </div>
        
        
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <div id="data" style="margin:20px 0px;"></div>
    </div>                       
</div>
@endsection

@section('footscript')
<script src="{{asset('js/chartjs/chartjs.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        loaddata(-1);
        $('#datepicker').datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
            });
        
    })
    function lihatlaporan()
    {
        var tgl=$('#tanggal').val();
        loaddata(tgl);
        // alert(tgl);
    }
    function reset()
    {
        loaddata(-1);
        // alert(tgl);
    }
    function loaddata(tgl)
    {
        $('#data').load('{{url("laporan-per-kelas-data")}}/'+tgl,function(){

        });
    }

    function printDiv(divID) {
        var content = document.getElementById(divID).innerHTML;
        var mywindow = window.open('', 'Print', 'height=600,width=800');

        mywindow.document.write('<html><head><title>Print</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(content);
        mywindow.document.write('<style>.table{width:100%;} .table td,.table th{border:1px solid #888;margin:0px; padding:2px;font-size:11px;}</style></body></html>');

        mywindow.document.close();
        mywindow.focus()
        mywindow.print();
        mywindow.close();
        return true;  
        }
    </script>
@endsection