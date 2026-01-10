
<style>
  body { background:#f4f6f9; }
  .card { border-radius:10px; }
  .stat-card {
      background: linear-gradient(135deg,#0d6efd,#6610f2);
      color:#fff;
  }
  .stat-card small { opacity:.8; }
  .avatar {
      width:70px;
      height:70px;
      border-radius:50%;
      background:#dee2e6;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:30px;
  }
  .action-btn i { margin-right:5px; }
</style>













<div class="container mt-3 ">
  <div class="row justify-content-center">


    <div class="col-lg-8 col-md-20">

      <h3 class="mb-1 text-center">ইউজার সার্চ</h3>

      <div class="position-relative">
        <div class="input-group mb-3">
          <input type="text" class="form-control search_user_type_info " placeholder="মোবাইল, ইউজারনেম, ইমেইল লিখুন ">
          <div class="btn bg-dark text-white search_btn" >Search</div>
        </div>
        <div class="result-dropdown shadow row g-4 pb-4" id="searchResults"></div>
      </div>
    </div>

    <div class="mt-3 " >











        <div class="card shadow mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar"><i class="bi bi-person"></i></div>
                    <div>
                        <h5 class="mb-0">Rahim Ahmed</h5>
                        <small>ID: #U10245 | Rank: Gold</small><br>
                        <span class="badge bg-success">Active</span>
                        <span class="badge bg-info">KYC Verified</span>
                    </div>
                </div>
                <div>
                    <button class="btn btn-sm btn-danger action-btn"><i class="bi bi-lock"></i>Block</button>
                    <button class="btn btn-sm btn-primary action-btn"><i class="bi bi-pencil"></i>Edit</button>
                </div>
            </div>
        </div>

        <!-- WALLET STATS -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card stat-card p-3">
                    <small>Main Balance</small>
                    <h4>৳ 12,500</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3">
                    <small>Casino Wallet</small>
                    <h4>৳ 5,200</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3">
                    <small>MLM Commission</small>
                    <h4>৳ 3,800</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-3">
                    <small>Withdrawable</small>
                    <h4>৳ 2,900</h4>
                </div>
            </div>
        </div>

        <!-- TABS -->
        <ul class="nav nav-pills mb-3">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#casino">🎰 Casino</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#mlm">🌐 MLM</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#security">⚙ Security</button></li>
        </ul>

        <div class="tab-content">

          <!-- CASINO -->
          <div class="tab-pane fade show active" id="casino">
              <div class="row g-3">
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Total Bets</h6>
                          <h4>245</h4>
                          <button class="btn btn-sm btn-outline-primary">View History</button>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Total Win</h6>
                          <h4 class="text-success">৳ 18,400</h4>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Total Loss</h6>
                          <h4 class="text-danger">৳ 12,900</h4>
                      </div>
                  </div>
              </div>

              <div class="mt-3 d-flex gap-2">
                  <button class="btn btn-success"><i class="bi bi-wallet2"></i> Deposit</button>
                  <button class="btn btn-warning"><i class="bi bi-cash"></i> Withdraw</button>
                  <button class="btn btn-secondary"><i class="bi bi-controller"></i> Game Access</button>
              </div>
          </div>

          <!-- MLM -->
          <div class="tab-pane fade" id="mlm">
              <div class="card mb-3 p-3">
                  <label class="form-label">Referral Link</label>
                  <div class="input-group">
                      <input type="text" class="form-control" value="https://site.com/ref/rahim">
                      <button class="btn btn-outline-primary" id="copyLink">Copy</button>
                  </div>
              </div>

              <div class="row g-3">
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Direct Referral</h6>
                          <h4>12</h4>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Total Team</h6>
                          <h4>45</h4>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card text-center p-3">
                          <h6>Rank Progress</h6>
                          <div class="progress">
                              <div class="progress-bar" style="width:70%">70%</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- SECURITY -->
          <div class="tab-pane fade" id="security">
              <div class="list-group">
                  <button class="list-group-item"><i class="bi bi-key"></i> Reset Password</button>
                  <button class="list-group-item"><i class="bi bi-clock-history"></i> Login History</button>
                  <button class="list-group-item"><i class="bi bi-file-earmark-text"></i> KYC Documents</button>
                  <button class="list-group-item text-danger"><i class="bi bi-box-arrow-right"></i> Force Logout</button>
              </div>
          </div>

        </div>












    </div>

  </div>
</div>

<br><br><br><br><br>
<script>
$(document).ready(function() {

  $(document).on('click', '.search_btn', function () {
    let query = $('.search_user_type_info').val().trim();
    if (query === '') {
      Swal.fire({
        title: "Error!",
        icon: "error",
        position: "top-end",
        title: "খালী কেনো?",
        draggable: true,
        timer: 2500
      });
      return;
    }else {
      $.ajax({
        type: "post",
        url: "lead/search_user_info",
        data: {
          query: query
        },
        dataType: "json",
        success: function (rsp) {
        let html_card = '';

        for (let l = 0; l < rsp.length; l++) {
          html_card += `<div class="col-md-4">
                          <div class="card shadow-sm single_user_info " user_info_id="${rsp[l].user_full_info_idd}" style="cursor: pointer; " >
                              <div class="card-body text-center">
                                  <h4 class="card-title"><b>${rsp[l].user_full_name}</b></h4>
                                  <p class="card-text mb-1"><strong>Email:</strong> ${rsp[l].user_email_no}</p>
                                  <p class="card-text mb-1"><strong>Phone:</strong> ${rsp[l].user_phone_no}</p>
                                  <p class="card-text mb-1"><strong>Username:</strong> ${rsp[l].user_name}</p>
                                  <p class="card-text mb-1"><strong>Address:</strong> ${rsp[l].user_full_address}</p>
                                  <p class="card-text mb-1"><strong>ID:</strong> <span class="badge bg-success">${rsp[l].user_reffer_code_times}</span></p>
                              </div>
                          </div>
                        </div>`;
        }
          $('#searchResults').html(html_card);
        }
      });

    }
  });

  $(document).on('click', '.single_user_info', function () {
    let user_info_id = $(this).attr('user_info_id');

    $.ajax({
      type: "post",
      url: "lead/single_user_profile",
      data: {
        user_id: user_info_id
      },
      dataType: "json",
      success: function (response) {
        
      }
    });

  });

});
</script>