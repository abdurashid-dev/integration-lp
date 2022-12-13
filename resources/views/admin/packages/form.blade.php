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
            <label for="technologies" class="form-label">Technologies</label>
            <select name="technologies[]" id="technologies" class="form-control" multiple="multiple">
                @foreach($technologies as $technology)
                    <option value="{{$technology->id}}"
                            @foreach($item->technologies as $item_technology)
                                @if($item_technology->technology_id == $technology->id) selected @endif
                        @endforeach
                    >{{$technology->name}}</option>
                @endforeach
            </select>
            @error('technologies')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12 mb-3">
            <label for="platforms" class="form-label">Platforms</label>
            <select name="platforms[]" id="platforms" class="form-control" multiple="multiple">
                @foreach($platforms as $platform)
                    <option value="{{$platform->id}}"
                            @foreach($item->platforms as $item_platform)
                                @if($item_platform->platform_id == $platform->id) selected @endif
                        @endforeach
                    >{{$platform->name}}</option>
                @endforeach
            </select>
            @error('platforms')
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
                <label for="editor">Comments</label>
                <textarea class="form-control" placeholder="Leave a comment here"
                          id="editor"
                          name="description">{!!old('description') ?? $item->description!!}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label>Package type</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio1"
                       value="free" @if($item->type == 'free') checked @endif>
                <label class="form-check-label" for="inlineRadio1">Free</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                       value="premium" @if($item->type == 'premium') checked @endif>
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
