<form class=" mb-5 m-auto" method="post" action="{{ route('create') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-lg-center">
        <div class="m-3 w-75">
            <label class="form-label"><b>Post</b></label>
            @error('body')
            <div class="m-2 w-75 alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" name="body" rows="5">{{old('body')}}</textarea>
        </div>
        <div class="mb-3 w-25 d-flex align-items-end">
            @error('image')
            <div class="mx-2 w-75 alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="" name="image" type="file" accept="image/*">
        </div>
    </div>
    <button style="width: 60px;" type="submit" class="btn btn-dark mx-3">Post</button>
</form>
