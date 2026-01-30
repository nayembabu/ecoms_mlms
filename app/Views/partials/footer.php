


    <?php $session = $session ?? \Config\Services::session(); if ($session->get('isLoggedIn')) { ?>
      <!-- Floting chat section start -->
      <div class="floting_chat_section_ful">
        <!-- ফ্লোটিং টগল বাটন  -->
        <div class="lc-floating-btn" id="lc-toggle-btn">
            <i class="bi bi-chat-dots-fill"></i>
        </div>

        <!-- Chat Window -->
        <div class="lc-chat-window" id="lc-chat-window">

            <!-- Header -->
            <div class="lc-chat-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-person-fill text-primary fs-4"></i>
                    </div>
                    <div>
                        <strong>Admin</strong><br>
                        <small>মেসেজ পাঠান</small>
                    </div>
                </div>
                <button class="btn-close btn-close-white" id="lc-close-btn"></button>
            </div>

            <!-- Messages -->
            <div class="lc-chat-messages show_all_masseges " id="lc-messages"></div>

            <!-- Input -->
            <div class="lc-chat-input">
                <div id="lc-chat-form">
                    <form class="input-group send_msg_to_admin">
                        <input type="text" class="form-control border-0 shadow-none typing_messegesss" placeholder="টাইপ করুন..." required>
                        <div class="btn bg-primary rounded text-white ">
                            <i class="bi bi-send-fill"></i>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- Floting chat section end -->
       <script>
          // Mobile VH fix
          const setVH = () => {
              document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
          };
          setVH();
          window.addEventListener('resize', setVH);

          const toggleBtn = document.getElementById('lc-toggle-btn');
          const closeBtn  = document.getElementById('lc-close-btn');
          const chatBox   = document.getElementById('lc-chat-window');
          const form      = document.getElementById('lc-chat-form');
          const messages  = document.getElementById('lc-messages');
          const input     = form.querySelector('input');

          function scrollToBottom(force = false) {
              const isNearBottom =
                  messages.scrollHeight - messages.scrollTop - messages.clientHeight < 100;

              if (force || isNearBottom) {
                  messages.scrollTop = messages.scrollHeight;
              }
          }
          scrollToBottom(true); // force scroll on own message


          toggleBtn.onclick = () => {
              chatBox.classList.toggle('lc-open');
              setTimeout(() => input.focus(), 400);
          };
          closeBtn.onclick = () => chatBox.classList.remove('lc-open');

          $(document).on('submit', '.send_msg_to_admin', function (e) {
            e.preventDefault();
            let typing_messegesss = $('.typing_messegesss').val();
            if (typing_messegesss == '') {
              toastr.error('Type Anything');
            }else {
              $.ajax({
                type: "post",
                url: "user/livechat_sendmsg",
                data: {
                  msg: typing_messegesss
                },
                success: function (rsp) {
                  getAllLiveChat();
                  $('.typing_messegesss').val('');
                  scrollToBottom(true);
                }
              });
            }
          });

          getAllLiveChat();
          const chatInterval = setInterval(() => {
              getAllLiveChat();
          }, 5000);
          function stopChatPolling() {
              clearInterval(chatInterval);
              console.log('Live chat polling বন্ধ করা হয়েছে');
          }
          window.addEventListener('beforeunload', stopChatPolling);

          function getAllLiveChat() {
            $.ajax({
              type: "get",
              url: "user/getAllChats",
              data: "",
              dataType: "json",
              success: function (chats) {
                let html_view = '';
                for (let nn = 0; nn < chats.length; nn++) {
                  html_view += `<div class="lc-message ${chats[nn].admin_user == 0 ? 'sent' : 'received' }">
                                    ${chats[nn].msg_typing}
                                    <div class="lc-message-time">${chats[nn].this_time} - ${chats[nn].this_dates}</div>
                                </div>`;
                }
                $('.show_all_masseges').html(html_view);
                scrollToBottom(true);
              }
            });
          }

       </script>
    <?php } ?>





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



  </body>

</html>