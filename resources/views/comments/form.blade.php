<label for="title">Title</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="30文字以内で入力してください"  name="title"   value="{{ $comment->title ?? old('title')}}">
</div>
<label for="star">Star</label>
<div class="c-post u-mb_xl">
  <comment-star
    rating={{ $comment->star ?? old('star')}}
  >

  </comment-star>
</div>
<label for="review">Comment</label>
<div class="c-post">
  <textarea name="body" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="300文字以内で入力してください" >{{ $comment->body ?? old('body') }}</textarea>
</div>

