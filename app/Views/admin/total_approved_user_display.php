



    <div class="container mt-3">
        <center><h2 class="mb-4">পেন্ডিং ইউজার (<?= count($total_approve_user); ?> জন)</h2></center>

        <!-- Responsive wrapper -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">নাম</th>
                        <th scope="col">ফোন</th>
                        <th scope="col">ঠিকানা</th>
                        <th scope="col">ইমেইল</th>
                        <th scope="col">ইউজার আইডি</th>
                        <th scope="col">তারিখ</th>
                        <th scope="col">উইথড্র নাম্বার</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($total_approve_user as $user => $indx) { ?>
                        <tr>
                            <th scope="row"><?= $user+1; ?></th>
                            <td><?= $indx->user_full_name; ?></td>
                            <td><?= $indx->user_phone_no; ?></td>
                            <td><?= $indx->user_full_address; ?></td>
                            <td><?= $indx->user_email_no; ?></td>
                            <td><?= $indx->user_reffer_code_times; ?></td>
                            <td><?= $indx->join_date; ?></td>
                            <td><?= $indx->user_withdraw_nos; ?></td> 
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br><br><br>




