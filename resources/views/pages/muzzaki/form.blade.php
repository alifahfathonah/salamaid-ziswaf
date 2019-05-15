<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-speech font-green"></i>
                    <span class="caption-subject bold font-green uppercase">Form Muzzaki</span>
                </div>
                <div class="actions">
                     <a href="javascript:loadform(-1);" class="btn btn-circle blue-steel btn-outline">
                         <i class="fa fa-plus"></i> Tambah Baru </a>
                   
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" action="#" id="simpan-muzzaki" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if ($id!=-1)
                        {{ method_field('PATCH') }}
                    @endif
                    <div class="form-group">
                        <label class="control-label">Nama Muzzaki</label>
                        <input type="text" placeholder="Nama Muzzaki" id="nama" name="nama" value="{{$id!=-1 ? $det->nama : ''}}" class="form-control"> </div>
                    <div class="form-group">
                        <label class="control-label">E-mail</label>
                        <input type="email" placeholder="Email" class="form-control" id="email" name="email" value="{{$id!=-1 ? $det->email : ''}}"> </div>
                    <div class="form-group">
                                <label class="control-label">Telp/HP</label>
                                <input type="text" placeholder="Telp/HP" name="telp" id="telp" value="{{$id!=-1 ? $det->telp : ''}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">{{$id!=-1 ? $det->alamat : ''}}</textarea>
                    </div>
                    
                    <div class="margin-top-10">
                        <a href="javascript:simpan({{$id}});" class="btn green">{{$id==-1 ? 'Simpan' : 'Edit'}} Data</a>
                        <button type="reset" class="btn default">Cancel </button>
                    </div>
                </form>
            </div>
        </div>`