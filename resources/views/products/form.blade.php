<div class="c-post--imageBox">
  <product-img-preview
    set-image-data='{{$product->photo ?? ''}}'
    name="photo"
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
<label for="category">Category</label>
<div class="c-post c-post--inputWidth">
  <select name="category_id" class="c-form--control" id="">
    <option value="">選択してください</option>
    @foreach ($categories as $item => $value)
    <option value="{{ $value['id'] }}" {{ $value['id'] == old('category_id', $product->category_id ?? '') ? 'selected' : ''}}>{{ $value['name']}}</option>
    {{-- <option  value="{{ $value['id'] }}">{{ $value['name']  }}</option>     --}}
    {{-- @if(old('category_id') == $item) selected @endif --}}
    {{-- <option value="{{$value['id']}}" @if(old('category_id') == $value['id']) selected @endif>{{ $value['name']}}</option> --}}
    @endforeach
  </select>
</div>
<label for="tags">Tags</label>
  <div class="c-post">
    <product-tags-input
      :initial-tags='@json($tagNames ?? [])'
      :autocomplete-items='@json($allTagNames ?? [])'
    >
      
    </product-tags-input>
  </div>

{{-- {{dd($value['id'])}} --}}