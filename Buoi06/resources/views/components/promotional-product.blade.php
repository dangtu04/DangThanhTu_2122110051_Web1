<section class="product my-3">
  <div class="container">
    <div class="section-header">
     <h1>Sản phẩm khuyến mãi</h1>
    </div>
    <div class="row">
      @foreach ($product_sale as $product_item)
          <x-card-product-sale :productitem="$product_item"/>  
      @endforeach
    </div>
  </div>
</section>
