<?php use App\Libraries\BanglaConverter; ?>




<div class="container">
    <div class="row">
        <div class="col-12 text-center ">
            <h1 class="mt-4">Admin Dashboard</h1>
            <p>Welcome to the admin dashboard. Here you can manage your application settings and view important metrics.</p>
        </div>
    </div>
    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title ">মোট পন্য ক্রয়ের টাকা<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money($ttl_product_sell ?? 0)); ?>/-</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title ">মোট প্যাকেজ ইনভেস্ট<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money($package_enroll_total ?? 0)); ?>/-</h2>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title ">মোট ব্যালেন্স<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money($current_wallet_balance)); ?>/-</h2>
                </div>
            </div>
        </div>
    </div>
</div>






