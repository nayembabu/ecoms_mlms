
  <style>
    /* অতিরিক্ত সুন্দর করার জন্য (ঐচ্ছিক) */
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    #mainNavbar .nav-link {
        font-weight: 500;
    }
  </style>


<!-- মাঝখানে মেনু -->
<nav class="navbar navbar-expand-lg bg-info navbar-light">
  <div class="container">

    <!-- ব্র্যান্ড / লোগো (বামে) -->
    <a class="navbar-brand" href="lead/dashboard">RoyalChain</a>

    <!-- টগল বাটন (মোবাইলে দেখাবে) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- মেনু আইটেমগুলো - মাঝখানে -->
    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="lead/dashboard">হোম</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lead/user">পোলাপান</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lead/product">পন্য</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lead/product_buy">পন্য ক্রয়</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lead/category">Cat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lead/subcat">SubCat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout">লগআউট</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
