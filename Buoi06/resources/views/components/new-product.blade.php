<section class="product my-3">
    <div class="container">
      <div class="section-header">
        <h1> Sản phẩm mới nhất</h1>
      </div>
      <div class="row">
        @foreach ($product_new as $product_item)
            <x-card-product :productitem="$product_item"/>  
        @endforeach

        
      </div>
    </div>
  </section>

