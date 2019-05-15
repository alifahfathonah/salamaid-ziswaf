<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-speech font-green"></i>
                    <span class="caption-subject bold font-green uppercase">Form ZIS</span>
                </div>
                <div class="actions">
                     <a href="javascript:loadform(-1);" class="btn btn-circle blue-steel btn-outline">
                         <i class="fa fa-plus"></i> Tambah Baru </a>
                   
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" action="#" class="" id="simpan-zis" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if ($id!=-1)
                        {{ method_field('PATCH') }}
                    @endif
                    <div class="form-group">
                        <label class="control-label">No. Bukti</label>
                        <input type="text" placeholder="Jumlah" id="kwitansi" name="kwitansi"  class="form-control" readonly="readonly" value="{{date('Ymd')}}{{substr(abs(crc32(sha1(rand()))),0,3)}}"> </div>
                    <div class="form-group">
                        <label class="control-label">Nama Muzzaki</label>
                        <select class="form-control select2" name="muzzaki" id="muzzaki" data-placeholder="Pilih Muzzaki">
                            <option value="0">Pilih Muzzaki</option>
                            @foreach ($muz as $k=>$item)
                                <option value="{{$item->id}}--{{$item->nama}}">{{$item->nama}} :: {{$item->telp}}</option>
                            @endforeach
                        </select>    
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Jenis Setoran</label>
                        <select class="form-control" name="jenis" id="jenis" data-placeholder="Pilih Jenis">
                            <option value="0">Pilih Kelas</option>
                            @foreach ($jenissetoran as $k=>$item)
                                <option value="{{$item->id}}--{{$item->jenis}}">{{$item->jenis}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan">{{$id!=-1 ? $det->keterangan : ''}}</textarea>
                    </div>
                    div class="form-group">
                        <label class="control-label">Jumlah Zakat (Rp)</label>
                        <input type="text" placeholder="Jumlah Rupiah" id="jumlah" name="jumlah" value="{{$id!=-1 ? $det->jumlah : ''}}" class="form-control"> </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah Beras (Kg)</label>
                        <input type="text" placeholder="Jumlah Beras" id="beras" name="beras" value="{{$id!=-1 ? $det->beras : ''}}" class="form-control"> </div>
                    <div class="margin-top-10">
                        <a href="javascript:simpan({{$id}},'{{$jenis}}');" class="btn green">{{$id==-1 ? 'Simpan' : 'Edit'}} Data</a>
                        <button type="reset" class="btn default">Cancel </button>
                    </div>
                </form>
            </div>
        </div>`