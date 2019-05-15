<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
@if ($jenis=='siswa')
    <thead>
        <tr>
            <th>No</th>
            <th> Tanggal<br>Transaksi</th>
            <th> Nama Siswa </th>
            <th> Penerima </th>
            <th> Keterangan </th>
            <th> Jenis </th>
            <th> Jumlah </th>
            <th> # </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trans as $index=>$item)        
            <tr class="odd gradeX">
                <td class="text-center">{{++$index}}</td>
                <td>{{tgl_indo2($item->tanggal_transaksi)}}</td>
                <td>{{$item->penyetor}} </td>
                <td>{{$item->penerima}}</td>
                <td>{{$item->keterangan}}</td>
                <td class="center">{{$item->jenis}}</td>
                <td class="text-right">{{number_format($item->jumlah_setoran,0,',','.')}}<br>
                    <small>{{number_format($item->beras,2,',','.')}} Kg</small></td>
                <td style="width:60px !important;">
                    <div style="width:60px !important;">
                        @if (isset($v_batch[$item->id_penyetor]))
                            <a href="javascript:cetakulang({{$item->no_kwitansi}},{{$v_batch[$item->id_penyetor]->id_batch}});" data-toggle="tooltip" title="Edit Transaksi" class="btn btn-success btn-xs"><i class="fa fa-print"></i> </a>
                        @endif
                        <a href="javascript:hapus({{$item->id}});" data-toggle="tooltip" title="Hapus Transaksi" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </div>
                </td>

            </tr>
        @endforeach
@elseif($jenis=='muzzaki')
    <thead>
        <tr>
            <th>No</th>
            <th> Tanggal<br>Transaksi</th>
            <th> Nama Muzzaki </th>
            <th> Penerima </th>
            <th> Keterangan </th>
            <th> Jenis </th>
            <th> Jumlah </th>
            <th> # </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trans as $index=>$item)        
            <tr class="odd gradeX">
                <td class="text-center">{{++$index}}</td>
                <td>{{tgl_indo2($item->tanggal_transaksi)}}</td>
                <td>{{$item->penyetor}} </td>
                <td>{{$item->penerima}}</td>
                <td>{{$item->keterangan}}</td>
                <td class="center">{{$item->jenis}}</td>
                <td class="text-right">{{number_format($item->jumlah_setoran,0,',','.')}}<br><small>{{number_format($item->beras,2,',','.')}} Kg</small></td>
                <td style="width:60px !important;">
                    <div style="width:60px !important;">
                        <a href="javascript:cetakulang({{$item->no_kwitansi}},-1);" data-toggle="tooltip" title="Edit Transaksi" class="btn btn-success btn-xs"><i class="fa fa-print"></i> </a>
                        <a href="javascript:hapus({{$item->id}});" data-toggle="tooltip" title="Hapus Transaksi" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                
            </tr>
        @endforeach
@endif
    
</table>