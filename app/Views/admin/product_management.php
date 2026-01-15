







<style>
    .product-img-thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 4px;
    }
    .btn-xs {
        padding: 0.6rem 0.6rem;
        font-size: 0.75rem;
        line-height: 1.2;
        border-radius: 0.25rem;
    }
</style>

<div class="d-flex">

    <!-- Main Content -->
    <div class="flex-grow-1">

        <!-- Main Content Area -->
        <main class="p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">সকল প্রোডাক্ট</h2>
                <button class="btn bg-primary text-white btn-lg " data-bs-toggle="modal" data-bs-target="#addModalForm" >
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>

            <!-- Filters & Stats -->
            <div class="row g-4 mb-4">
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-muted">মোট প্রোডাক্ট</h6>
                            <h3 class="total_product_set">0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Table -->
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">প্রোডাক্ট লিস্ট</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>নং</th>
                                    <th>ছবি</th>
                                    <th>প্রোডাক্টের নাম</th>
                                    <th>ক্যাটাগরি</th>
                                    <th>সাব-ক্যাটাগরি</th>
                                    <th>মডেল</th>
                                    <th>পন্য বিস্তারিত</th>
                                    <th>অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody class="assignProductInfo" ></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<br><br><br><br><br><br><br><br>

<!-- Add Modal -->
<div class="modal fade" id="addModalForm" tabindex="-1" aria-labelledby="addModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="addModalFormLabel">Add New Product Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>
                    <!-- Image Preview -->
                    <div class="mb-3 text-center">
                        <img id="previewImage" src="inc/front/assets/imgs/pd_black.png" class="img-thumbnail mb-2" style="max-height:150px;" >
                    </div>
                    <!-- Product Image -->
                    <div class="mb-3">
                        <label class="form-label">পণ্যের ছবি</label>
                        <input type="file" accept="image/*" class="form-control" onchange="previewImg(this)" >
                    </div>

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label">প্রোডাক্টের নাম</label>
                        <input type="text" class="form-control addProduct_name" placeholder="প্রোডাক্টের নাম লিখুন">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label">ক্যাটাগরি</label>
                        <select class="form-select addProduct_category">
                            <option selected>ক্যাটাগরি নির্বাচন করুন</option>
                            <?php foreach($categories as $cat): ?>
                                <option value="<?= $cat->cat_id; ?>"><?= $cat->cat_names; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="mb-3">
                        <label class="form-label">সাব-ক্যাটাগরি</label>
                        <select class="form-select addProduct_subcategory">
                            <option selected>সাব-ক্যাটাগরি নির্বাচন করুন</option>
                        </select>
                    </div>

                    <!-- Product Details -->
                    <div class="mb-3">
                        <label class="form-label">পণ্যের মডেল</label>
                        <input type="text" class="form-control addProduct_modelDetails" placeholder="প্রোডাক্টের মডেল লিখুন">
                    </div>

                    <!-- Product Details -->
                    <div class="mb-3">
                        <label class="form-label">পণ্য বিস্তারিত</label>
                        <textarea class="form-control addProduct_details" rows="4" placeholder="পণ্যের বিস্তারিত লিখুন"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a type="button" class="btn bg-secondary text-white " data-bs-dismiss="modal">Close</a>
                        <a type="button" class="btn bg-success text-white addNewProductBtn ">সংরক্ষণ করুন</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModalForm" tabindex="-1" aria-labelledby="editModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="editModalFormLabel">Edit Product Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div>
                    <!-- Image Preview -->
                    <div class="mb-3 text-center">
                        <img id="previewImage" src="inc/front/assets/imgs/pd_black.png" class="img-thumbnail mb-2" style="max-height:150px;" >
                    </div>
                    <!-- Product Image -->
                    <div class="mb-3">
                        <label class="form-label">পণ্যের ছবি</label>
                        <input type="file" accept="image/*" class="form-control" onchange="previewImg(this)" >
                    </div>

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label">প্রোডাক্টের নাম</label>
                        <input type="text" class="form-control addProduct_name" placeholder="প্রোডাক্টের নাম লিখুন">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label">ক্যাটাগরি</label>
                        <select class="form-select addProduct_category">
                            <option selected>ক্যাটাগরি নির্বাচন করুন</option>
                            <?php foreach($categories as $cat): ?>
                                <option value="<?= $cat->cat_id; ?>"><?= $cat->cat_names; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="mb-3">
                        <label class="form-label">সাব-ক্যাটাগরি</label>
                        <select class="form-select addProduct_subcategory">
                            <option selected>সাব-ক্যাটাগরি নির্বাচন করুন</option>
                            <?php foreach($sub_categories as $subcat): ?>
                                <option value="<?= $subcat->sub_cat_idd; ?>"><?= $subcat->sub_cat_names; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Product Details -->
                    <div class="mb-3">
                        <label class="form-label">পণ্য বিস্তারিত</label>
                        <textarea class="form-control addProduct_details" rows="4" placeholder="পণ্যের বিস্তারিত লিখুন"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a type="button" class="btn bg-secondary text-white " data-bs-dismiss="modal">Close</a>
                        <a type="button" class="btn bg-success text-white addNewProductBtn ">সংরক্ষণ করুন</a>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>

