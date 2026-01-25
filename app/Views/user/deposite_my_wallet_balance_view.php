<style>
    body { background: #0f172a; }
    .glass {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    }
    .brand-gradient {
    background: linear-gradient(135deg,#22d3ee,#a78bfa);
    -webkit-background-clip: text; background-clip: text; color: transparent;
    }
    .table thead th { white-space: nowrap; }
    .form-section-title { font-size: .9rem; letter-spacing:.05em; text-transform:uppercase; color:#9ca3af }
    .badge-soft { background: rgba(99,102,241,.15); color:#c7d2fe; border:1px solid rgba(99,102,241,.3) }
    .filter-input { max-width: 260px; }
    .pointer { cursor: pointer; }
</style>

<div class="container py-5 pt-5 mt-5 text-center bg-white shadow-sm ">
    <div class="row justify-content-center g-4">








  <main class="container-xxl py-4">
    <div class="row g-4">
      <!-- Deposit Form -->
      <div class="col-12 col-lg-5">
        <div class="card glass shadow-lg border-0 h-100">
          <div class="card-body p-4">
            <h2 class="h4 fw-semibold text-white mb-1">New Deposit</h2>
            <p class="mb-4"></p>
            <div class="form-section-title mb-2">Main Account</div>

                <div class="col-12 col-md-12 mb-4">
                  <label class="form-label">Method</label>
                  <select class="form-select select_deposite_system " id="method" required>
                    <option value="">Select…</option>
                    <?php foreach ($wallet_address as $wallet) { ?>
                      <option value="<?= $wallet->deposite_number_added_id; ?>"><?= $wallet->wallet_address; ?> - <?= $wallet->wallet_name; ?> - <?= $wallet->subcat_name; ?> </option>
                      <?php } ?>
                  </select>
                  <div class="text-danger fs-2 text-center payment_text_s "></div>
                </div>



            <div id="depositForm" class="needs-validation" novalidate></div>

            <div class="alert alert-dark border-0 mt-4 mb-0 small">
              <i class="bi bi-shield-check me-2"></i>
                submit here..... any agent connect with you immediately.
            </div>
          </div>
        </div>
      </div>

      <!-- History -->
      <div class="col-12 col-lg-7">
        <div class="card glass shadow-lg border-0 h-100">
          <div class="card-body p-4 d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
              <div>
                <h2 class="h4 fw-semibold text-white mb-0">ডিপোজিট হিস্ট্রি</h2>
                <small class="text-secondary">সর্বশেষ লেনদেনগুলো নিচে দেখুন</small>
              </div>
              <div class="d-flex gap-2 align-items-center">
              </div>
            </div>

            <div class="table-responsive" style="min-height:300px">
              <table class="table table-hover align-middle mb-0" id="historyTable">
                <thead>
                  <tr class="bg-dark text-white ">
                    <th class="pointer" data-sort="date">Date <i class="bi bi-arrow-down-up ms-1"></i></th>
                    <th class="text-end pointer" data-sort="amount">Amount</th>
                    <th>Status</th>
                    <th>Note</th>
                  </tr>
                </thead>
                <tbody id="historyBody"></tbody>
              </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="small" id="rowCount">0 items</div>
              <nav>
                <ul class="pagination pagination-sm mb-0" id="pager"></ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Help Modal -->
  <div class="modal fade" id="howItWorks" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white-50">
        <div class="modal-header border-secondary">
          <h5 class="modal-title">কিভাবে কাজ করে?</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ol class="mb-0">
            <li>Amount, Method, Reference ও Date পূরণ করে <em>Request Deposit</em> দিন।</li>
            <li>এটি হিস্ট্রিতে <span class="badge text-bg-warning">Pending</span> হবে।</li>
            <li>অ্যাডমিন যাচাই করলে <span class="badge text-bg-success">Approved</span> হবে।</li>
            <li>এই ডেমোতে ডাটা ব্রাউজারে সংরক্ষিত থাকে (localStorage)।</li>
          </ol>
        </div>
        <div class="modal-footer border-secondary">
          <button class="btn btn-primary" data-bs-dismiss="modal">বুঝেছি</button>
        </div>
      </div>
    </div>
  </div>









    </div>
</div>








                <script>
                  $(document).on('change', '.select_deposite_system', function () {
                    let wallet = $(this).val();

                    $.ajax({
                      type: "post",
                      url: "user/getWalletInfo",
                      data: {
                        wallet: wallet
                      },
                      dataType: "json",
                      success: function (r) {
                        $('.payment_text_s').html(r.wallet.payment_type);
                        $('#depositForm').html(
                                  `<div class="row g-3">
                                      <div class="col-12">
                                        <label class="form-label">Amount (BDT)</label>
                                        <div class="input-group">
                                          <span class="input-group-text">৳</span>
                                          <input type="number" min="50" step="50" class="form-control" id="amount_type" placeholder="500" required />
                                          <div class="invalid-feedback">Minimum 50 Taka।</div>
                                        </div>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <label class="form-label">Reference / Txn ID</label>
                                        <input type="text" class="form-control" id="reference_trx_id" placeholder="লেনদেন আইডি" required />
                                        <div class="invalid-feedback">রেফারেন্স আইডি প্রয়োজন।</div>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <label class="form-label">Note <span class="text-secondary">(optional)</span></label>
                                        <input type="text" class="form-control" id="extranote" placeholder="যদি কিছু লিখতে চান" />
                                      </div>
                                      <div class="col-12 d-grid mt-2">
                                        <div class="btn btn-primary btn-lg bg-primary text-white waller_recharge_btn " >
                                          <i class="bi bi-plus-circle me-2"></i> Request Deposit
                                        </div>
                                      </div>
                                    </div>`);
                      }
                    });

                  });

                  $(document).on('click', '.waller_recharge_btn', function () {
                    if ($('#amount_type').val() == '' || $('#reference_trx_id').val() == '') {
                      toastr.error('পুরোটা পূরণ করুন');
                      return;
                    }
                    $.ajax({
                      type: "post",
                      url: "user/pamentRequestSubmit",
                      data: {
                        payText: $('.select_deposite_system option:selected').text(),
                        amount: $('#amount_type').val(),
                        trxid: $('#reference_trx_id').val(),
                        note: $('#extranote').val()
                      },
                      success: function (response) {
                        $('.select_deposite_system').val('');
                        $('.payment_text_s').html('');
                        $('#depositForm').html('');
                        get_recharge_history();
                      }
                    });
                  });
                  get_recharge_history();
                  function get_recharge_history() {
                    $.ajax({
                      type: "post",
                      url: "user/rechargeHistoryGetting",
                      data: "",
                      dataType: "json",
                      success: function (rr) {
                        let html_dara = '';
                        const statusText = {
                              0: '<span class="bg-secondary text-white p-1 rounded "> Pending </span>',
                              1: '<span class="bg-success text-white p-1 rounded "> Approved </span>',
                              2: '<span class="bg-danger text-white p-1 rounded "> Rejected </span>'
                          };
                        for (let n = 0; n < rr.length; n++) {
                          html_dara += `<tr>
                                          <td class="pointer" > ${rr[n].dateing}</td>
                                          <td class="text-end " >${rr[n].amount_dep}</td>
                                          <td>${statusText[rr[n].styatus] ?? '<span class="bg-danger text-white p-1 rounded "> Error </span>'}</td>
                                          <td>${rr[n].descaaaa || ''}</td>
                                        </tr>`;
                        }
                        $('#historyBody').html(html_dara);
                      }
                    });
                  }
                </script>