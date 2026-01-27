<?php use App\Libraries\BanglaConverter; ?>
<style>
    .action-btn {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        border-radius: 50px;
        padding: 12px 24px;
        min-width: 180px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        transition: all 0.4s ease;
        text-decoration: none;
        font-weight: 600;
    }
    .action-btn i {
        font-size: 1.8rem;
        margin-right: 15px;
        transition: all 0.3s;
    }
    .action-btn span {
        font-size: 1.1rem;
    }
    .action-btn:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    }
    .action-btn:hover i {
        transform: scale(1.2) rotate(10deg);
    }
</style>

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
                    <h2 class="card-title ">মোট ইউজার<br><?= BanglaConverter::en2bn(BanglaConverter::bd_money(count($total_user ?? []) - count($temp_user ?? []) - 4)); ?></h2>
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

<div class="" >
    <div class="action-btn-group d-flex justify-content-center gap-4 mb-5 flex-wrap">

        <a href="lead/adsManage" class="action-btn btn-games">
            <i class="fas fa-basket-shopping"></i>
            <span>Ads Management</span>
        </a>
        <a href="lead/custRechargeCheck" class="action-btn btn-games">
            <i class="fas fa-usd"></i>
            <span>deposite check</span>
        </a>
        <a href="lead/custWithdrawCheck" class="action-btn btn-games">
            <i class="fa fa-dollar"></i>
            <span>withdraw check</span>
        </a>

    </div>
</div>

