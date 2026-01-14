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
            <form id="depositForm" class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Amount (BDT)</label>
                  <div class="input-group">
                    <span class="input-group-text">৳</span>
                    <input type="number" min="50" step="50" class="form-control" id="amount" placeholder="500" required />
                    <div class="invalid-feedback">Minimum 50 Taka।</div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label">Method</label>
                  <select class="form-select" id="method" required>
                    <option value="">Select…</option>
                    <option value="bKash">bKash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                  </select>
                  <div class="invalid-feedback">পেমেন্ট মেথড নির্বাচন করুন।</div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label">Reference / Txn ID</label>
                  <input type="text" class="form-control" id="reference" placeholder="লেনদেন আইডি" required />
                  <div class="invalid-feedback">রেফারেন্স আইডি প্রয়োজন।</div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label">Note <span class="text-secondary">(optional)</span></label>
                  <input type="text" class="form-control" id="note" placeholder="যদি কিছু লিখতে চান" />
                </div>
                <div class="col-12 d-grid mt-2">
                  <button class="btn btn-primary btn-lg bg-primary text-white " type="submit">
                    <i class="bi bi-plus-circle me-2"></i> Request Deposit
                  </button>
                </div>
              </div>
            </form>

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
                <input type="search" class="form-control form-control-sm filter-input" id="searchInput" placeholder="Search… (ref/method/status)" />
                <select class="form-select form-select-sm" id="statusFilter">
                  <option value="">All Status</option>
                  <option>Pending</option>
                  <option>Approved</option>
                  <option>Rejected</option>
                </select>
              </div>
            </div>

            <div class="table-responsive" style="min-height:300px">
              <table class="table table-dark table-hover align-middle mb-0" id="historyTable">
                <thead>
                  <tr>
                    <th class="pointer" data-sort="date">Date <i class="bi bi-arrow-down-up ms-1"></i></th>
                    <th>Method</th>
                    <th class="text-end pointer" data-sort="amount">Amount</th>
                    <th>Status</th>
                    <th>Ref</th>
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