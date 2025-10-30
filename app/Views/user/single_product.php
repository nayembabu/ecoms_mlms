<!-- <?php

    echo "<pre>";
    print_r ($single_product);
    echo "</pre>";

?> -->

<!--
    ১. এখানে পন্যের বিস্তারিত দেখাবে
    (পন্য ক্রয় করার জন্য রাউট হচ্ছে
        buySingleProduct
        post আকারে product_id = id পাঠালে হবে।
    )
-->




<style>
/* ===================== Product Page ===================== */
.single-view {
  background: linear-gradient(135deg,#f9f9fb,#eef1f7);
  padding: 60px 0;
}
.product-container {
  background: #fff;
  border-radius: 1.25rem;
  box-shadow: 0 10px 40px rgba(0,0,0,.1);
  overflow: hidden;
  animation: fadeIn .7s ease forwards;
}
.product-img {
  width: 100%;
  height: 420px;
  object-fit: cover;
  border-radius: 1.25rem 1.25rem 0 0;
}
.product-info {
  padding: 2rem;
}
.product-title {
  font-weight: 700;
  color: #222;
  font-size: 1.8rem;
}
.sub-text {
  font-size: 0.9rem;
  color: #666;
}
.price-section {
  margin: 1rem 0;
}
.price-old {
  color: #999;
  text-decoration: line-through;
  margin-right: .5rem;
  font-size: 1.1rem;
}
.price-new {
  color: #f107a3;
  font-size: 1.5rem;
  font-weight: 700;
}
.stock {
  color: #444;
  font-size: .95rem;
}
.category-box {
  background: linear-gradient(45deg,#7b2ff7,#f107a3);
  color: #fff;
  border-radius: .8rem;
  padding: 1rem;
  margin-top: 1.5rem;
}
.category-box p {
  margin: 0;
}

/* ===================== Buttons ===================== */
.btn-gradient {
  background: linear-gradient(45deg,#f107a3,#7b2ff7);
  border: 0;
  color: #fff;
  font-weight: 600;
  border-radius: 50rem;
  padding: .75rem 2rem;
  margin-right: .5rem;
  transition: all .3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,.15);
}
.btn-gradient:hover {
  background: linear-gradient(45deg,#7b2ff7,#f107a3);
  transform: scale(1.05);
}

/* ===================== Animation ===================== */
@keyframes fadeIn {
  from {opacity:0; transform: translateY(20px);}
  to {opacity:1; transform: translateY(0);}
}

/* ===================== Mobile Responsive ===================== */
@media (max-width:768px){
  .product-img{ height:280px; border-radius:1.25rem 1.25rem 0 0;}
  .product-info{ padding:1.2rem;}
  .product-title{ font-size:1.4rem;}
  .btn-gradient{ width:100%; margin-bottom:.6rem;}
}
</style>


<section class="single-view">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-11">
        <div class="product-container">

          <div class="row g-0 align-items-center">
            <!-- Product Image -->
            <div class="col-md-6">
              <img src="<?= esc($single_product->image_thumb) ?>" alt="<?= esc($single_product->product_name) ?>" class="product-img">
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
              <div class="product-info">
                <h2 class="product-title"><?= esc($single_product->product_name) ?></h2>
                <p class="sub-text mb-2"><?= esc($single_product->product_model) ?></p>
                <p class="stock">Stock Available: <strong><?= esc($single_product->product_in_stock) ?></strong></p>

                <div class="price-section">
                  <?php if(!empty($single_product->discount_price)): ?>
                    <span class="price-old">৳<?= esc($single_product->price) ?></span>
                    <span class="price-new">৳<?= esc($single_product->discount_price) ?></span>
                  <?php else: ?>
                    <span class="price-new">৳<?= esc($single_product->price) ?></span>
                  <?php endif; ?>
                </div>

                <p class="text-secondary mb-3">
                  <?= !empty($single_product->product_details) 
                      ? ($single_product->product_details) 
                      : 'No description available for this product.' ?>
                </p>

                <!-- Buttons -->
                <button 
                  class="btn btn-gradient buyNowBtn"
                  data-name="<?= esc($single_product->product_name) ?>"
                  data-price="<?= esc($single_product->discount_price ?: $single_product->price) ?>">
                  <i class="fa-solid fa-cart-plus me-1"></i> Buy Now
                </button>
                <!-- Category Info -->
                <div class="category-box mt-4">
                  <p><strong>Category:</strong> <?= esc($single_product->cat_names) ?></p>
                  <p><strong>Subcategory:</strong> <?= esc($single_product->sub_cat_names) ?></p>
                  <p><?= esc($single_product->cat_desc) ?></p>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  $('.buyNowBtn').click(function(){
    let name = $(this).data('name');
    let price = $(this).data('price');
    Swal.fire({
      title: 'Confirm Purchase?',
      html: `<b>${name}</b><br><span class="text-muted">Price: ৳${price}</span>`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Buy Now',
      cancelButtonText: 'Cancel',
      confirmButtonColor: '#7b2ff7',
      cancelButtonColor: '#aaa',
      background: '#fff'
    }).then((result) => {
      if(result.isConfirmed){
        Swal.fire({
          title: 'Success!',
          text: `${name} added to your cart.`,
          icon: 'success',
          confirmButtonColor: '#f107a3',
          timer: 1800,
          showConfirmButton: false
        });
      }
    });
  });
});
</script>

