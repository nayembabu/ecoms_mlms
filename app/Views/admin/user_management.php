
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
.custom-popover {
    position: absolute;
    top: 100%;
    right: 0;
    width: 300px;
    background: #fff;
    border-radius: 10px;
    padding: 15px;
    margin-top: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    display: none;
    z-index: 1050;
    animation: popFade .2s ease-in-out;
}
.custom-popover::before {
    content: "";
    position: absolute;
    top: -8px;
    right: 25px;
    border-width: 0 8px 8px;
    border-style: solid;
    border-color: transparent transparent #fff;
}
@keyframes popFade {
    from {
    opacity: 0;
    transform: translateY(-5px);
    }
    to {
    opacity: 1;
    transform: translateY(0);
    }
}
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
        <div class="card shadow mb-4 user_info_show "></div>
    </div>

  </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<script>
    $(document).ready(function() {

        $(document).on('click', '.search_btn', function () {
            $('.user_info_show').html(``);
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
                                                <p class="card-text mb-1"><strong>ID:</strong> <span class="badge ${(rsp[l].status == 0 ? 'bg-secondary' : 'bg-success')}">${rsp[l].user_reffer_code_times}</span></p>
                                            </div>
                                        </div>
                                        </div>`;
                        }
                        $('#searchResults').html(html_card);
                        $('.user_info_show').html(``);
                    }
                });
            }
        });

        $(document).on('click', '.single_user_info', function () {
            let user_info_id = $(this).attr('user_info_id');
            get_single_user_data(user_info_id)
        });

        $(document).on("click", ".amount_add_btn", function () {
            $("#customPopover").html(
                `<div class="input-group mb-3">
                    <input type="text" class="form-control amount_typebox " placeholder="Enter Amount" >
                    <div class="btn btn-outline-secondary bg-dark text-white add_amount_btn_submit " >Add</div>
                </div>`
            ).fadeToggle(200);
        });

        $(document).on("click", ".cut_amount_btn", function () {
            $("#customPopover").html(
                `<div class="input-group mb-3">
                    <input type="text" class="form-control amount_typebox " placeholder="Enter Amount" >
                    <div class="btn btn-outline-secondary bg-dark text-white cut_amount_submit_btn " >Cut</div>
                </div>`
            ).fadeToggle(200);
        });
        // $("#customPopover").fadeOut(200);

        $(document).on('click', '.add_amount_btn_submit', function () {
            let user_id = $('.user_detail_s').attr('user_id');
            let add_amount = $('.amount_typebox').val().trim();
            $.ajax({
                type: "post",
                url: "lead/add_user_wallet_amount",
                data: {
                    user_id: user_id,
                    add_amount: add_amount
                },
                dataType: "json",
                success: function (rp) {
                    if(rp.status === 'success'){
                        get_single_user_data(user_id);
                        $("#customPopover").fadeOut(200);
                        Swal.fire({
                            title: "Good job!",
                            text: "Amount Added Successfully",
                            icon: "success",
                            draggable: true,
                            position: "top-end",
                            timer: 2500
                        });
                    }
                }
            });
        });

        $(document).on('click', '.cut_amount_submit_btn', function () {
            let user_id = $('.user_detail_s').attr('user_id');
            let add_amount = $('.amount_typebox').val().trim();
            $.ajax({
                type: "post",
                url: "lead/user_wallet_amount_cut",
                data: {
                    user_id: user_id,
                    add_amount: add_amount
                },
                dataType: "json",
                success: function (rp) {
                    if(rp.status === 'success'){
                        get_single_user_data(user_id);
                        $("#customPopover").fadeOut(200);
                        Swal.fire({
                            title: "Good job!",
                            text: "Amount Cut Successfully",
                            icon: "warning",
                            draggable: true,
                            position: "top-end",
                            timer: 2500
                        });
                    }
                }
            });
        });

        $(document).on('click', '.accountActivate', function () {
            let user_id = $('.user_detail_s').attr('user_id');
            $.ajax({
                type: "post",
                url: "lead/account_activate_deactivate",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function (response) {
                    if(response.status === 'success'){
                        get_single_user_data(user_id);
                        Swal.fire({
                            title: "Good job!",
                            text: "Account Activated Successfully",
                            icon: "success",
                            draggable: true,
                            position: "top-end",
                            timer: 2500
                        });
                    }
                }
            });
        });

        $(document).on('click', '.suspend_this_account', function () {
            let user_id = $('.user_detail_s').attr('user_id');
            $.ajax({
                type: "post",
                url: "lead/account_suspend_activate",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function (response) {
                    if(response.status === 'success'){
                        get_single_user_data(user_id);
                        Swal.fire({
                            title: "Good job!",
                            text: "Account Suspended Successfully",
                            icon: "success",
                            draggable: true,
                            position: "top-end",
                            timer: 2500
                        });
                    }
                }
            });
        });

        function get_single_user_data(user_info_id) {
            $.ajax({
                type: "post",
                url: "lead/single_user_profile",
                data: {
                    user_id: user_info_id
                },
                dataType: "json",
                success: function (resp) {
                    if (resp.users_data.role_role_idd == 1) {
                            $('.user_info_show').html(
                            `<div class="card-body d-flex justify-content-between align-items-center ${(resp.users_data.status == 2 ? 'bg-danger text-white' : '')} flex-wrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar"><img src="${resp.users_data.user_pro_pic_paths}" style="width: 70px;border-radius: 20px;" alt="IMG"></div>
                                    <div class="user_detail_s" user_id="${resp.users_data.user_full_info_idd}" >
                                        <h5 class="mb-0">${resp.users_data.user_full_name}</h5>
                                        <small>ID: #${resp.users_data.user_reffer_code_times} | Rank: ${resp.users_data.batch_name}</small><br>
                                        <span class="badge ${(resp.users_data.status == 0 ? 'bg-secondary' : 'bg-success')}">${(resp.users_data.status == 1 ? 'Active' : resp.users_data.status == 2 ? 'Suspend' : resp.users_data.status == 0 ? 'Inactive' : 'Error')}</span>
                                        <span class="badge bg-info">KYC Verified</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card bg-dark text-white p-3 mb-2">
                                        <small>Username: ${resp.users_data.user_name}</small>
                                        <small>Password: ${resp.users_data.password_show}</small>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card stat-card p-3">
                                        <small>Main Balance</small>
                                        <h4>৳ ${resp.current_wallet_balance}</h4>
                                    </div>
                                </div>
                            </div>`
                        );
                    }else {
                        $('.user_info_show').html(
                            `<div class="card-body d-flex justify-content-between align-items-center ${(resp.users_data.status == 2 ? 'bg-danger text-white' : '')} flex-wrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar"><img src="${resp.users_data.user_pro_pic_paths}" style="width: 70px;border-radius: 20px;" alt="IMG"></div>
                                    <div class="user_detail_s" user_id="${resp.users_data.user_full_info_idd}" >
                                        <h5 class="mb-0">${resp.users_data.user_full_name}</h5>
                                        <small>ID: #${resp.users_data.user_reffer_code_times} | Rank: ${resp.users_data.batch_name}</small><br>
                                        <span class="badge ${(resp.users_data.status == 0 ? 'bg-secondary' : 'bg-success')}">${(resp.users_data.status == 1 ? 'Active' : resp.users_data.status == 2 ? 'Suspend' : resp.users_data.status == 0 ? 'Inactive' : 'Error')}</span>
                                        <span class="badge bg-info">KYC Verified</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card bg-dark text-white p-3 mb-2">
                                        <small>Username: ${resp.users_data.user_name}</small>
                                        <small>Password: ${resp.users_data.password_show}</small>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card stat-card p-3">
                                        <small>Main Balance</small>
                                        <h4>৳ ${resp.current_wallet_balance}</h4>
                                    </div>
                                </div>
                                <div>
                                    <div class="btn btn-sm bg-danger text-white action-btn suspend_this_account "><i class="bi bi-lock"></i>Suspend</div>
                                    <div class="btn btn-sm ${(resp.users_data.status == 1 ? 'bg-secondary' : 'bg-success')} text-white action-btn ${(resp.users_data.status == 1 ? 'accountActivate' : 'accountActivate')}">${(resp.users_data.status == 1 ? '<i class="fas fa-times-circle"></i>' : '<i class="fas fa-check-circle"></i>')} ${(resp.users_data.status == 1 ? 'Inactive' : 'Active')}</div>
                                </div>
                                <div>
                                    <div class="btn btn-sm bg-success text-white action-btn amount_add_btn "><i class="fa fa-dollar"></i>Add Amount</div>
                                    <div class="btn btn-sm bg-warning text-white action-btn cut_amount_btn "><i class="fas fa-hand-holding-usd"></i>Cut Amount</div>
                                    <div class="custom-popover" id="customPopover"></div>
                                </div>
                            </div>`
                        );
                    }
                }
            });
        }



    });
</script>