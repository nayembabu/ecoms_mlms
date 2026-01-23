

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

      <!-- toastr js  -->
      <script src="inc/plugin/toastr/build/toastr.min.js"></script>

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
        function toggleMenu() {
          document.getElementById('navbarNav').classList.toggle('hidden');
        }
      </script>


        <?php if (session()->getFlashdata('success')): ?>
          <script>
            toastr.success("<?= esc(session()->getFlashdata('success')) ?>");
          </script>
        <?php elseif (session()->getFlashdata('error')): ?>
          <script>
            toastr.error("<?= esc(session()->getFlashdata('error')) ?>");
          </script>
        <?php endif; ?>
         
<script src="https://pl28546719.effectivegatecpm.com/cf/be/2d/cfbe2d9d53236a6567bc99bdd221c037.js"></script>


  </body>

</html>