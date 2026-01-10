



  <style>
    .result-dropdown {
      position: absolute;
      z-index: 1050;
      width: 100%;
      max-height: 320px;
      overflow-y: auto;
      background: white;
      border: 1px solid #ced4da;
      border-radius: 0 0 0.375rem 0.375rem;
      box-shadow: 0 6px 16px rgba(0,0,0,0.18);
      display: none;
    }
    .result-item {
      padding: 10px 15px;
      cursor: pointer;
      border-bottom: 1px solid #eee;
    }
    .result-item:hover,
    .result-item:focus {
      background-color: #e9ecef;
    }
    .result-item:last-child {
      border-bottom: none;
    }
    .text-small {
      font-size: 0.85rem;
      color: #6c757d;
    }
  </style>




<div class="container mt-3 ">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

      <h3 class="mb-1 text-center">ইউজার সার্চ</h3>

      <div class="position-relative">
        <input type="text" class="form-control form-control-lg shadow-sm" id="liveSearch" placeholder="মোবাইল, ইউজারনেম, ইমেইল লিখুন " autocomplete="off">

        <!-- সার্চ রেজাল্ট ড্রপডাউন -->
        <div class="result-dropdown shadow" id="searchResults"></div>
      </div>

    </div>
  </div>
</div>


<script>
$(document).ready(function() {

  // ডিবাউন্স ফাংশন (অনেক দ্রুত টাইপ করলে সার্ভারে অতিরিক্ত চাপ পড়বে না)
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  const $searchInput = $('#liveSearch');
  const $resultsContainer = $('#searchResults');

  // লাইভ সার্চ ফাংশন
  const doSearch = debounce(function(query) {
    if (query.length < 2) {
      $resultsContainer.hide();
      return;
    }

    $.ajax({
      url: 'search_users.php',          // তোমার ব্যাকএন্ড ফাইল
      method: 'GET',
      data: { q: query },
      dataType: 'json',
      success: function(data) {
        $resultsContainer.empty();

        if (data.length === 0) {
          $resultsContainer.append(
            '<div class="result-item text-muted">কোনো ইউজার পাওয়া যায়নি</div>'
          );
        } else {
          $.each(data, function(index, user) {
            const item = `
              <div class="result-item" data-id="${user.id}">
                <div><strong>${user.name}</strong></div>
                <div class="text-small">${user.email} • ID: ${user.id}</div>
              </div>
            `;
            $resultsContainer.append(item);
          });
        }

        $resultsContainer.show();
      },
      error: function() {
        $resultsContainer.html(
          '<div class="result-item text-danger">কিছু সমস্যা হয়েছে, আবার চেষ্টা করুন</div>'
        ).show();
      }
    });
  }, 300);

  // ইনপুটে টাইপ করার সাথে সাথে সার্চ
  $searchInput.on('input', function() {
    const query = $(this).val().trim();
    doSearch(query);
  });

  // রেজাল্টে ক্লিক করলে
  $resultsContainer.on('click', '.result-item', function() {
    if ($(this).find('.text-danger').length || $(this).find('.text-muted').length) {
      return;
    }

    const name = $(this).find('strong').text();
    $searchInput.val(name);
    $resultsContainer.hide();

  });

  // বাইরে ক্লিক করলে ড্রপডাউন বন্ধ
  $(document).on('click', function(e) {
    if (!$(e.target).closest('.position-relative').length) {
      $resultsContainer.hide();
    }
  });

});
</script>