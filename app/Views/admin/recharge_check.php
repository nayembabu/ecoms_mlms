
    <style>
        .status-badge {
            font-size: 0.85rem;
        }
        .table-actions button {
            min-width: 90px;
        }
    </style>


    <div class="container py-5">

        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-white fw-bold fs-5">
                💰 Customer Deposit Requests
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Txn ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="recharge_data" ></tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        get_unapprove_recharge();
        function get_unapprove_recharge() {
            $.ajax({
                type: "get",
                url: "lead/getUnApproveRecharge",
                data: "",
                dataType: "json",
                success: function (sp) {
                    let data_html = '';
                    for (let nn = 0; nn < sp.length; nn++) {
                        data_html += `<tr>
                                        <td>${nn+1}</td>
                                        <td>
                                            <strong>${sp[nn].user_full_name}</strong><br>
                                            <small class="text-muted">${sp[nn].user_email_no} -> </small>
                                            <small class="text-muted">${sp[nn].user_reffer_code_times}</small>
                                        </td>
                                        <td>${sp[nn].payment_text}</td>
                                        <td>৳ ${sp[nn].amount_dep}</td>
                                        <td>${sp[nn].trxids}</td>
                                        <td>${sp[nn].dateing}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark status-badge">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="text-center table-actions">
                                            <div class="btn bg-success btn-sm text-white approve-btn approves_btn " dep_id="${sp[nn].user_recharge_history_idd}" >Approve</div>
                                            <div class="btn bg-danger btn-sm text-white approve-btn rejected_btns " dep_id="${sp[nn].user_recharge_history_idd}" >Reject</div>
                                        </td>
                                    </tr>`;
                    }
                    $('.recharge_data').html(data_html);
                }
            });
        }

        $(document).on('click', '.approves_btn', function () {
            let dept_id = $(this).attr('dep_id');

            $.ajax({
                type: "post",
                url: "lead/approveDepositeAmount",
                data: {id: dept_id},
                success: function (response) {
                    get_unapprove_recharge()
                    alert('success')
                }
            });
        });

        $(document).on('click', '.rejected_btns', function () {
            let dept_id = $(this).attr('dep_id');

            $.ajax({
                type: "post",
                url: "lead/rejectRechargeAmount",
                data: {id: dept_id},
                success: function (response) {
                    get_unapprove_recharge()
                    alert('Reject')
                }
            });
        });
    </script>






