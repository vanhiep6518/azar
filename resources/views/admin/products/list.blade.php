@extends('admin.layouts.app')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách dự án</h5>
                <div class="form-search form-inline">
                    <form action="">
                        <input type="" class="form-control form-search" name="search" placeholder="Tìm kiếm">
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <div class="analytic">
                    <a href="{{route('admin.product',['status'=> 1])}}" class="text-primary">Công khai<span class="text-muted">({{$numberStatus['public']}})</span></a>
                    <a href="{{route('admin.product',['status'=> 2])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{$numberStatus['private']}})</span></a>
                    <a href="{{route('admin.product',['status'=> 3])}}" class="text-primary">Thùng rác<span class="text-muted">({{$numberStatus['trash']}})</span></a>
                </div>
                <form action="{{route('admin.actionProduct')}}" method="POST">
                    @csrf
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="" name="action">
                            <option value="">Chọn</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                            @if (request()->segment(4) != 3)
                            <option value="3">Xóa</option>
                            @else
                            <option value="4">Xóa vĩnh viễn</option>
                            @endif
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                        <input type="hidden" class="form-control @error('action') is-invalid @enderror">
                        @error('action')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('list_check')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (!empty($projects))
                            @foreach ($projects as $key=> $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{$item->id}}">
                                    </td>
                                    <td scope="row">{{$key + 1}}</td>
                                    <td><img src="{{$item->image ? $item->image[0] : 'http://via.placeholder.com/80X80'}}" style="width: 80px; height: 80px" alt=""></td>
                                    <td><a href="">{{$item->name}}</a></td>
                                    <td>{{$item->product_cat->name}}</td>
                                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                    <td><a href="{{route('admin.saveProduct',['id'=> $item->id])}}" class="btn btn-success btn-sm rounded-0"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.deleteProduct',['id'=>$item->id])}}" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Xóa bài viết này ?')"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                        <p>Không tồn tại bài viết nào</p>
                        @endif

                        </tbody>
                    </table>
                </form>

                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
