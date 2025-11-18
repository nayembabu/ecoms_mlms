

    <style>
        .package-card{background:#fff;border-radius:12px;box-shadow:0 5px 15px rgba(0,0,0,.08);transition:.3s}.package-card:hover{box-shadow:0 15px 30px rgba(0,0,0,.15);transform:translateY(-5px)}.price{font-size:3rem;font-weight:800;color:#2c3e50}.btn-join{background:#27ae60;border:none;padding:12px 40px;font-size:1.2rem;border-radius:50px}.btn-join:hover{background:#219653}.floating-profit-btn{position:fixed;background:linear-gradient(45deg,#27ae60,#2ecc71);color:#fff;border:none;padding:15px 25px;font-size:16px;font-weight:700;border-radius:50px;box-shadow:0 8px 20px rgba(39,174,96,.4);display:flex;align-items:center;gap:10px;transition:.3s;cursor:pointer}.floating-profit-btn i{font-size:22px;animation:2s infinite pulse}@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.2)}}
    </style>

<section class="mt-3">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="package-card p-5">

                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-primary">প্রোডাক্ট ক্রয়ের হিসাব</h2>
                        <!-- <p class="text-muted fs-5">আয়ের সুযোগ সীমাহীন!</p> -->
                    </div>

                    <div class="add_products_profit_show">
                        <div class="floating-profit-btn"><i class="bi bi-graph-up-arrow"></i>প্রফিট</div><br><br>
                    </div>

                    <div class="text-center mt-2 mb-2 ">
                        <div class="mb-4">
                            <h4>আপনার বর্তমান প্রফিট</h4>
                            <h2 class="text-success fw-bold">৳ ৪৬,৫০০</h2>
                        </div>

                        <div class="d-grid gap-3 d-md-flex justify-content-center">
                            <button class="btn btn-join btn-lg text-white shadow">
                                এখনই জয়েন করুন
                            </button>
                            <button class="btn btn-outline-secondary btn-lg">
                                Now Profit দেখুন
                            </button>
                        </div>
                    </div>

                    <div class="text-center mt-4 text-muted small">
                        ✓ ইন্সট্যান্ট অ্যাকটিভেশন ✓ ২৪/৭ সাপোর্ট ✓ লাইফটাইম ইনকাম
                    </div>



                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>লেভেল</th>
                                <th>প্রতি জন</th>
                                <th>মেম্বার সংখ্যা</th>
                                <th>লেভেল আয়</th>
                                <th>মোট আয়</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>লেভেল ১</td><td>৳ ২,০০০</td><td>৩ জন</td><td>৳ ৬,০০০</td><td>৳ ৬,০০০</td></tr>
                            <tr><td>লেভেল ২</td><td>৳ ১,০০০</td><td>৯ জন</td><td>৳ ৯,০০০</td><td>৳ ১৫,০০০</td></tr>
                            <tr><td>লেভেল ৩</td><td>৳ ৭০০</td><td>২৭ জন</td><td>৳ ১৮,৯০০</td><td>৳ ৩৩,৯০০</td></tr>
                            <tr><td>লেভেল ৪</td><td>৳ ৫০০</td><td>৮১ জন</td><td>৳ ৪০,৫০০</td><td>৳ ৭৪,৪০০</td></tr>
                            <tr><td>লেভেল ৫</td><td>৳ ৪০০</td><td>২৪৩ জন</td><td>৳ ৯৭,২০০</td><td>৳ ১,৭১,৬০০</td></tr>
                            <tr class="table-success fw-bold fs-5">
                                <td colspan="3">১০ লেভেল পর্যন্ত মোট</td>
                                <td colspan="2">৳ ৫,৫০,০০০+</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>



<script>

    get_uncompleted_products()
    function get_uncompleted_products() {
        $.ajax({
            type: "post",
            url: "user/getUncompletedProducts",
            data: "",
            dataType: "json",
            success: function (r) {
                let html_view = '';
                // html_view += r[l];

                for (let l = 0; l < r.length; l++) {
                    get_single_uncompleted_product_data(r.product_sells[l].product_buy_lot_id)
                }
            }
        });
    }

    function get_single_uncompleted_product_data(product_buy_idd) {
        $.ajax({
            type: "post",
            url: "user/getSingleUncompletedProduct",
            data: {
                product_buy_idd: product_buy_idd
            },
            dataType: "json",
            success: function (rs) {
                //
            }
        });
    }


</script>



