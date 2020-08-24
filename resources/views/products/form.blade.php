<div class="c-post--imageBox">
  {{-- <input type="file" name="photo" value="{{ $product->photo ?? old('photo') }}"> --}}
  <product-img-preview
    
  >

  </product-img-preview>
</div>
<label for="title">Title</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="30文字以内で入力してください"  name="title" value="{{ $product->title ?? old('title') }}">
</div>
<label for="review">Review</label>
<div class="c-post">
  <textarea name="review" id="" cols="30" rows="10" class="c-form--control" placeholder="200文字以内で入力してください" >{{ $product->review ?? old('review') }}</textarea>
</div>
<label for="price">Price</label>
<div class="c-post">
  <input type="number" class="c-form--control" placeholder="半角数字で入力してください"  name="price" value="{{ $product->price ?? old('peice') }}">
</div>
<label for="tags">Tags</label>
  <div class="c-post">
    <product-tags-input
      :initial-tags='@json($tagNames ?? [])'
      :autocomplete-items='@json($allTagNames ?? [])'
    >
      
    </product-tags-input>
  </div>
<label for="url">Url</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="https://◯◯◯.com"  name="url" value="{{ $product->url ?? old('url') }}">
</div>
