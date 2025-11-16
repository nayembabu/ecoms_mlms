
<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">

  <!-- Main Container -->
    <div class="row mb-4">
      <!-- Balance Card -->
      <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0 ">
          <div class="card-body row">
            <div class="col-6 col-md-6 text-center ">
              <h6 class="text-muted">Available Balance</h6>
              <h2 class="fw-bold text-success fs-3 ">৳<?php echo number_format($current_wallet_balance, 1); ?></h2>
            </div>
            <div class="col-3 col-md-3">
              <a class="btn btn-primary bg-success text-white " data-bs-toggle="modal" data-bs-target="#depositeModals" >Deposite</a>
            </div>
            <?php if ($my_info->sts != 0) { ?>
              <div class="col-3 col-md-3">
                <a href="user/withdraw" class="btn btn-primary bg-danger text-white ">Withdraw</a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Summary -->
      <div class="col-md-6">
        <div class="row g-3">
          <div class="col-4">
            <div class="card text-center border-0 shadow-sm">
              <?php if ($my_info->sts != 0) { ?>
                <div class="card-body">
                  <a href="user/balanceTransfer" class="text-white fw-bold btn btn-primary bg-primary ">Transfer Balance</a>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-4">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h5>Total Income</h5>
                <p class="text-success fw-bold  fs-4 mt-1 ">৳<?= number_format($user_added_wallet, 1); ?></p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h5>Total Expense</h5>
                <p class="text-danger fw-bold  fs-4 mt-1 ">৳<?= number_format($user_used_wallet, 1); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row ">
      <!-- Income History -->
      <div class="col-md-6 mb-3 card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">Income History</h5>
        </div>
        <div class="card-body">
          <table class="table table-hover align-middle">
            <thead class="table-success">
              <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Source</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($added_amounts as $add) { ?>
                <tr>
                  <td><?= date('F d, Y', $add->times_stamps); ?></td>
                  <td><?= $add->payment_description; ?></td>
                  <td><?= $add->amount_perpose; ?></td>
                  <td class="text-success fw-bold">৳<?= $add->added_amount; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Expense History -->
      <div class="col-md-6 mb-3 card shadow-sm border-0 mb-4">
        <div class="card-header bg-danger text-white">
          <h5 class="mb-0">Expense History</h5>
        </div>
        <div class="card-body">
          <table class="table table-hover align-middle">
            <thead class="table-danger">
              <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Category</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($used_amounts as $cut) { ?>
                <tr>
                  <td><?= date('F d, Y', $cut->time_stamps); ?></td>
                  <td><?= $cut->cut_descs; ?></td>
                  <td><?= $cut->cutting_perpose; ?></td>
                  <td class="text-danger fw-bold">৳ <?= $cut->cutting_amounts; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
</section>





  <!-- Modal -->
  <div class="modal fade" id="depositeModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white ">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mb-5 mt-5 ">
          <center><h1> Join our Telegram Group and recharge. </h1></center>
        </div>
      </div>
    </div>
  </div>