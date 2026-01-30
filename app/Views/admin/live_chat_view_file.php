<!DOCTYPE html>
<html lang="bn">
    <head>
        <base href="<?php echo base_url(); ?>" target="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">

        <title>Live Chat || Royal Chain - Online Banking & Finance</title>
        <link rel="stylesheet" href="inc/plugin/jqui/jquery-ui.min.css">
        <link rel="stylesheet" href="inc/plugin/toastr/build/toastr.min.css">
        <link rel="stylesheet" href="inc/plugin/sweetalert2/dist/sweetalert2.min.css">

        <!-- bootstrap css -->
        <link id="rtl-link" rel="stylesheet" type="text/css" href="inc/assets/css/vendors/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            body {
                background-color: #f4f6f9;
                height: 100vh;
                overflow: hidden;
            }
            .admin-chat-container {
                height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .chat-header {
                background-color: #0d6efd;
                color: white;
                padding: 1rem;
                flex-shrink: 0;
                z-index: 1070;
                position: relative;
            }
            .chat-body {
                flex: 1;
                overflow: hidden;
                display: flex;
            }
            .desktop-sidebar {
                width: 340px;
                background-color: #ffffff;
                border-right: 1px solid #dee2e6;
                overflow-y: auto;
                flex-shrink: 0;
            }
            .offcanvas {
                width: 300px !important;
            }
            .user-item {
                padding: 0.9rem 1rem;
                border-bottom: 1px solid #dee2e6;
                cursor: pointer;
                transition: background-color 0.2s;
            }
            .user-item:hover, .user-item.active {
                background-color: #e3ecff;
            }
            .user-avatar {
                width: 46px;
                height: 46px;
                background-color: #0d6efd;
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 1.1rem;
            }
            .unread-badge {
                background-color: #dc3545;
                font-size: 0.7rem;
                padding: 0.25rem 0.5rem;
            }
            .chat-area {
                flex: 1;
                display: flex;
                flex-direction: column;
                background-color: #f8f9fa;
                position: relative;
            }
            .no-conversation {
                position: absolute;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #6c757d;
                text-align: center;
                z-index: 1;
            }
            .chat-messages {
                flex: 1;
                overflow-y: auto;
                padding: 1.5rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                -webkit-overflow-scrolling: touch;
            }
            .message {
                max-width: 70%;
                padding: 0.75rem 1.1rem;
                border-radius: 18px;
                line-height: 1.5;
                font-size: 0.95rem;
            }
            .message.received {
                background-color: #ffffff;
                align-self: flex-start;
                border-bottom-left-radius: 4px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }
            .message.sent {
                background-color: #0d6efd;
                color: white;
                align-self: flex-end;
                border-bottom-right-radius: 4px;
            }
            .message-time {
                font-size: 0.75rem;
                opacity: 0.8;
                margin-top: 0.35rem;
            }
            .chat-input {
                padding: 1rem;
                background-color: white;
                border-top: 1px solid #dee2e6;
                flex-shrink: 0;
            }
            @media (max-width: 767.98px) {
                .chat-header {
                    padding: 1.2rem 1rem;
                }
                .chat-messages {
                    padding: 1rem;
                }
                .chat-input {
                    padding: 1rem;
                }
                .chat-input input {
                    font-size: 1.05rem;
                }
                .message {
                    max-width: 85%;
                    padding: 0.85rem 1.2rem;
                }
                .user-avatar {
                    width: 50px;
                    height: 50px;
                    font-size: 1.2rem;
                }
                .user-item {
                    padding: 1rem;
                }
            }
        </style>
            <!-- Script Connect  -->
        <script src="inc/plugin/jq3.min.js"></script>
        <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
        <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>

    </head>
    <body>

        <div class="admin-chat-container d-flex flex-column">
            <!-- Header -->
            <div class="chat-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-light d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileUserOffcanvas">
                        <i class="bi bi-list fs-3"></i>
                    </button>
                    <h5 class="mb-0">লাইভ চ্যাট - অ্যাডমিন প্যানেল</h5>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="d-none d-sm-block">অ্যাডমিন: রহিম</span>
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-person-fill text-primary fs-4"></i>
                    </div>
                </div>
            </div>

            <div class="chat-body">
                <!-- ডেস্কটপ সাইডবার -->
                <div class="desktop-sidebar d-none d-md-block">
                    <div class="p-3 border-bottom"></div>

                    <div class="all_user_sidebar " ></div>

                </div>

                <!-- মোবাইল অফক্যানভাস -->
                <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileUserOffcanvas" aria-labelledby="mobileOffcanvasLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="mobileOffcanvasLabel">কথোপকথনসমূহ</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <div class="p-3 border-bottom"></div>

                        <div class="all_user_sidebar "></div>

                    </div>
                </div>

                <!-- চ্যাট এরিয়া -->
                <div class="chat-area">
                    <div class="no-conversation" id="noConversation" >
                        <div class="center-page">
                            <i class="bi bi-chat-left-text fs-1 mb-3 opacity-50"></i>
                            <p class="mb-1">কোনো কথোপকথন নির্বাচিত নয়</p><br>
                            <small>বাম পাশ থেকে একটি ইউজার নির্বাচন করুন</small>
                        </div>
                    </div>

                    <div class="chat-messages" id="messages"></div>

                    <div class="chat-input">
                        <div id="chatForm">
                            <form class="input-group" id="chatFormSendSMS" >
                                <input type="text" class="form-control" style="font-size: 25px;" placeholder="মেসেজ লিখুন..." autocomplete="off" required>
                                <button class="btn btn-primary" style="font-size: 25px;" type="submit">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="inc/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="inc/assets/js/bootstrap/bootstrap-notify.min.js"></script>
        <script src="inc/assets/js/bootstrap/popper.min.js"></script>

        <script>
            const messagesContainer = document.getElementById('messages');
            const noConversation = document.getElementById('noConversation');
            const chatForm = document.getElementById('chatForm');
            const input = chatForm.querySelector('input');

            // ইউজার সিলেক্ট (ডেস্কটপ + মোবাইল)
            document.querySelectorAll('.user-item').forEach(item => {
                item.addEventListener('click', () => {
                    // সবার অ্যাকটিভ রিমুভ
                    document.querySelectorAll('.user-item').forEach(i => i.classList.remove('active'));
                    // অ্যাকটিভ যোগ করো
                    item.classList.add('active');

                    // চ্যাট দেখাও
                    noConversation.style.display = 'none';
                    messagesContainer.parentElement.classList.remove('d-none'); // যদি d-none থাকে

                    // মোবাইলে অফক্যানভাস বন্ধ করো
                    const offcanvasElement = document.getElementById('mobileUserOffcanvas');
                    const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                    if (offcanvas) offcanvas.hide();
                });
            });

            function scrollToBottom(force = false) {
                const isNearBottom =
                    messagesContainer.scrollHeight - messagesContainer.scrollTop - messagesContainer.clientHeight < 100;

                if (force || isNearBottom) {
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }
            }
            scrollToBottom(true); // force scroll on own message

            // ডেমো সেন্ড
            chatForm.addEventListener('submit', (e) => {
                e.preventDefault();
                if (input.value.trim() === '') return;

                const newMsg = document.createElement('div');
                newMsg.classList.add('message', 'sent');
                newMsg.innerHTML = `
                    ${input.value}
                    <div class="message-time">${new Date().toLocaleTimeString('bn-BD', {hour: 'numeric', minute: 'numeric'})}</div>
                `;
                messagesContainer.appendChild(newMsg);
                input.value = '';
                scrollToBottom();
            });

            // প্রথমে চ্যাট দেখাও (প্রথম ইউজার অ্যাকটিভ)
            noConversation.style.display = 'block';
        </script>

        <script>
            let CHAT = {};
            let ACTIVE_USER = null;

            $(document).ready(function () {
                // loadChats();
                // all_user_sidebar


                loadChats();
                setInterval(loadChats, 2000);

            });

            function loadChats(){
                $.getJSON("<?= base_url('lead/getLiveChatSMS') ?>", rows => {
                    CHAT = groupByUser(rows);
                    renderUsers();
                    if (ACTIVE_USER) renderMessages(ACTIVE_USER);
                });
            }

            function groupByUser(rows){
                const data = {};
                rows.forEach(r=>{
                    data[r.user_id_id] ??= {
                        name: r.user_full_name,
                        msgs: []
                    };
                    data[r.user_id_id].msgs.push(r);
                });
                return data;
            }

            function renderUsers(){
                let html = '';
                Object.entries(CHAT).forEach(([uid,u])=>{
                    const last = u.msgs.at(-1);
                    html += `<div class="user-item ${uid==ACTIVE_USER?'active':''}" data-id="${uid}" data-user="user1">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-avatar">U</div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">${u.name}</div>
                                        <small class="text-muted">${last.msg_typing}</small>
                                    </div>
                                </div>
                            </div>`;
                });
                $('.all_user_sidebar').html(html);
            }

            function renderMessages(uid){
                const u = CHAT[uid];
                if (!u) return;

                $('#messages').html(
                    u.msgs.map(m=>`
                        <div class="message ${m.admin_user == 1 ? 'sent':'received'}">
                            ${m.msg_typing}
                            <div class="message-time">${m.this_time}</div>
                        </div>
                    `).join('')
                );
                $('#noConversation').hide();
            }

            $(document).on('click','.user-item',function(){
                ACTIVE_USER = $(this).data('id');
                renderUsers();
                renderMessages(ACTIVE_USER);
                scrollToBottom(true);
            });

            function sendMessage(text){
                if(!ACTIVE_USER || !text) return;
                $.post("<?= base_url('lead/sendSMSForUser') ?>",{
                    user_id: ACTIVE_USER,
                    message: text
                }, loadChats);
                scrollToBottom(true);
            }

            $('#chatFormSendSMS').submit(e=>{
                e.preventDefault();
                const input = e.target.querySelector('input');
                sendMessage(input.value);
                input.value='';
                scrollToBottom(true);
            });
        </script>











    </body>
</html>