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
                    <a href="{{route('admin.order',['status'=> 3])}}" class="text-primary">Thành công<span class="text-muted">({{$numberStatus['success']}})</span></a>
                    <a href="{{route('admin.order',['status'=> 2])}}" class="text-primary">Đang vận chuyển<span class="text-muted">({{$numberStatus['waiting']}})</span></a>
                    <a href="{{route('admin.order',['status'=> 1])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{$numberStatus['confirm']}})</span></a>
                    <a href="{{route('admin.order',['status'=> 4])}}" class="text-primary">Thùng rác<span class="text-muted">({{$numberStatus['trash']}})</span></a>
                </div>
                <form action="{{route('admin.actionOrder')}}" method="POST">
                    @csrf
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="" name="action">
                            <option value="">Chọn</option>
                            <option value="3">Thành công</option>
                            <option value="2">Đang vận chuyển</option>
                            <option value="1">Chờ duyệt</option>
                            @if (request()->segment(4) != 4)
                            <option value="4">Xóa</option>
                            @else
                            <option value="5">Xóa vĩnh viễn</option>
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
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số sản phẩm</th>
                            <th scope="col">Tổng giá</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Chi tiết</th>
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
                                    <td>
                                        <a href="" class="customer-info" data-id="{{$item->id}}" data-toggle="modal" data-target="#modalCustomerInfo">{{$item->customer->name}}</a>
                                    </td>
                                    <td>{{$item->order_number}}</td>
                                    <td>{{currency_format($item->total_price)}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                    <td><a href="{{route('admin.orderDetail',['id' => $item->id])}}">Chi tiết</a></td>
                                    <td>
                                        <a href="{{route('admin.deleteOrder',['id'=>$item->id])}}" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Xóa bài viết này ?')"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                        <p>Không tồn tại đơn hàng nào</p>
                        @endif

                        </tbody>
                    </table>
                </form>

                {{ $projects->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCustomerInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tên khách hàng: <b>sdfsdf</b></p>
                    <p>Số đt: <b>sdfsdf</b></p>
                    <p>Email: <b>sdfsdf</b></p>
                    <p>Địa chỉ <b>sdfsdf</b></p>
                    <p>Ghi chú: <b>sdfsdf</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{asset('js/admin/order.js')}}"></script>
@endsection
