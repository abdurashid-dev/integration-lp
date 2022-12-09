<div>
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <label for="nameInput" class="form-label">Package name</label>
            <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name') ?? $item->name}}">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12 mb-3">
            <label for="priceInput" class="form-label">Price</label>
            <input type="number" class="form-control" id="priceInput" name="price"
                   value="{{old('price') ?? $item->price}}">
            @error('price')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12 mb-3">
            <label for="imageInput" class="form-label">Images</label>
            <input type="file" multiple class="form-control" id="imageInput" name="images[]">
            @error('images[]')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12 mb-3">
            <label for="linkInput" class="form-label">Link</label>
            <input type="text" class="form-control" id="linkInput" name="link"
                   value="{{old('link') ?? $item->link}}">
            @error('link')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <label for="floatingTextarea">Comments</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                          name="description"></textarea>
            </div>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label>Package type</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio1"
                       value="free">
                <label class="form-check-label" for="inlineRadio1">Free</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                       value="premium">
                <label class="form-check-label" for="inlineRadio2">Premium</label>
            </div>
            <br>
            @error('type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <button class="btn btn-primary float-right">Save!</button>
</div>
