<meta name="twitter:card" content="summary" />
<meta property="og:url" content="{{ route('products.show', ['id' => $product->id]) }}" />
<meta property="og:title" content="{{ $product->title }}" />
<meta property="og:description" content="{{ strip_tags($product->review) }}" />
<meta property="og:image" content="https://minimum-share.app/{{$product->photo}}." />