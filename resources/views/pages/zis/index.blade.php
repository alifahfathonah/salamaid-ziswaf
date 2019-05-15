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
            <span>Zakat, Infak, Sedekah dan Wakaf</span>
        </li>
    </ul>
    
</div>
<h1 class="page-title">  Zakat, Infak, Sedekah dan Wakaf
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
        
    });
    function loaddata()
    {
        $('#data').load('{{url("zis-data")}}/{{$jenis}}',function(){
            $('#sample_1').dataTable();
        });
    }
    function loadform(id)
    {
        $('#form').load('{{url("zis-form")}}/{{$jenis}}/'+id,function(){
            $('#jumlah').autoNumeric('init',{mDec:0});
            $('#muzzaki').select2();
        });
    }
    function getsiswa(idkelas)
    {
        $('#datasiswa').load('{{url("siswa-by-kelas")}}/'+idkelas);
    }
    function pesan(ps,jns)
    {
        if(jns=='error')
            toastr.error(ps);
        else
            toastr.info(ps);

    }
    function simpan(id,jns)
    {
        //simpan-muzzaki
        
            var kelas=$('#kelas').val();   
            var muzzaki=$('#muzzaki').val();   
            var siswa=$('#siswa').val();   
            var jenis=$('#jenis').val();   
            // var jumlah=$('#jumlah').val();   

            if(kelas=='0')
            {
                pesan("Nama Kelas Belum Dipilih","error");
            }
            else if(siswa=='0')
            {
                pesan("Nama Siswa Belum Dipilih","error");
            }
            else if(muzzaki=='0')
            {
                pesan("Nama Muzzaki Belum Dipilih","error");
            }
            else if(jenis=='0')
            {
                pesan("Jenis Setoran Belum Dipilih","error");
            }
            // else if(jumlah=='')
            // {
            //     pesan("Jumlah Setoran Belum Diisi","error");
            // }
            else
            {
                $('#drag-title').text('Peringatan');
                $('#drag-content').html('<h3>Apakah Data Setoran yang Diinput sudah Benar ?</h3>');
                $('#draggable').modal('show');
                $('#drag-ya').one('click',function(){
                        var kwitansi=$('#kwitansi').val();
                        if(id==-1)
                        {
                            var t_url = '{{url("zis-simpan")}}/'+jns;
                            var t_method = 'POST';
                        }
                        else
                        {
                            var t_url = '{{url("zis-update")}}/'+jns+'/'+id;
                            var t_method = 'POST';
                        }
                            $.ajax({
                                url : t_url,
                                type : t_method,
                                dataType: 'json',
                                cache: false,
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                data: $('#simpan-zis').serialize()
                            }).done(function(data){
                                loaddata();
                                loadform(-1);
                                if(id==-1)
                                {
                                    var ps="Data ZIS Berhasil Disimpan";
                                }
                                else
                                {
                                    var ps="Data ZIS Berhasil Di Edit";
                                }
                                $('#draggable').modal('hide');
                                var jn="info";
                                pesan(ps,jn);
                                setTimeout(function(){
                                    if(jns=='siswa')
                                    {
                                        window.open(
                                            '{{url("cetak")}}/'+kwitansi+'/'+kelas,
                                            '_blank');
                                    }
                                    else
                                    {
                                        window.open(
                                            '{{url("cetak")}}/'+kwitansi+'/-1',
                                            '_blank');
                                    }
                                },1500);
                            }).fail(function(data){ 
                                var ps='Data ZIS Gagal Disimpan';  
                                var jn="error";
                                pesan(ps,jn);
                            });
                        
                        
                    })
            }
    }
    function cetakulang(kwitansi,jns)
    {
        if(jns=='-1')
        {
            window.open(
                '{{url("cetak")}}/'+kwitansi+'/-1',
                '_blank');
        }
        else
        {
            window.open(
                '{{url("cetak")}}/'+kwitansi+'/'+jns,
                '_blank');
        }
    }
    function hapus(id)
    {
        $('#drag-title').text('Peringatan');
        $('#drag-content').html('<h3>Apakah Anda Yakin ingin Menghapus Data Ini ?</h3>');
        $('#draggable').modal('show');
        $('#drag-ya').one('click',function(){
            $.ajax({
                    url: '{{url("zakat-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    var txt = "Data Zakat Berhasil Di Hapus";
                    pesan(txt,"info");
                    $('#draggable').modal('hide');
                    loaddata();
                }).fail(function(){
                    var ps='Data Zakat Gagal Dihapus';
                    pesan(ps,'error');
                });
            
        })
    }
</script>
@endsection