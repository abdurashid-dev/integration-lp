<div class="mb-3">
    <label for="nameInput" class="form-label">Name</label>
    <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name') ?? $technology->name}}">
</div>
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
<div class="mb-3">
    <label for="linkInput" class="form-label">Link</label>
    <input type="text" class="form-control" id="linkInput" name="link" value="{{old('link') ?? $technology->link}}">
</div>
@error('link')
<span class="text-danger">{{$message}}</span>
@enderror
<button type="submit" class="btn btn-primary float-right">Save!</button>
