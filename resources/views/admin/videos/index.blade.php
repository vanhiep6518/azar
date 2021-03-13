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
                        Thêm
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.addVideo')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Video id</label>
                                <input class="form-control @error('video_id') is-invalid @enderror" type="text" name="video_id" id="name" value="{{ old('video_id') }}">
                                @error('video_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                                <th scope="col">Video id</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($listCat))
                                @foreach($listCat as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            <strong>{{$item->video_id}}</strong>
                                        </td>
                                        <td class="feature">
                                            <a data-id="{{$item->id}}" class="btn btn-success btn-sm rounded-0 text-white btn-edit" type="button" ><i class="fa fa-edit"></i></a>
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
    <script src="{{asset('js/admin/video.js')}}"></script>
@endsection
