







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
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

                <div class="col">
                    <div class="card h-100 product-card shadow-lg bg-white">
                        <div class="position-relative">
                            <img src="https://media.istockphoto.com/id/2162431408/photo/sleek-blue-headphones-on-white-background.jpg?s=612x612&w=0&k=20&c=WyQ-bUslLSnirpxZ6zJNQnht7jnEtCz0bSkfasG1cSc=" class="card-img-top" alt="হেডফোন Wireless">
                            <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 rounded-start m-2 fw-bold">Sale 20%</span>
                        </div>
                        <div class="card-body d-flex flex-column" style="cursor: pointer; ">
                            <h5 class="card-title fw-bold">হেডফোন Wireless</h5>
                            <p class="card-text text-muted flex-grow-1">নয়েজ ক্যানসেলেশন সহ প্রিমিয়াম সাউন্ড কোয়ালিটি।</p>
                            <div class="mt-auto">
                                <span class="price-badge text-primary">৳৮,৫০০</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">প্রোডাক্টের নাম</label>
                                    <input type="text" class="form-control" placeholder="উদাহরণ: স্মার্টফোন X" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">দাম (৳)</label>
                                    <input type="number" class="form-control" placeholder="35000" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">প্রোডাক্ট ইমেজ</label>
                                <input type="file" class="form-control" id="productImage" accept="image/*">
                                <img id="imagePreview" class="img-fluid d-none" alt="প্রিভিউ">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">বিবরণ</label>
                                <textarea class="form-control" rows="4" placeholder="প্রোডাক্টের বিস্তারিত বিবরণ..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger rounded-pill text-white " data-bs-dismiss="modal">বাতিল</button>
                        <button type="button" class="btn bg-success rounded-pill text-white ">যোগ করুন</button>
                    </div>
                </div>
            </div>
        </div>






        <script>
            document.getElementById('productImage').addEventListener('change', function(e) {
                const preview = document.getElementById('imagePreview');
                if (e.target.files && e.target.files[0]) {
                    preview.src = URL.createObjectURL(e.target.files[0]);
                    preview.classList.remove('d-none');
                }
            });
        </script>












