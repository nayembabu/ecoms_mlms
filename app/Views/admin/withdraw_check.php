
        <style>
            .admin-card{
                border-radius:16px;
                box-shadow:0 10px 30px rgba(0,0,0,.5);
            }
            table{
                color: #e5e7eb;
            }
            .table thead{
                background: #020617;
                color: #e5e7eb;
            }
            .badge-pending{
                background: #facc15;
                color: #ffffff;
            }
            .badge-approved{
                background: #22c55e;
            }
            .badge-rejected{
                background: #ef4444;
            }
            .btn-action{
                border-radius:20px;
                padding:4px 4px;
            }
        </style>

        <div class="container-fluid py-4">
            <h4 class="mb-4">Withdraw Requests</h4>

            <div class="admin-card p-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Method</th>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Request Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="html_tr_set" ></tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            get_pendingwithdraw();
            function get_pendingwithdraw() {
                $.ajax({
                    type: "post",
                    url: "lead/getWithdrawLog",
                    data: "",
                    dataType: "json",
                    success: function (rs) {
                        let withdraw_html = '';
                        for (let ln = 0; ln < rs.with_draws.length; ln++) {
                            withdraw_html += `  <tr>
                                                    <td>${ln+1}</td>
                                                    <td>
                                                        <strong>${rs.with_draws[ln].user_full_name}</strong><br>
                                                        <small class="text-muted">ID: ${rs.with_draws[ln].user_reffer_code_times}</small>
                                                    </td>
                                                    <td>${rs.with_draws[ln].user_withdraw_method}</td>
                                                    <td>${rs.with_draws[ln].user_phone_no}</td>
                                                    <td>৳ ${rs.with_draws[ln].requ_amount_taka}</td>
                                                    <td><span class="badge badge-pending">Pending</span></td>
                                                    <td>${rs.with_draws[ln].date_today}</td>
                                                    <td>
                                                        <div class="btn bg-success text-white btn-sm btn-action approved_btn " withd_i="${rs.with_draws[ln].user_withdraw_request_iddd}" >Approve</div>
                                                        <div class="btn bg-danger text-white btn-sm btn-action reject_btn " withd_i="${rs.with_draws[ln].user_withdraw_request_iddd}" >Reject</div>
                                                    </td>
                                                </tr>`;
                        }
                        $('.html_tr_set').html(withdraw_html);

                    }
                });
            }

            $(document).on('click', '.approved_btn', function () {
                let withdraw_id = $(this).attr('withd_i');

                $.ajax({
                    type: "post",
                    url: "lead/withdrawApproved",
                    data: {id: withdraw_id},
                    success: function (r) {
                        get_pendingwithdraw();
                        alert('success')
                    }
                });
            });

            $(document).on('click', '.reject_btn', function () {
                let withdraw_id = $(this).attr('withd_i');

                $.ajax({
                    type: "post",
                    url: "lead/withdrawRejects",
                    data: {id: withdraw_id},
                    success: function (r) {
                        get_pendingwithdraw();
                        alert('Reject')
                    }
                });
            });
        </script>

