<div class="form-group">
        <label for="exampleSelectGender">Category</label>
        <select class="form-control" name="category_id" id="category_id">
        <option value=""> Select Category</option>
            @foreach($categories as $category)
                <option  @if(old('category_id') == $category->id) selected @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
    <div class="form-group">
    <label for="exampleSelectGender">Author</label>
    <select class="form-control" name="author_id" id="author_id">
    <option value="">Select Author</option>
        @foreach($authors as $author)
            <option 
            @if(old('author_id') == $author->id) selected @endif
            value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
@error('author_id')
    <div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input value="{{ old('title', isset($post->title)?$post->title:null) }}"
        type="text" class="form-control" name="title" id="title" placeholder="Enter post title">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content" rows="4">{{ old('content', isset($post->content)? $post->content:null) }}</textarea>
    @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Image upload</label>
    <input type="file" name="image" id="image" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="Upload Image">
        <span class="input-group-append">
    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
    </span>
    </div>
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Status</label>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" 
            @if(old('status') == 'published') checked @endif
            class="form-check-input" name="status" id="published" value="published">
            Published
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio"
            @if(old('status') == 'unpublished') checked @endif
            class="form-check-input" name="status" id="unpublished" value="unpublished">
            Un-Published
        </label>
    </div>
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Featured</label>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" 
            @if(old('status') == 1 ) checked @endif
            class="form-check-input" name="is_featured" id="published" value="1">
            Yes
        </label>
    </div>
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>