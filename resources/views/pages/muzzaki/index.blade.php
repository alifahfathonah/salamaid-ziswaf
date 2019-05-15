@extends('layouts.master')
@section('title')
<title>Data Muzzaki</title>
@endsection

@section('konten')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('beranda')}}">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Muzzaki</span>
        </li>
    </ul>
    
</div>
<h1 class="page-title"> Data Muzzaki
</h1>
<div class="row">
    <div class="col-md-8">
        <div id="data"></div>
    </div>                    
    <div class="col-md-4">
        <div id="form"></div>
    </div>
    
</div>
@endsection

@section('footscript')
<script>
    $(document).ready(function(){
        loadform(-1);
        loaddata();
        //toastr.error('Are you the 6 fingered man?')
    });
    function pesan(ps,jns)
    {
        if(jns=='error')
            toastr.error(ps);
        else
            toastr.info(ps);

    }
    function loaddata()
    {
        $('#data').load('{{url("muzzaki-data")}}',function(){
            $('#sample_1').dataTable();
        });
    }
    function loadform(id)
    {
        $('#form').load('{{url("muzzaki")}}/'+id,function(){

        });
    }
    function hapus(id)
    {
        $('#drag-title').text('Peringatan');
        $('#drag-content').html('<h3>Apakah Anda Yakin ingin Menghapus Data Ini ?</h3>');
        $('#draggable').modal('show');
        $('#drag-ya').one('click',function(){
            $.ajax({
                    url: '{{url("muzzaki-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    var txt = "Data Muzzaki Berhasil Di Hapus";
                    pesan(txt,"info");
                    $('#draggable').modal('hide');
                    loaddata();
                }).fail(function(){
                    var ps='Data Muzzaki Gagal Dihapus';
                    pesan(ps,'error');
                });
            
        })
    }
    function simpan(id)
    {
        //simpan-muzzaki
        
            var nama=$('#nama').val();   
            var telp=$('#telp').val();   
            if(nama=='')
            {
                pesan("Nama Muzzaki Belum Diisi","error");
            }
            else if(telp=='')
            {
                pesan("Telp Muzzaki Belum Diisi","error");
            }
            else
            {
                $('#drag-title').text('Peringatan');
                $('#drag-content').html('<h3>Apakah Data Muzzaki yang Diinput sudah Benar ?</h3>');
                $('#draggable').modal('show');
                $('#drag-ya').one('click',function(){
                        if(id==-1)
                        {
                            var t_url = '{{url("muzzaki")}}';
                            var t_method = 'POST';
                        }
                        else
                        {
                            var t_url = '{{url("muzzaki")}}/'+id;
                            var t_method = 'POST';
                        }
                            $.ajax({
                                url : t_url,
                                type : t_method,
                                dataType: 'json',
                                cache: false,
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                data: $('#simpan-muzzaki').serialize()
                            }).done(function(data){
                                loaddata();
                                loadform(-1);
                                if(id==-1)
                                {
                                    var ps="Data Muzzaki Berhasil Disimpan";
                                }
                                else
                                {
                                    var ps="Data Muzzaki Berhasil Di Edit";
                                }
                                $('#draggable').modal('hide');
                                var jns="info";
                                pesan(ps,jns);
                            }).fail(function(data){ 
                                var ps='Data Muzzaki Gagal Disimpan';  
                                var jns="error";
                                pesan(ps,jns);
                            });
                        
                        
                    })
            }
    }
</script>
@endsection