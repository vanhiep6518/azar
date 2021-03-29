@extends('admin.layouts.app')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm Sản phẩm
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{route('admin.saveProduct')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Mã sản phẩm</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="inputPassword4" value="{{ old('code') }}">
                            @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Giá</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="inputEmail4" value="{{ old('price') }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Mô tả ngắn</label>
                        <textarea id="short_desc" class="form-control @error('short_desc') is-invalid @enderror" name="short_desc">{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Chi tiết sản phẩm</label>
                        <textarea id="mytextarea" class="form-control @error('detail') is-invalid @enderror" name="detail">{{ old('detail') }}</textarea>
                        @error('detail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="fileupload">Ảnh Sản phẩm</label><br>
                    <input id="fileupload" name="file[]" type="file" multiple="multiple" />
                    <br>
                    <br />
                    <b>Live Preview</b>
                    <br />
                    <div id="dvPreview">
                    </div>
                    <hr />

                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control w-25 @error('project_cat') is-invalid @enderror" id="" name="project_cat">
                            <option value="">Chọn danh mục</option>
                            @if(!empty($listCat))
                                @foreach($listCat as $item)
                                    <option @if ($item->id == old('project_cat'))
                                        selected
                                    @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('project_cat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="2" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Chờ duyệt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1">
                            <label class="form-check-label" for="exampleRadios2">
                                Công khai
                            </label>
                        </div>
                        @error('status')
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
@endsection
@section('custom-js')
    <script>
        var editor_config = {
            path_absolute : "/",
            height: 500,
            selector: '#mytextarea',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script src="{{asset('js/admin/project.js')}}"></script>
@endsection
