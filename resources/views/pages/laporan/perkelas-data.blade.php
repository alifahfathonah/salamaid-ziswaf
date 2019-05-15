<div class="row" style="border-top:1px solid #ddd;padding-top:20px;">
    <div class="col-md-2 col-sm-2 col-xs-2">
        <ul class="nav nav-tabs tabs-left">
            @php
                $no=1;
            @endphp
            @foreach ($kelas as $key=>$item)
                <li class="{{$no==1 ? "active" : ''}}">
                    <a href="#tab_6_{{$no}}" data-toggle="tab"> {{strtoupper($key)}} </a>
                </li>
            @php
                $no++;
            @endphp
            @endforeach
        </ul>
    </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="tab-content">
            @php
                $no=1;
            @endphp
            @foreach ($kelas as $key=>$item)
                <div class="tab-pane {{$no==1 ? 'active' : ''}}" id="tab_6_{{$no}}">
                    <div class="tabbable-custom ">
                        <ul class="nav nav-tabs ">
                            @php
                                $j=1;
                                ksort($item);
                            @endphp
                            @foreach ($item as $ky => $it)
                                <li class="{{$j==1 ? 'active' : ''}}">
                                    <a href="#tab_5_{{$j}}" data-toggle="tab"> {{$ky}} </a>
                                </li>
                                @php
                                    $j++;
                                @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @php
                                $j=1;
                            @endphp
                            @foreach ($item as $ky => $it)
                                <div class="tab-pane {{$j==1 ? 'active' : ''}}" id="tab_5_{{$j}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onclick="printDiv('divCetak')" class="btn btn-xs btn-primary pull-right">
                                                <i class="fa fa-print"></i> Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-scrollable" id="divCetak">
                                                <h4>Level : {{$ky}}</h4>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> NISN </th>
                                                            <th> Nama Siswa </th>
                                                            <th> Tanggal Bayar Zakat </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $id=1;
                                                        ksort($it);
                                                    @endphp
                                                    @foreach ($it as $k => $i)
                                                        
                                                    <tr>
                                                        <td> {{$id}} </td>
                                                        <td> {{$siswa[$ta][$i->id_penyetor]->nisn}} </td>
                                                        <td> {{$i->penyetor}} </td>
                                                        <td> {{tgl_indo($i->tanggal_transaksi)}} </td>
                                                    </tr>
                                                    @php
                                                        $id++;
                                                    @endphp
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @php
                                    $j++;
                                @endphp
                            @endforeach
                            
                            
                        </div>
                    </div>
                                        
                </div>
            @php
                $no++;
            @endphp
            @endforeach
            
        </div>
    </div>
</div>