<!-- <?php
    echo "<pre>";
    print_r($products);
    echo "</pre>";
?> -->

<!--
    *** Must logged in to view products
    * View products by categories
    * just view products and buy option
    * buy option will be done after amount added in wallet
    * after amount added in wallet then buy option will be done
    * buy option will be done in single product details page
    * single product details page route will be
        /user/singleProduct?id=19  (get method)
    * (product_buying_info_idd => এর উপর বেস করে রাউট বানান)
-->



<style>
  /* ===================== Section Header Style ===================== */
  .category-section { margin-bottom: 4rem; }
  .category-header {
    background: linear-gradient(90deg, #7b2ff7, #f107a3, #ff5858);
    background-size: 300% 300%;
    animation: hueFlow 6s ease infinite;
    color: #fff;
    text-align: center;
    padding: 2rem 1rem;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0,0,0,.15);
  }
  @keyframes hueFlow {
    0%{ background-position:0% 50%; }
    50%{ background-position:100% 50%; }
    100%{ background-position:0% 50%; }
  }

  /* ===================== Product Card ===================== */
  .product-card {
    border: 0;
    border-radius: 1.25rem;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,.08);
    transition: all .4s ease;
  }
  .product-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,.12);
  }
  .product-img {
    height: 200px;
    object-fit: cover;
    width: 100%;
  }

  /* ===================== Buttons ===================== */
  .btn-gradient {
    background: linear-gradient(45deg,#f107a3,#7b2ff7);
    border: 0;
    color: #fff;
    transition: all .3s ease;
    border-radius: 50rem;
    font-weight: 600;
    letter-spacing: .3px;
    box-shadow: 0 4px 10px rgba(0,0,0,.2);
  }
  .btn-gradient:hover {
    background: linear-gradient(45deg,#7b2ff7,#f107a3);
    transform: scale(1.05);
  }

  /* 🖥️ Desktop View */
  .btn-gradient {
    font-size: 1rem;
    padding: 0.7rem 1.8rem;
    margin: .25rem;
  }

  /* 📱 Mobile View */
  @media (max-width: 768px) {
    .btn-gradient {
      display: block;
      width: 100%;
      font-size: .9rem;
      padding: .6rem 1rem;
      margin: .3rem 0;
    }
  }

  /* ===================== Price Display ===================== */
  .price-area {
    font-size: 1.1rem;
  }
  .price-old {
    color: #999;
    text-decoration: line-through;
    margin-right: .5rem;
  }
  .price-new {
    color: #f107a3;
    font-weight: 700;
  }
  .stock-info {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 10px;
  }

  /* ===================== Animation ===================== */
  @keyframes fadeIn {
    from {opacity:0; transform: translateY(15px);}
    to {opacity:1; transform: translateY(0);}
  }
  .fadeIn { animation: fadeIn .6s ease forwards; }
</style>


<section class="py-5 container-fluid-lg">
  <?php 
  // ===================== Group Products by Category =====================
  $grouped = [];
  foreach($products as $p){
    $grouped[$p->cat_names][] = $p;
  }

  // ===================== Render Each Category Section =====================
  foreach($grouped as $category => $items): 
  ?>
  
  <div class="category-section">
    <!-- Category Header -->
    <div class="category-header mb-4">
      <h2 class="fw-bold mb-0"><i class="fa-solid fa-motorcycle me-2"></i><?= esc($category) ?></h2>
      <p class="mb-0 fs-6"><?= esc($items[0]->cat_desc) ?></p>
    </div>

    <!-- Product Grid -->
    <div class="row g-4 justify-content-center">
      <?php foreach($items as $i => $product): 
        $originalPrice = $product->selling_pricess ?: $product->price;
        $discounted = !empty($product->discount_price) ? $product->discount_price : null;
      ?>
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 fadeIn" style="animation-delay:<?= $i*0.1 ?>s">
        <div class="card product-card h-100">
          <img src="<?= base_url($product->image_thumb) ?>" alt="<?= esc($product->product_name) ?>" class="product-img">
          <div class="card-body text-center p-4">

            <h5 class="fw-bold text-dark mt-2 mb-1"><?= esc($product->product_name) ?></h5>
            <p class="text-muted small mb-1"><?= esc($product->sub_cat_names) ?></p>
            <p class="stock-info">Stock Available: <strong><?= esc($product->product_in_stock) ?></strong></p>

            <!-- Price Section -->
            <div class="price-area mb-3">
              <?php if($discounted): ?>
                <span class="price-old">৳<?= esc($originalPrice) ?></span>
                <span class="price-new">৳<?= esc($discounted) ?></span>
              <?php else: ?>
                <span class="price-new">৳<?= esc($originalPrice) ?></span>
              <?php endif; ?>
            </div>

            <!-- Buttons -->
            <button 
              class="btn btn-gradient buyNowBtn"
              data-id="<?= $product->id ?>"
              data-name="<?= esc($product->product_name) ?>"
              data-price="<?= esc($discounted ?: $originalPrice) ?>">
              <i class="fa-solid fa-cart-plus me-1"></i> Buy Now
            </button>

            <a href="<?= base_url('/user/singleProduct?id='.$product->product_buying_info_idd) ?>"
              class="btn btn-gradient">
              <i class="fa-solid fa-eye me-1"></i> Single View
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php endforeach; ?>
</section>


<script>
$(document).ready(function(){
  // 🛒 SweetAlert for Buy Now
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
      background: '#fff',
      customClass: { popup: 'animated zoomIn' }
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
