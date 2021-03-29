{{--@php--}}
{{--dd($listCat);--}}
{{--@endphp--}}
@extends('admin.layouts.app')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-4">
                <div class="card cat-info">
                    <div class="card-header font-weight-bold">
                        Thêm danh mục
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.addProductCat')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Đường dẫn danh mục</label>
                                <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="name" value="{{ old('slug') }}"
                                       data-placement="bottom" data-toggle="tooltip" data-original-title="Bạn có thể bỏ trống.Đường dẫn sẽ được thay thế bằng tên danh mục">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">Chọn danh mục</option>
                                    @if(!empty($listCat))
                                        @foreach($listCat as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($listCat))
                                @foreach($listCat as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            <span class="pd-cat" title="Phụ Kiện">
                                            <strong>{{str_repeat("--- ",$item->level)}}{{$item->name}}</strong></span>
                                        </td>
                                        <td><span class="pd-cat" title="phu-kien">{{$item->slug}}</span></td>
                                        <td class="feature">
                                            <a data-id="{{$item->id}}" class="btn btn-success btn-sm rounded-0 text-white btn-edit" type="button" ><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.deleteProductCat',['id'=>$item->id])}}" data-id="{{$item->id}}" class="btn btn-danger btn-sm rounded-0 text-white btn-delete" type="button" onclick="return confirm('Dữ liệu bài viết sẽ bị xoá nếu bạn xoá danh mục này')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('custom-js')
    <script src="{{asset('js/admin/product.js')}}"></script>
@endsection
