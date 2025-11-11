

    <!-- Footer
    <footer class="footer text-center text-muted">
      <div class="container">
        <p class="mb-0">© 2025 MLM Pro — ডিজাইন স্মুথ ভার্সন Bootstrap 5</p>
      </div>
    </footer>-->

      <!-- Bootstrap js-->
      <script src="inc/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="inc/assets/js/bootstrap/bootstrap-notify.min.js"></script>
      <script src="inc/assets/js/bootstrap/popper.min.js"></script>

      <!-- feather icon js-->
      <script src="inc/assets/js/feather/feather.min.js"></script>
      <script src="inc/assets/js/feather/feather-icon.js"></script>

      <!-- Lazyload Js -->
      <script src="inc/assets/js/lazysizes.min.js"></script>

      <!-- Slick js-->
      <script src="inc/assets/js/slick/slick.js"></script>
      <script src="inc/assets/js/slick/slick-animation.min.js"></script>
      <script src="inc/assets/js/slick/custom_slick.js"></script>

      <!-- Auto Height Js -->
      <script src="inc/assets/js/auto-height.js"></script>

      <!-- Fly Cart Js -->
      <script src="inc/assets/js/fly-cart.js"></script>

      <!-- Quantity js -->
      <script src="inc/assets/js/quantity-2.js"></script>

      <!-- WOW js -->
      <script src="inc/assets/js/wow.min.js"></script>
      <script src="inc/assets/js/custom-wow.js"></script>

      <!-- script js -->
      <script src="inc/assets/js/script.js"></script>

      <script>
          $(function() {
            $(".date_pick").datepicker({
              dateFormat: "yy-mm-dd",     // ফরম্যাট yyyy-mm-dd
              changeMonth: true,          // মাস পরিবর্তন করা যাবে
              changeYear: true,           // বছর পরিবর্তন করা যাবে
              showButtonPanel: true,      // Today ও Done বাটন
              showAnim: "slideDown"       // খোলার সময় অ্যানিমেশন
            });
          });
      </script>


      <script>
        assign_wallet_balance();
        function assign_wallet_balance() {
          $.ajax({
            type: "post",
            url: "user/amountWallet",
            data: "",
            dataType: "json",
            success: function (res) {
              $('.this_wallet_amount').text(res);
            }
          });
        }
      </script>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('success')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


  </body>

</html>