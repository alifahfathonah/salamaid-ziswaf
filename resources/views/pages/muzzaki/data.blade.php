<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
<thead>
    <tr>
        <th>No</th>
        <th> Nama Muzzaki </th>
        <th> Email </th>
        <th> Telp/HP </th>
        <th> Alamat </th>
        <th> # </th>
    </tr>
</thead>
<tbody>
    @foreach ($muz as $index=>$item)        
        <tr class="odd gradeX">
            <td class="text-center">{{++$index}}</td>
            <td>{{$item->nama}} </td>
            <td>{{$item->email}}</td>
            <td class="center">{{$item->telp}}</td>
            <td class="left">{{$item->alamat}}</td>
            <td>
                <div style="width:60px !important;">
                    <a href="javascript:loadform({{$item->id}});" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="javascript:hapus({{$item->id}});" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    
</table>