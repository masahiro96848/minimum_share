@csrf
<div class="c-post--imageBox">
  <input type="file" name="photo" value="{{ old('photo') }}">
</div>
<label for="title">Title</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="30文字以内で入力してください"  name="title" value="{{ old('title') }}">
</div>
<label for="review">Review</label>
<div class="c-post">
  <textarea name="review" id="" cols="30" rows="10" class="c-form--control" placeholder="200文字以内で入力してください" value="{{ old('review') }}"></textarea>
</div>
<label for="price">Price</label>
<div class="c-post">
  <input type="number" class="c-form--control" placeholder="半角数字で入力してください"  name="price" value="{{ old('price') }}">
</div>
<label for="url">Url</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="https://◯◯◯.com"  name="url" value="{{ old('url') }}">
</div>
<button class="c-button--submit " type="submit">Post</button>