<script>
    function fetchTotalProducts() {
        $.ajax({
            url: 'lead/getAllProducts',
            method: 'GET',
            dataType: 'json',
            success: function(rs) {
                let total = rs.length;
                let producthtml_data = '';
                rs.forEach(function(product, index) {
                    producthtml_data += `
                        <tr>
                            <td>
                                ${index + 1}
                            </td>
                            <td>
                                <img src="${product.image_thumb}" class="product-img-thumb" alt="product">
                            </td>
                            <td>
                                ${product.product_name}
                            </td>
                            <td>
                                ${product.cat_names}
                            </td>
                            <td>
                                ${product.sub_cat_names}
                            </td>
                            <td>
                                ${product.product_model}
                            </td>
                            <td>
                                ${product.product_details}
                            </td>
                            <td>
                                <button class="btn btn-xs bg-primary text-white editThisProduct " data-bs-toggle="modal" data-bs-target="#editModalForm" product_id="${product.id}" ><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs bg-danger text-white deleteProductThis " product_id="${product.id}" ><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    `;
                });
                $('.total_product_set').text(total);
                $('.assignProductInfo').html(producthtml_data);
            },
            error: function() {
                console.error('Failed to fetch total products.');
            }
        });
    }

    $(document).ready(function() {
        fetchTotalProducts();

        $(document).on('click', '.deleteProductThis', function () {
            let product_id = $(this).attr('product_id');
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    url: 'lead/deleteProduct',
                    method: 'POST',
                    data: { product_id: product_id },
                    success: function(response) {
                        if (response.status === 'success') {
                            fetchTotalProducts();
                        }
                    }
                });
            }
        });


        $(document).on('click', '.addNewProductBtn', function () {
            if (!$('.addProduct_name').val() || !$('.addProduct_category').val() || !$('.addProduct_subcategory').val()) {
                alert('Please fill in all fields.');
                return;
            }else {
                let formData = new FormData();

                let imageInput = $('input[type="file"]')[0].files[0];

                formData.append('image', imageInput);
                formData.append('name', $('.addProduct_name').val());
                formData.append('category', $('.addProduct_category').val());
                formData.append('subcategory', $('.addProduct_subcategory').val());
                formData.append('model', $('.addProduct_modelDetails').val());
                formData.append('details', $('.addProduct_details').val());

                $.ajax({
                    url: "lead/store_new_product",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (res) {
                        if (res.status === 'success') {
                            fetchTotalProducts();
                            $('#addModalForm').modal('hide');
                            Swal.fire({
                                title: "সফল!",
                                text: "নতুন প্রোডাক্ট সফলভাবে যোগ করা হয়েছে!",
                                icon: "success",
                                draggable: true,
                                position: "top-end",
                                timer: 2500
                            });
                        } else {
                            toastr.warning(res.message);
                        }
                    },
                    error: function () {
                        toastr.error('An error occurred while adding the product.');
                    }
                });

            }

        });

    });

    function previewImg(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '.addProduct_category', function () {
        let category_id = $(this).val();
        $.ajax({
            type: "get",
            url: "lead/getSubcategories",
            data: { category_id: category_id },
            dataType: "json",
            success: function (response) {
                $('.addProduct_subcategory').empty();
                $.each(response, function (key, value) {
                    $('.addProduct_subcategory').append('<option value="' + value.sub_cat_idd + '">' + value.sub_cat_names + '</option>');
                });
            }
        });
    });





</script>



