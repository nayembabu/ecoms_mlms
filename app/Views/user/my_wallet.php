
<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">

  <!-- Main Container -->
    <div class="row mb-4">
      <!-- Balance Card -->
      <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h6 class="text-muted">Available Balance</h6>
            <h2 class="fw-bold text-success fs-3 ">৳3,250.50</h2>
          </div>
        </div>
      </div>

      <!-- Summary -->
      <div class="col-md-6">
        <div class="row g-3">
          <div class="col-6">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h6>Total Income</h6>
                <p class="text-success fw-bold">৳5,420</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h6>Total Expense</h6>
                <p class="text-danger fw-bold">৳2,170</p>
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
              <tr>
                <td>Nov 1, 2025</td>
                <td>Freelance Project</td>
                <td>Upwork</td>
                <td class="text-success fw-bold">+$450</td>
              </tr>
              <tr>
                <td>Oct 25, 2025</td>
                <td>Salary Payment</td>
                <td>Company ABC</td>
                <td class="text-success fw-bold">+$3,000</td>
              </tr>
              <tr>
                <td>Oct 10, 2025</td>
                <td>Stock Dividend</td>
                <td>Robinhood</td>
                <td class="text-success fw-bold">+$150</td>
              </tr>
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
              <tr>
                <td>Nov 2, 2025</td>
                <td>Grocery Shopping</td>
                <td>Food</td>
                <td class="text-danger fw-bold">-$75</td>
              </tr>
              <tr>
                <td>Oct 28, 2025</td>
                <td>Electric Bill</td>
                <td>Utilities</td>
                <td class="text-danger fw-bold">-$120</td>
              </tr>
              <tr>
                <td>Oct 15, 2025</td>
                <td>Netflix Subscription</td>
                <td>Entertainment</td>
                <td class="text-danger fw-bold">-$15</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


<?php 

    
    echo "<pre>";
    // পুরো তথ্য 
    print_r ($user_info);

    // এই ভ্যারিয়েবলে তার বর্তমান ওয়ালেট ব্যালেন্স আছে। 
    print_r ($current_wallet_balance);


    // এই লোকের টাকা লোড করার সব ডাটা একসাথে আছে। 
    print_r ($added_amounts);


    // এখানে wallet থেকে কাটা টাকার সব ডাটা আছে। 
    print_r ($used_amounts);
    echo "</pre>";


?>


    </div>
</section>
