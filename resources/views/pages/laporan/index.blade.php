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
            <span>Data Laporan</span>
        </li>
    </ul>
    
</div>
<h1 class="page-title"> Data Laporan
</h1>
<div class="row">
    <div class="col-md-9">&nbsp;</div>
    <div class="col-md-3">
        <button type="button" onclick="lihatlaporan()" class="btn btn-md btn-primary pull-right"><i class="fa fa-search"></i> Lihat Laporan</button>
        <div class="input-group input-small date" id="datepicker" data-date="{{date('d-m-Y')}}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
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
        <div id="data" style="border:1px solid #ddd;"></div>
    </div>                       
</div>
@endsection

@section('footscript')
<script src="{{asset('js/chartjs/chartjs.js')}}" type="text/javascript"></script>
<script src="{{asset('js/chartjs/datalabel.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        loaddata(-1);
        $('#datepicker').datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
            });
        
        //toastr.error('Are you the 6 fingered man?')
    });
    function pesan(ps,jns)
    {
        if(jns=='error')
            toastr.error(ps);
        else
            toastr.info(ps);

    }
    function lihatlaporan()
    {
        var tgl=$('#tanggal').val();
        loaddata(tgl);
        // alert(tgl);
    }
    function loaddata(id)
    {
        $('#data').load('{{url("laporan-data")}}/'+id,function(){
            
        });
    }

</script>
@endsection