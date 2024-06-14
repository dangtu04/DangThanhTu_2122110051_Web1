<div class="col-lg-3">
  <div class="card my-2 product-item" style="width: 19rem;">
    <img src="./image/ao-unisex-form-rong-nam-nu.webp" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text text-main fs-5"><del class="text-dark fs-6">{{ $product->price }}₫</del> {{ $product->pricesale }}₫</p>
      <div class="row">
        <div class="col-5">
          <a href="#" class="btn bg-main text-white">Mua ngay</a>
        </div>
        <div class="col-7">
          <a href="chi-tiet-san-pham/{{ $product->slug }}" class="btn bg-light text-main product-showdetail">
            <i class="fa-regular fa-eye"></i>
            Xem chi tiết</a>
        </div>
      </div>
    </div>
  </div>
</div>
