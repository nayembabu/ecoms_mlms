



  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="inc/plugin/confetti.js"></script>
  <script src="inc/plugin/tailwindcss.js"></script>
  <style>
    body { font-family: 'Hind Siliguri', sans-serif; background: linear-gradient(135deg, #2a1954ff 0%, #1a0033 100%); }
    .glass { backdrop-filter: blur(16px); background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1); }
    .glow { box-shadow: 0 0 30px rgba(168, 85, 247, 0.6); }
    .gift-pulse { animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.1); } }
  </style>


<div class="text-white min-h-screen mt-3 relative">

  <main class="pt-24 pb-32 px-4 max-w-6xl mx-auto">

  <a href="<?= base_url('user/dashboard'); ?>" class="px-3 py-3 bg-white text-gray-800 font-medium text-lg rounded-xl shadow-lg hover:shadow-xl hover:bg-gray-50 hover:-translate-y-0.5 active:scale-95 transition-all duration-200 border border-gray-200">
    ব্যাক করুন
  </a>

    <!-- Hero Section -->
    <div class="text-center mb-12 mt-4">
      <h2 class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-pink-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent mb-4">
        আমার ক্রয় হিস্টোরি
      </h2>
      <p class="text-xl text-purple-200">প্রতিটি ক্রয়ে রয়েছে সারপ্রাইজ গিফটের জাদু!</p>
    </div>

        <div class="absolute top-20 right-4 gift-pulse add_products_profit_show"></div>


    <!-- Summary Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
      <div class="glass rounded-2xl p-6 text-center glow border-purple-500">
        <i class="fas fa-trophy text-5xl text-yellow-400 mb-3"></i>
        <p class="text-purple-300">মোট প্রফিট টাকা</p>
        <p class="text-4xl font-bold"><?php echo array_sum(array_column($product_profit_s, 'profit_amountsss'));  ?></p>
      </div>
      <div class="glass rounded-2xl p-6 text-center glow border-pink-500">
        <i class="fas fa-gem text-5xl text-pink-400 mb-3"></i>
        <p class="text-purple-300">মোট ক্রয়</p>
        <p class="text-4xl font-bold">৳ <?php echo array_sum(array_column($product_sells, 'product_sell_price'));  ?></p>
      </div>
      <div class="glass rounded-2xl p-6 text-center glow border-green-500">
        <i class="fas fa-gift text-5xl text-green-400 mb-3"></i>
        <p class="text-purple-300">প্রফিট পেয়েছেন</p>
        <p class="text-4xl font-bold"><?= count($product_profit_s); ?> টি</p>
      </div>
      <div class="glass rounded-2xl p-6 text-center glow border-cyan-500">
        <i class="fas fa-shopping-cart text-5xl text-cyan-400 mb-3"></i>
        <p class="text-purple-300">মোট অর্ডার</p>
        <p class="text-4xl font-bold"> <?= count($product_sells); ?> টি</p>
      </div>
    </div>

    <!-- Orders List -->
    <div class="space-y-8">

      <?php foreach ($product_sells as $sells) { ?>
        <div class="glass rounded-3xl overflow-hidden border-2 border-pink-500 glow">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-bold">#ORD-<?= $sells->created_at; ?></h3>
                        <p class="text-pink-300"><?= date('d F Y', $sells->created_at); ?></p>
                    </div>
                    <?php if ($sells->return_product_price == 0) : ?>
                        <span class="bg-green-500/30 text-green-300 px-6 py-3 rounded-full text-lg font-bold border border-green-500"> সফল </span>
                    <?php elseif ($sells->return_product_price == 1) : ?>
                        <span class="bg-red-500/30 text-red-300 px-5 py-2 rounded-full text-lg font-bold border border-red-500"> বন্ধ </span>
                    <?php endif ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                    <div class="bg-white/5 rounded-2xl p-5">
                        <p class="text-purple-300">প্যাকেজ</p>
                        <p class="text-2xl font-bold text-cyan-400">
                            <?php
                                $short_name = implode(' ', array_slice(explode(' ', $sells->product_name), 0, 3));
                                echo $short_name;
                            ?>
                        </p>
                    </div>

                    <div class="bg-white/5 rounded-2xl p-5">
                        <p class="text-purple-300">মূল্য</p>
                        <p class="text-3xl font-bold text-yellow-400">৳ <?= $sells->product_sell_price; ?></p>
                    </div>
                    <div class="bg-white/5 rounded-2xl p-5">
                        <p class="text-purple-300">প্রফিট × দিন</p>
                        <p class="text-3xl font-bold text-green-400"><?= $sells->profit_amounts; ?> × <?= $sells->profit_continue_days; ?></p>
                    </div>

                </div>
            </div>
        </div>
      <?php } ?>

    </div>
  </main>

  <!-- Gift Reveal Modal -->
  <div id="giftModal" class="fixed inset-0 bg-black/90 backdrop-blur-xl z-50 hidden flex items-center justify-center p-5">
    <div class="bg-gradient-to-br from-purple-600 via-pink-600 to-red-600 rounded-3xl p-12 max-w-2xl text-center shadow-2xl animate-pulse">
      <i class="fas fa-gift text-9xl text-yellow-400 mb-8 gift-pulse"></i>
      <h3 class="text-5xl font-bold mb-6">অভিনন্দন!</h3>
      <p id="giftMessage" class="text-3xl mb-10 leading-relaxed"></p>
      <button onclick="closeModal()" class="bg-white text-purple-600 px-12 py-5 rounded-full text-2xl font-bold hover:scale-110 transition shadow-2xl">
        ধন্যবাদ! বন্ধ করুন
      </button>
    </div>
  </div>

