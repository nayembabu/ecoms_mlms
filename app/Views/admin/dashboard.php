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

        <div class="col-md-8 row" style="border: 1px solid red; ">
            <h2 class="card-title text-center">আমাদের কাছে মোট টাকা আছে = <?= $admin_added_amounts - $admin_cost_money_total; ?>/-</h2> 
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title ">একাউন্টে আছে<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money($admin_added_amounts)); ?>/-</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title ">খরচ করছি<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money($admin_cost_money_total)); ?>/-</h2>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title ">মোট ইউজার<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money(count($approve_user ?? []))); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title ">পেন্ডিং <br><?= BanglaConverter::en2bn(BanglaConverter::bd_money(count($temp_user ?? []))); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>


