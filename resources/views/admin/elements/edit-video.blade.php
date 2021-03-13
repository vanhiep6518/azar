<div class="card-header font-weight-bold">
    Chỉnh sửa
</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('admin.updateVideo',['id'=>$video->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Video id</label>
            <input class="form-control @error('video_id') is-invalid @enderror" type="text" name="video_id" id="name" value="{{ $video->video_id }}">
            @error('video_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