</div>


  <script>
    function revealGift(message) {
      document.getElementById('giftMessage').innerHTML = message;
      document.getElementById('giftModal').classList.remove('hidden');
      // কনফেটি বিস্ফোরণ
      confetti({ particleCount: 200, spread: 80, origin: { y: 0.4 } });
      confetti({ particleCount: 100, spread: 100, origin: { y: 0.6 } });
    }

    function closeModal() {
      document.getElementById('giftModal').classList.add('hidden');
    }

    get_uncompleted_products()
    function get_uncompleted_products() {
        $.ajax({
            type: "post",
            url: "user/getUncompletedProducts",
            data: "",
            dataType: "json",
            success: function (r) {

              if (r.product_sell_status && r.product_sell_status.length > 0) {
                let html_view = '';

                for (let l = 0; l < r.product_sell_status.length; l++) {
                    if (r.product_sell_status[l].status == 'n') {
                        html_view += `<div class="add_profit_btns bg-gradient-to-br from-yellow-400 to-orange-500 text-black px-6 py-3 rounded-full font-bold text-lg shadow-2xl flex items-center gap-2 animate-bounce" sells_id="${r.product_sell_status[l].sel_id}" product_id="${r.product_sell_status[l].prod_id}" product_buy_id="${r.product_sell_status[l].prod_buy_id}" profit="${r.product_sell_status[l].profit}"  onclick="revealGift('অভিনন্দন! আপনার ক্রয়কৃত প্রোডাক্ট এর আজকের বোনাস যোগ হয়েছে। ${r.product_sell_status[l].profit}/- ')" >
                            <i class="fas fa-gift text-2xl"></i> প্রফিট!
                        </div>`;
                    }else if(r.product_sell_status[l].status == 'c') {
                        html_view += `<div class="add_profit_btns bg-gradient-to-br from-yellow-400 to-orange-500 text-black px-6 py-3 rounded-full font-bold text-lg shadow-2xl flex items-center gap-2 animate-bounce" sells_id="${r.product_sell_status[l].sel_id}" product_id="${r.product_sell_status[l].prod_id}" product_buy_id="${r.product_sell_status[l].prod_buy_id}" profit="${r.product_sell_status[l].profit}"  onclick="revealGift('অভিনন্দন! আপনার ক্রয়কৃত প্রোডাক্ট এর আজকের বোনাস যোগ হয়েছে। ${r.product_sell_status[l].profit}/- ')" >
                            <i class="fas fa-gift text-2xl"></i> প্রফিট!
                        </div>`;
                    }
                }
                $('.add_products_profit_show').html(html_view);
                assign_wallet_balance();
              }else {
                $('.add_products_profit_show').html('');
                assign_wallet_balance();
              }
            }
        });
    }

    $(document).on('click', '.add_profit_btns', function () {
        let sells_id = $(this).attr('sells_id');
        let product_id = $(this).attr('product_id');
        let product_buy_id = $(this).attr('product_buy_id');
        let profit = $(this).attr('profit');

        $.ajax({
            type: "post",
            url: "user/add_profit_in_sell_products",
            beaforeSend: function () {
              $('.add_products_profit_show').html('');
            },
            data: {
                sells_id: sells_id,
                product_buy_id: product_buy_id,
                product_id: product_id
            },
            success: function (ress) {
                get_uncompleted_products();
                assign_wallet_balance();
            }
        });
    });


  </script>