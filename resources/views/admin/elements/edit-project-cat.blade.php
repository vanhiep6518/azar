<div class="card-header font-weight-bold">
    Chỉnh sửa danh mục
</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('admin.updateProjectCat',['id'=>$projectCat->id])}}" method="POST">
        @csrf
        @error('error')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input class="form-control" required type="text" name="name" id="name" value="{{$projectCat->name}}">
        </div>
        <div class="form-group">
            <label for="slug">Đường dẫn danh mục</label>
            <input class="form-control" required type="text" name="slug" id="name" value="{{ $projectCat->slug }}"
                   data-placement="bottom" data-toggle="tooltip" data-original-title="Bạn có thể bỏ trống.Đường dẫn sẽ được thay thế bằng tên danh mục">
        </div>
        <div class="form-group">
            <label for="">Danh mục cha</label>
            <select class="form-control" name="parent_id" id="">
                <option value="0">Chọn danh mục</option>
                @if(!empty($listCat))
                    @foreach($listCat as $item)
                        <option @if($item->id == $projectCat->parent_id && $projectCat->level != 0) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
