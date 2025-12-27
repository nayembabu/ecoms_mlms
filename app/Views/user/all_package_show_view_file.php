

<?php use App\Libraries\BanglaConverter; ?>

    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        h2.display-5 {
            background: linear-gradient(90deg, #ffd700, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
        }

        .card {
            background: rgba(30, 30, 60, 0.7);
            backdrop-filter: blur(10px);
            border: 2px solid transparent;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.5s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .card:hover {
            transform: translateY(-20px) scale(1.05);
            border-color: #ffd700;
            box-shadow: 0 20px 50px rgba(255, 215, 0, 0.4);
        }

        .card-header {
            background: linear-gradient(45deg, #1a1a3d, #2d1b69);
            border-bottom: 3px solid #ffd700;
        }

        .price {
            font-size: 3rem;
            background: linear-gradient(90deg, #ffd700, #ffecd2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
        }

        .popular-ribbon {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 10px 30px;
            font-weight: bold;
            border-radius: 0 20px 0 20px;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.6);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 5px 15px rgba(255, 107, 107, 0.6); }
            50% { box-shadow: 0 10px 30px rgba(255, 107, 107, 0.9); }
            100% { box-shadow: 0 5px 15px rgba(255, 107, 107, 0.6); }
        }

        .btn-buy {
            background: linear-gradient(45deg, #ffd700, #ff8c00);
            border: none;
            color: #000;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.4s;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.5);
        }

        .btn-buy:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.8);
            background: linear-gradient(45deg, #ff8c00, #ffd700);
        }

        ul.list-unstyled li {
            padding: 8px 0;
            color: #ffffff !important;
            transition: all 0.3s;
        }

        ul.list-unstyled li:hover {
            color: #ffd700;
            transform: translateX(10px);
        }

        .modal-content {
            background: rgba(30, 30, 60, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid #ffd700;
            border-radius: 20px;
            color: #fff;
        }

        .modal-header {
            border-bottom: 1px solid #ffd700;
        }

        .modal-footer .btn-confirm {
            background: linear-gradient(45deg, #ffd700, #ff8c00);
            color: #000;
            font-weight: bold;
        }
    </style>



    <div id="particles-js"></div>

    <div class="container py-5 mt-5 ">
        <div class="text-center mb-5 mt-5">
            <h1 class="display_error_bal"></h1>
            <h2 class="display-5 fw-bold">প্রিমিয়াম ইনভেস্টমেন্ট প্যাকেজ</h2>
            <p class="lead" style="color: #a0a0ff;">স্বপ্নের রিটার্নের জন্য সেরা সুযোগ বেছে নিন!</p>
        </div>

        <div class="row justify-content-center g-5">
            <?php foreach ($invest_packages as $invest_packages_item) {
                if ($invest_packages_item->invest_package_p_iddd == 2) { ?>
                    <div class="col-md-4">
                        <div class="card h-100 text-center position-relative">
                            <div class="popular-ribbon">জনপ্রিয়</div>
                            <div class="card-header py-4">
                                <h4 class="fw-bold text-warning"><?= $invest_packages_item->package_names; ?></h4>
                                <h2 class="price my-3">৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($invest_packages_item->invest_amount)); ?></h2>
                                <p><?= $invest_packages_item->suitable_names; ?></p>
                                <div class="mt-3 rounded img-fluid " >
                                    <img src="<?= $invest_packages_item->package_image_s; ?>" alt="<?= $invest_packages_item->package_names; ?> Badge" class="popular-badge img-fluid " style="max-width: 100px; height: auto;">
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <button class="btn btn-buy mt-auto btn_package_buy_s " data-bs-toggle="modal" data-bs-target="#confirmModal" data-package="<?= $invest_packages_item->package_names; ?>" data-price="৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($invest_packages_item->invest_amount)); ?>" package_id="<?= $invest_packages_item->invest_package_p_iddd; ?>" package_price="<?= $invest_packages_item->invest_amount; ?>" >
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>
                <?php }else { ?>
                    <div class="col-md-4">
                        <div class="card h-100 text-center position-relative">
                            <div class="card-header py-4">
                                <h4 class="fw-bold text-warning"><?= $invest_packages_item->package_names; ?></h4>
                                <h2 class="price my-3">৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($invest_packages_item->invest_amount)); ?></h2>
                                <p><?= $invest_packages_item->suitable_names; ?></p>
                                <div class="mt-3 rounded img-fluid " >
                                    <img src="<?= $invest_packages_item->package_image_s; ?>" alt="<?= $invest_packages_item->package_names; ?> Badge" class="popular-badge img-fluid " style="max-width: 100px; height: auto;">
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <button class="btn btn-buy mt-auto btn_package_buy_s " data-bs-toggle="modal" data-bs-target="#confirmModal" data-package="<?= $invest_packages_item->package_names; ?>" data-price="৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($invest_packages_item->invest_amount)); ?>" package_id="<?= $invest_packages_item->invest_package_p_iddd; ?>" package_price="<?= $invest_packages_item->invest_amount; ?>" >
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>
            <?php } } ?>

        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ক্রয় কনফার্ম করুন</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>আপনি <span id="packageName" class="text-warning"></span> প্যাকেজ কিনতে চান?</h4>
                    <h3 class="price my-4"><span id="packagePrice"></span></h3>
                    <p>ক্রয় করলে আপনার অ্যাকাউন্ট থেকে টাকা কেটে নেওয়া হবে।</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary bg-secondary text-white " data-bs-dismiss="modal">বাতিল</button>
                    <button type="button" class="btn btn-confirm px-5 py-2" id="confirmPurchase">
                        Confirm Purchase
                    </button>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>
    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <!-- Confetti Effect -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80 },
                "color": { "value": ["#ffd700", "#ff6b6b", "#4ecdc4"] },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.6 },
                "size": { "value": 4 },
                "line_linked": { "enable": true, "color": "#ffd700", "opacity": 0.3 },
                "move": { "speed": 2 }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "repulse" } }
            }
        });

        // মোডালে প্যাকেজের নাম ও দাম দেখানো
        const confirmModal = document.getElementById('confirmModal');
        confirmModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const packageName = button.getAttribute('data-package');
            const packagePrice = button.getAttribute('data-price');

            document.getElementById('packageName').textContent = packageName;
            document.getElementById('packagePrice').textContent = packagePrice;
            document.getElementById('confirmPurchase').setAttribute('package_id', button.getAttribute('package_id'));
            document.getElementById('confirmPurchase').setAttribute('package_price', button.getAttribute('package_price'));
        });


        document.getElementById('confirmPurchase').addEventListener('click', function() {
            $.ajax({
                type: "post",
                url: "user/buySinglePackage",
                data: {
                    package_id: this.getAttribute('package_id'),
                    package_price: this.getAttribute('package_price')
                },
                dataType: "json",
                success: function (rsp) {

                    if (rsp.success === false) {
                        assign_wallet_balance();
                        Swal.fire({
                            title: 'Eror!',
                            text: `${rsp.message}`,
                            icon: 'error',
                            confirmButtonColor: '#f107a3',
                            timer: 3600,
                            showConfirmButton: false
                        });
                        // মোডাল বন্ধ করা
                        const modal = bootstrap.Modal.getInstance(confirmModal);
                        modal.hide();
                        $('.display_error_bal').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> প্যাকেজ কেনার জন্য আপনার ব্যালেন্স অপর্যাপ্ত। দয়া করে আপনার ওয়ালেটে পর্যাপ্ত ব্যালেন্স যোগ করুন।
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                    }else if (rsp.success === true) {
                        assign_wallet_balance();
                        Swal.fire({
                            title: 'Success!',
                            text: `${rsp.message}`,
                            icon: 'success',
                            confirmButtonColor: '#f107a3',
                            timer: 3600,
                            showConfirmButton: false
                        });
                        // কনফেটি ইফেক্ট
                        confetti({
                            particleCount: 150,
                            spread: 70,
                            origin: { y: 0.6 },
                            colors: ['#ffd700', '#ff6b6b', '#4ecdc4', '#ff8c00']
                        });
                        // মোডাল বন্ধ করা
                        const modal = bootstrap.Modal.getInstance(confirmModal);
                        modal.hide();
                        $('.display_error_bal').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> আপনি সফলভাবে প্যাকেজটি কিনেছেন।
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                    }

                }
            });

        });

    </script>



