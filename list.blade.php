@extends('admin.main')
@section('content')
<form method="get" action="{{ route('list') }}" style="width: 50%;">
    <div class="input-group">
        <input type="text" name="searchName" class="form-control form-control-lg" placeholder="Type discount's name here">
        <div class="input-group-append">
            <button type="submit" class="btn btn-lg btn-default">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div class="input-name-id">
            <select name="slnameid" id="" style="height: 100%">
                @if($sl==1){
                <option value="Id">ID</option>
                <option value="Name">Name</option>
                <option value="lc" selected>Lựa chọn mục tìm kiếm</option>}
                @elseif($sl==2){
                    <option value="Id" selected>ID</option>
                    <option value="Name">Name</option>
                    <option value="lc" >Lựa chọn mục tìm kiếm</option>
                }
                @else{
                    <option value="Id" >ID</option>
                    <option value="Name" selected>Name</option>
                    <option value="lc" >Lựa chọn mục tìm kiếm</option>
                }
                @endif
            </select>
        </div>
        <div class="input-a-z">
            <select name="slaz" id="" style="height: 100%">
                @if($sorts==1){
                    <option value="az" selected >A-Z</option>
                    <option value="za" >Z-A</option>
                }
                @else{
                    <option value="za" selected >Z-A</option>
                    <option value="az" >A-Z</option>
                }
                @endif
            </select>
        </div>
        <div class="input-pagination">
            <select name="slpag" id="" style="height: 100%">
                @if($p==1){
                    <option value="1" selected >1</option>
                    <option value="5" >5</option>
                }
                @else{
                    <option value="5" selected >5</option>
                    <option value="1" >1</option>
                }
                @endif
            </select>
        </div>
    </div>
</form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Số lượng SV</th>
                <th >Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lops as $lop)
                <tr>
                    <td>{{$lop->id}}</td>
                    <td>{{$lop->malop}}</td>
                    <td>{{$lop->tenlop}}</td>
                    <td>{{$lop->mota}}</td>
                    <td>{{$lop->soluongsv}}</td>
                    <td>
                        <a class="btn btn-primary mr-2" href="/admin/lop/edit/{{$lop->id}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" onclick="removeRow({{$lop->id}},'/admin/lop/delete')" href="#"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            <tr></tr>
        </tbody>
    </table>
    {{ $lops->appends(['searchName'=>$searchName ?? '','slnameid'=>$slnameid ?? '','slaz'=>$slaz ?? '','slpag'=>$slpag ?? ''])->links() }}
@endsection
