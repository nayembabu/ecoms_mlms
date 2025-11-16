


  <style>
    .hover-scale {
      transition: all 0.3s ease;
    }
    .hover-scale:hover {
      transform: scale(1.1);
    }
    .hover-lift {
      transition: all 0.3s ease !important;
    }
    .hover-lift:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }
    .product-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      position: relative;
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .product-img img {
      width: 100%;
      height: 230px;
      object-fit: cover;
      transition: all 0.4s ease;
    }
    .product-card:hover img {
      transform: scale(1.05);
    }
    .stock-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: rgba(120, 7, 133, 0.9);
      color: #ffffffff;
      font-weight: 600;
      font-size: 14px;
      padding: 5px 10px;
      border-radius: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }
    .profit-tag {
      position: absolute;
      top: 10px;
      left: 10px;
      background: rgba(4, 91, 52, 0.9);
      color: #fff;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 14px;
      font-weight: 500;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    .add-to-cart-btn {
      position: absolute;
      bottom: 15px;
      right: 10px;
      opacity: 0;
      transition: all 0.3s ease;
    }
    .product-card:hover .add-to-cart-btn {
      opacity: 1;
    }
  </style>


  <section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container mt-2 ">
      <h2 class="text-center">All Products</h2>
      <div class="row align-items-center mb-2 mt-4 ">
        <div class="col-md-6">
          <input type="text" id="product-search" class="form-control rounded-3" placeholder="Search products..." >
        </div>
        <div class="col-md-6">
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary rounded-3" id="sort-low-high">
              <i class="fas fa-arrow-up"></i> Low to High
            </button>
            <button class="btn btn-outline-secondary rounded-3" id="sort-high-low">
              <i class="fas fa-arrow-down"></i> High to Low
            </button>
          </div>
        </div>
      </div>
      <div id="product-list"></div>
    </div>
  </section>



  <script>
    let allProducts = [];

    function get_all_products() {
      $.ajax({
        type: "post",
        url: "user/getAllProducts",
        data: "",
        dataType: "json",
        success: function (res) {
          allProducts = res.all_products;
          renderProducts(allProducts);
        }
      });
    }

    $('#sort-low-high').click(function() {
      allProducts.sort((a, b) => parseFloat(a.selling_pricess) - parseFloat(b.selling_pricess));
      renderProducts(allProducts);
    });

    $('#sort-high-low').click(function() {
      allProducts.sort((a, b) => parseFloat(b.selling_pricess) - parseFloat(a.selling_pricess));
      renderProducts(allProducts);
    });

    $('#product-search').on('keyup', function() {
      let query = $(this).val().toLowerCase();
      let filtered = allProducts.filter(p => p.product_name.toLowerCase().includes(query));
      renderProducts(filtered);
    });

    function renderProducts(products) {
      let html_view = '';
      products.forEach(product => {
        html_view += `<div class="col-md-3 my-4">
                        <div class="card product-card">
                          <div class="product-img">
                            <img src="${product.image_thumb}" alt="Product">
                            <span class="stock-badge">${product.product_in_stock}/${product.product_buy_qnty}</span>
                            <span class="profit-tag fw-bold">Profit: ৳ (${product.daily_profits_amount}×${product.continue_days})</span>
                          </div>
                          <div class="card-body">
                            <h3 class="fw-semibold mb-1">${product.product_name.split(' ').slice(0, 2).join(' ')}</h3>
                            <div class="price mb-2 fs-5">৳ <span>${product.selling_pricess}</span> <del>৳ <span class="text-danger">${parseFloat(product.selling_pricess) + (parseFloat(product.selling_pricess)*20/100)}</span></del></div>
                            <div class="d-flex gap-2">
                              <button class="btn btn-primary bg-primary text-white btn-sm flex-fill fw-bold rounded-3 buy_this_products_single" data_product_id="${product.id}" data_buying_id="${product.product_buying_info_idd}"><i class="fas fa-shopping-bag me-1"></i> Buy Now</button>
                              <button class="btn btn-outline-dark btn-sm bg-dark text-white view_this_products" data-bs-toggle="modal" data-bs-target="#products_view_modal" data_product_id="${product.id}" data_buying_id="${product.product_buying_info_idd}" ><i class="fas fa-eye"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>`;
      });
      $('#product-list').html(`<div class="row mb-4">${html_view}</div>`);
    }
    get_all_products();

    $(document).on('click', '.view_this_products', function () {

      let product_id = $(this).attr('data_product_id');
      let buying_id = $(this).attr('data_buying_id');

      $.ajax({
        type: "post",
        url: "user/getSingleProductDetails",
        data: { product_id: product_id, buying_id: buying_id },
        dataType: "json",
        success: function (res) {
          $('#products_view_modal .modal-title').text(res.product_details.product_name);
          let modalBody = `<div class="container-fluid">
                            <div class="row g-4">
                              <!-- Product Image Section -->
                              <div class="col-md-6">
                                <div class="product-image-container position-relative">
                                  <img id="main-product-image" src="${res.product_details.image_thumb}" alt="Product Image" class="img-fluid rounded-4 shadow-lg" style="width: 100%; height: 450px; object-fit: cover;">
                                  <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-lg rounded-circle shadow-sm hover-scale">
                                      <i class="fas fa-heart text-danger fs-5"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>

                              <!-- Product Details Section -->
                              <div class="col-md-6">
                                <!-- Title -->
                                <h2 id="product-title" class="fw-bold fs-2 text-dark" style="letter-spacing: -0.5px;">${res.product_details.product_name}</h2>

                                <!-- Price Section -->
                                <div class="price-section p-4 bg-gradient rounded-4 shadow-md" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                  <p class="text-dark-50 mb-2 small">Current Price</p>
                                  <h3 class="text-dark fw-bold mb-2">৳ <span id="selling-price" class="fs-1">${res.product_details.selling_pricess}</span> <span class=" " style="margin-left: 10px;"> <del class=" text-dark-50 fs-6">৳ <span id="original-price" style="text-decoration: line-through; color: red; ">${parseFloat(res.product_details.selling_pricess) + (parseFloat(res.product_details.selling_pricess)*20/100)}</span></del></span></h3>
                                </div>

                                <!-- Stock Section -->
                                <div class="stock-section mb-4 p-2 bg-light rounded-4 border-start border-5 border-success">
                                  <div class="row">
                                    <div class="col-6">
                                      <p class="mb-2 text-muted small">📦 Stock Status</p>
                                      <p class="mb-0"><span id="stock-status" class="badge bg-success fs-6 px-3 py-2">${res.product_details.product_in_stock}</span></p>
                                    </div>
                                    <div class="col-6">
                                      <p class="mb-2 text-muted small">✓ Available Quantity</p>
                                      <p class="mb-0"><span id="stock-count" class="fw-bold text-success fs-5">${res.product_details.product_in_stock}/${res.product_details.product_buy_qnty}</span></p>
                                    </div>
                                  </div>
                                </div>


                                <!-- Profit Section -->
                                <div class="profit-section mb-4 p-4 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                  <h5 class="fw-bold mb-3 text-white"><i class="fas fa-dollar-sign me-2"></i>Daily Profit Opportunity</h5>
                                  <div class="d-flex align-items-center">
                                    <div>
                                      <p class="mb-1 text-white-50 small">Profit Amount</p>
                                      <p class="mb-0 text-white fs-4 fw-bold">৳ <span id="daily-profit">${res.product_details.daily_profits_amount}</span></p>
                                    </div>
                                    <div class="ms-auto text-end">
                                      <p class="mb-1 text-white-50 small">Duration</p>
                                      <p class="mb-0 text-white fs-4 fw-bold"><span id="continue-days">${res.product_details.continue_days}</span> Days</p>
                                    </div>
                                  </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="action-buttons gap-3 d-flex">
                                  <button class="btn btn-primary btn-lg flex-fill rounded-4 fw-bold shadow-lg hover-lift buy_this_products_single" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; transition: all 0.3s ease;" data_product_id="${res.product_details.id}" data_buying_id="${res.product_details.product_buying_info_idd}" >
                                    <i class="fas fa-shopping-bag me-2"></i> Buy Now
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>`;
          $('#products_view_modal .modal-body').html(modalBody);
        }
      });

    });


    $(document).on('click', '.buy_this_products_single', function () {
      let product_id = $(this).attr('data_product_id');
      let buying_id = $(this).attr('data_buying_id');
      if (confirm("Are you sure?") == true) {
        $.ajax({
          type: "post",
          url: "user/buySingleProducts",
          data: { product_id: product_id, buying_id: buying_id },
          dataType: "json",
          success: function (res) {
            if (res.status == 'success') {
              assign_wallet_balance();
              Swal.fire({
                title: "Nice! " + res.message,
                icon: "success",
                draggable: true
              });
              setTimeout(() => location.reload(), 5000);
            } else if (res.status == 'error') {
              assign_wallet_balance();
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Opps " + res.message,
              });
            }
          }
        });
      } else {
        return false;
      }

    });

  </script>


  <!-- Modal -->
  <div class="modal fade" id="products_view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>


