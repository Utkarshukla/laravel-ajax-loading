@foreach ($products as $product)
    <div class="product col p-2">
        <x-product-card :title="$product->name" :imageSrc="$product->image_path" :priceRange="$product->price" buttonText="Add to Cart" />
    </div>
@endforeach

<div id="pagination">
    {{ $products->links() }}
</div>
