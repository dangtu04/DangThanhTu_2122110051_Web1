<section class="bg-white text-dark mt-3 py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <h3>BÀI VIẾT MỚI</h3>
            <div class="row">
               <div class="col-md-12">

                 @foreach ($post_new as $post)
                    <div class="row mb-3">
                       <div class="col-md-4">
                          <a href="/chi-tiet-bai-viet/{{ $post->slug }}" class="post-link">
                             <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->image }}" />
                          </a>
                       </div>
                       <div class="col-md-8">
                          <h3 class="post-title fs-5">
                             <a href="/chi-tiet-bai-viet/{{ $post->slug }}" class="post-link">
                                {{ $post->title }}
                             </a>
                          </h3>
                          <p>{{ $post->detail }}</p>
                       </div>
                    </div>
                 @endforeach

               </div>
            </div>
         </div>
      </div>
   </div>
</section>
