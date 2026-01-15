







        <style>
            body {
                background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
                min-height: 100vh;
            }
            .product-card {
                overflow: hidden;
                border: none;
                border-radius: 1rem;
                transition: all 0.4s ease;
            }
            .product-card:hover {
                transform: translateY(-15px);
                box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
            }
            .card-img-top {
                height: 250px;
                object-fit: cover;
                transition: transform 0.5s ease;
            }
            .product-card:hover .card-img-top {
                transform: scale(1.1);
            }
            .price-badge {
                font-size: 1.25rem;
                font-weight: bold;
            }
            .old-price {
                text-decoration: line-through;
                color: #999;
                font-size: 0.9rem;
            }
            .floating-add {
                position: fixed;
                bottom: 30px;
                right: 30px;
                z-index: 1000;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            }
            #imagePreview {
                max-height: 200px;
                object-fit: cover;
                border-radius: 0.5rem;
                margin-top: 10px;
            }
        </style>

        <div class="container py-5">

            <!-- Product Grid -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 assign_product_here "></div>
        </div>

        <!-- Floating Add Button -->
        <button type="button" class="btn bg-primary btn-lg floating-add text-white " data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus fs-3"></i>
        </button>

        <!-- Add Product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content rounded-4 shadow-lg">
                    <div class="modal-header bg-primary text-white rounded-top">
                        <h5 class="modal-title" id="addProductModalLabel">নতুন প্রোডাক্ট যোগ করুন</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">প্রোডাক্টের নাম</label>
                                    <select name="product_name" id="product_name" class="form-control product_name" required>
                                        <option value="" disabled selected>প্রোডাক্ট নির্বাচন করুন</option>
                                        <?php foreach ($products as $pd) { ?>
                                            <option value="<?php echo $pd->id; ?>"><?php echo $pd->product_name; ?> - <?php echo $pd->product_model; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">দাম (৳)</label>
                                    <input type="text" class="form-control product_buy_price" placeholder="35000" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">প্রোডাক্টের পরিমাণ</label>
                                    <input type="text" class="form-control product_buy_qnty" placeholder="উদাহরণ: 50" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">প্রতিদিনের লাভের পার্সেন্টেজ</label>
                                    <input type="text" class="form-control daily_profits_percent" placeholder="1.5" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">প্রতিদিনের লাভ</label>
                                    <input type="text" class="form-control daily_profits_amount" placeholder="উদাহরণ: 50" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">লাভ কতোদিন দিবেন?</label>
                                    <input type="text" class="form-control continue_days" placeholder="150" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3 product_calculation">
                                    <!-- <div class="alert alert-success text-danger fw-bold text-center  "></div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger rounded-pill text-white " data-bs-dismiss="modal">বাতিল</button>
                        <button type="button" class="btn bg-success rounded-pill text-white addProductBuyInfos ">যোগ করুন</button>
                    </div>
                </div>
            </div>
        </div>

            <!-- Edit Product Modal -->
        <div class="modal fade" id="editProductModalThis" tabindex="-1" aria-labelledby="editProductModalThisLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalThisLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div>
            </div>
        </div>


        <script>
            // <p class="price-badge text-danger text-end"><del>৳৮,৫০০</del></p>
            function getAllProductBuyIno() {
                $.ajax({
                    type: "get",
                    url: "lead/getAllProductBuyIno",
                    data: "",
                    dataType: "json",
                    success: function (resp) {
                        let html = '';
                        resp.forEach(function(item) {
                            html += `<div class="col">
                                        <div class="card h-100 product-card shadow-lg bg-white">
                                            <div class="position-relative">
                                                <img src="${item.image_thumb}" class="card-img-top" alt="${item.product_name}">
                                                <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 rounded-start m-2 fw-bold">${item.product_in_stock}/${item.product_buy_qnty}</span>
                                                <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1 rounded-start m-2 fw-bold">${item.daily_profits_amount} × ${item.continue_days}</span>
                                            </div>
                                            <div class="card-body d-flex flex-column editProductThis" style="cursor: pointer; " data-bs-toggle="modal" data-bs-target="#editProductModalThis" product_id="${item.id}" >
                                                <h5 class="card-title fw-bold">${item.product_name}</h5>
                                                <p class="card-text text-muted flex-grow-1">${item.product_model}</p>
                                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                                    <p class="price-badge text-primary text-start">৳${item.selling_pricess}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        });
                        $('.assign_product_here').html(html);
                    }
                });
            }

            $(document).ready(function() {
                getAllProductBuyIno();

                $(document).on('click', '.editProductThis', function() {
                    const productId = $(this).attr('product_id');

                    $.ajax({
                        type: "post",
                        url: "lead/single_product_buy_profile_info",
                        data: { product_id: productId },
                        dataType: "json",
                        success: function (resp) {
                            let modalBody = `
                                <div class="modal-header">
                                    <h5 class="modal-title">${resp.product_name}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body
                                    <img src="${resp.image_thumb}" class="img-fluid mb-3" alt="${resp.product_name}">
                                    <p><strong>মডেল:</strong> ${resp.product_model}</p>
                                    <p><strong>বিবরণ:</strong> ${resp.product_description}</p>
                                    <p><strong>মূল্য:</strong> ৳${resp.selling_pricess}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            `;
                            $('#editProductModalThis .modal-content').html(modalBody);
                        }
                    });
                });

                $(document).on('click', '.addProductBuyInfos', function () {
                    const productName = $('.product_name').val();
                    const productBuyPrice = $('.product_buy_price').val();
                    const productBuyQnty = $('.product_buy_qnty').val();
                    const dailyProfitsPercent = $('.daily_profits_percent').val();
                    const dailyProfitsAmount = $('.daily_profits_amount').val();
                    const continueDays = $('.continue_days').val();

                    $.ajax({
                        type: "post",
                        url: "lead/add_product_buy_info",
                        data: {
                            product_id: productName,
                            product_buy_price: productBuyPrice,
                            product_buy_qnty: productBuyQnty,
                            daily_profits_percent: dailyProfitsPercent,
                            daily_profits_amount: dailyProfitsAmount,
                            continue_days: continueDays
                        },
                        dataType: "json",
                        success: function (resp) {
                            if (resp.status === 'success') {
                                getAllProductBuyIno();
                                $('#addProductModal').modal('hide');
                                Swal.fire({
                                    title: "সফল!",
                                    text: "নতুন প্রোডাক্ট সফলভাবে যোগ করা হয়েছে!",
                                    icon: "success",
                                    draggable: true,
                                    position: "top-end",
                                    timer: 2500
                                });
                            } else {
                                toastr.warning(resp.message);
                            }
                        },
                        error: function () {
                            toastr.error('An error occurred while adding the product.');
                        }
                    });
                });


                $(document).on('keyup', '.product_buy_price, .product_buy_qnty, .daily_profits_percent, .daily_profits_amount, .continue_days', function () {
                    const productBuyPrice = parseFloat($('.product_buy_price').val()) || 0;
                    const productBuyQnty = parseFloat($('.product_buy_qnty').val()) || 0;
                    const dailyProfitsPercent = parseFloat($('.daily_profits_percent').val()) || 0;
                    const dailyProfitsAmount = parseFloat($('.daily_profits_amount').val()) || 0;
                    const continueDays = parseFloat($('.continue_days').val()) || 0;

                    let perDayProfitAmnt = (productBuyPrice * dailyProfitsPercent) / 100;
                    let perDay_profitAmnt = productBuyPrice / continueDays;
                    let totalProfitPerProduct = dailyProfitsAmount * continueDays;
                    let percentageCheck = (perDay_profitAmnt / productBuyPrice) * 100;


                            // (আপনার দেওয়া পরিমাণের সাথে পার্সেন্টেজ মিলছে: ${percentageCheck.toFixed(6)}%) <br>
                            // প্রতি প্রোডাক্টের জন্য দৈনিক লাভের পরিমাণ: ৳${perDay_profitAmnt.toFixed(6)} <br>

                    $('.product_calculation').html(`
                        <div class="alert alert-success text-danger fw-bold text-center  ">
                            প্রতি প্রোডাক্টের মোট লাভ: ৳${totalProfitPerProduct.toFixed(6)} <br>
                            প্রতি প্রোডাক্টের জন্য দৈনিক লাভের হিসাব: ৳${perDayProfitAmnt.toFixed(6)}
                        </div>
                    `);

                });

            });
        </script>



