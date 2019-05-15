<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
            <div class="body" style="page-break-before: always;width:100%;margin:0 auto">
                <table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
                    <tr>
                        
                        <td style="width:100%;vertical-align:center;text-align:center;border:4px solid #111;">
                            <h2 style="width:30%;font-size:20px !important;vertical-align:middle">
                                <img src="{{asset('img/salam-aid.png')}}" style="height:50px;">
                            </h2>
                            <h2 style="width:55%;float:right;font-size:20px !important;vertical-align:top">FORMULIR SETORAN ZISWAF</h2>
                        </td>
                        
                    </tr>
                   
                </table>
            
            
                
                <table border="0" style="width:100%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                        <tr>
                            <td style="width:10%;font-size:20px;">&nbsp;</td>
                            <td style="width:20%;font-size:20px;">Nama</td>
                            <td style="font-size:20px;">:</td>
                            <td style="font-size:20px;font-style:bold">{{$trans->penyetor}}</td>
                        </tr>
                        @if ($trans->flag==1)
                           <tr>
                                <td style="width:10%;font-size:20px;">&nbsp;</td>
                                <td style="width:20%;font-size:20px;">Kelas</td>
                                <td style="font-size:20px;">:</td>
                                <td style="font-size:20px;font-style:bold">{{strtoupper($batch->kategori)}} - {{$batch->nama_batch}}</td>
                            </tr> 
                        @else    
                            <tr>
                                <td style="width:10%;font-size:20px;">&nbsp;</td>
                                <td style="width:20%;font-size:20px;">Alamat</td>
                                <td style="font-size:20px;">:</td>
                                <td style="font-size:20px;font-style:bold">{{$trans->muzzaki->alamat}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width:10%;font-size:20px;">&nbsp;</td>
                            <td style="width:20%;font-size:20px;">Telp/HP</td>
                            <td style="font-size:20px;">:</td>
                            <td style="font-size:20px;font-style:bold">{{isset($trans->muzzaki->telp) ? $trans->muzzaki->telp : '-'}}</td>
                        </tr>
                        
                    </table>
                    <table border="1" style="width:100%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                        <tr>
                            <th style="width:30%;font-size:15px;">Jenis Donasi</th>
                            <th style="width:40%;font-size:15px;">Uraian</th>
                            <th style="width:30%;font-size:15px;">Jumlah</th>
                        </tr>
                        
                        <tr>
                            <td style="text-align:center">{{$trans->jenis}}</td>
                            <td style="text-align:center">{{$trans->keterangan}}</td>
                            @if ($trans->jumlah_setoran!=0)
                                <td style="text-align:right;padding-right:20px">{{number_format($trans->jumlah_setoran)}}</td>
                            @else
                                <td style="text-align:right;padding-right:20px">Beras : {{number_format($trans->beras)}} Kg</td>
                            @endif
                        </tr>
                        
                    </table>
                    
                    <div class="text-center">
                        @if ($trans->jumlah_setoran!=0)
                            <h5>Terbilang : {{ucwords(Terbilang($trans->jumlah_setoran))}} Rupiah</h5>
                        @else
                            <h5>Zakat Fitrah Menggunakan Beras : {{ucwords(Terbilang($trans->beras))}} Kilogram</h5>
                        @endif
                    </div>

                    <table border="0" style="width:100%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                        <tr>
                            <td style="width:50%;text-align:center;font-size:12px;">Tanda Tangan Penyetor
                                <br>
                                <br>
                                <br>
                                <br>
                                (Nama : <b>{{$trans->penyetor}}</b>)
                            </td>
                            <td style="width:50%;text-align:center;font-size:12px;">Pengesahan Amilin
                                <br>
                                <br>
                                <br>
                                <br>
                                (Nama : <b>{{Auth::user()->name}}</b>)
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;font-size:15px" colspan="2">
                            <br>
                            <br>
                            Semoga Allah memberikan pahala atas yang telah anda berkan menjadikannya suci dan mensucikan, serta memberikan keberkahan atas harta anda yang tersisa.
                            </td>
                        </tr>
                    </table>
                </div>
                
                
	</body>
</html>
<style type="text/css" media="print">
  @page { 
  	size: A5; 
  }
  @media print {
  html, body {
    width: 148mm;
    height: 210mm;
  }
  .body
  {
      height: 210mm;
  }
  /* ... the rest of the rules ... */
}
</style>
<style type="text/css">
*
{
	line-height: 22px;
	font-size : 13px;
}
table td div
{
    font-size : 13px !important;
}
table td
{
    /* padding:1px !important; */
    margin:1px !important;
}
.tabel th
{
    vertical-align: top;
	padding:8px 3px;
    font-size:17px;
}
.tabel td
{
	vertical-align: top;
	padding:8px 3px;
    font-size:16px;
}
.tabel th
{
	background: #ddd;
	vertical-align: middle !important;
}

h1,h2,h4,h5
{
	padding: 3px !important;
	margin: 3px !important;
}
h6,h3
{
	padding: 1px !important;
	margin: 1px !important;
}
div
{
	font-size: 12px !important;
	padding-top:0px;
	padding-bottom:0px;
	margin-top:-1px !important;
	margin-bottom:0px;
}
ol li 
{
	margin-top:3px !important;
	margin-bottom:0px !important;
}


</style>