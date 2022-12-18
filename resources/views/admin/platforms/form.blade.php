<div class="mb-3">
    <label for="nameInput" class="form-label">Name</label>
    <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name') ?? $item->name}}">
</div>
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
<div class="mb-3">
    <label for="linkInput" class="form-label">Link</label>
    <input type="text" class="form-control" id="linkInput" name="link" value="{{old('link') ?? $item->link}}">
</div>
@error('link')
<span class="text-danger">{{$message}}</span>
@enderror
<div class="mb-3">
    <label for="imageInput" class="form-label">Image</label>
    <input type="file" class="form-control" id="imageInput" name="image">
</div>
@error('image')
<span class="text-danger">{{$message}}</span>
@enderror
<button type="submit" class="btn btn-primary float-right">Save!</button>
