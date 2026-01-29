<!DOCTYPE html>
<html lang="bn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>অ্যাডমিন লাইভ চ্যাট - Bootstrap 5 (আরও রেস্পন্সিভ)</title>

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

            /* ডেস্কটপ সাইডবার */
            .desktop-sidebar {
                width: 340px;
                background-color: #ffffff;
                border-right: 1px solid #dee2e6;
                overflow-y: auto;
                flex-shrink: 0;
            }

            /* মোবাইল অফক্যানভাস */
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

            /* মোবাইল অপটিমাইজেশন */
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
                    <div class="p-3 border-bottom">
                        <input type="text" class="form-control" placeholder="ইউজার খুঁজুন...">
                    </div>
                    <div class="user-item active" data-user="user1">
                        <div class="d-flex align-items-center gap-3">
                            <div class="user-avatar">আ</div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">আলী হোসেন</div>
                                <small class="text-muted">হাই, আমার অর্ডার...</small>
                            </div>
                            <span class="badge rounded-pill unread-badge">3</span>
                        </div>
                    </div>
                    <div class="user-item" data-user="user2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="user-avatar">ফ</div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">ফাতেমা বেগম</div>
                                <small class="text-muted">পেমেন্ট ইস্যু</small>
                            </div>
                        </div>
                    </div>
                    <div class="user-item" data-user="user3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="user-avatar">ক</div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">করিম উদ্দিন</div>
                                <small class="text-muted">প্রোডাক্ট সম্পর্কে...</small>
                            </div>
                            <span class="badge rounded-pill unread-badge">1</span>
                        </div>
                    </div>
                </div>

                <!-- মোবাইল অফক্যানভাস -->
                <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileUserOffcanvas" aria-labelledby="mobileOffcanvasLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="mobileOffcanvasLabel">কথোপকথনসমূহ</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <div class="p-3 border-bottom">
                            <input type="text" class="form-control" placeholder="ইউজার খুঁজুন...">
                        </div>
                        <div class="user-item active" data-user="user1">
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar">আ</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">আলী হোসেন</div>
                                    <small class="text-muted">হাই, আমার অর্ডার...</small>
                                </div>
                                <span class="badge rounded-pill unread-badge">3</span>
                            </div>
                        </div>
                        <div class="user-item" data-user="user2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar">ফ</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">ফাতেমা বেগম</div>
                                    <small class="text-muted">পেমেন্ট ইস্যু</small>
                                </div>
                            </div>
                        </div>
                        <div class="user-item" data-user="user3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar">ক</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">করিম উদ্দিন</div>
                                    <small class="text-muted">প্রোডাক্ট সম্পর্কে...</small>
                                </div>
                                <span class="badge rounded-pill unread-badge">1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- চ্যাট এরিয়া -->
                <div class="chat-area">
                    <div class="no-conversation" id="noConversation">
                        <div>
                            <i class="bi bi-chat-left-text fs-1 mb-3 opacity-50"></i>
                            <p class="mb-1">কোনো কথোপকথন নির্বাচিত নয়</p>
                            <small>বাম পাশ থেকে একটি ইউজার নির্বাচন করুন</small>
                        </div>
                    </div>

                    <div class="chat-messages" id="messages">
                        <!-- ডেমো মেসেজ -->
                        <div class="message received">
                            হাই! আমার অর্ডার #12345 কবে ডেলিভারি হবে?
                            <div class="message-time">২:১৫ PM</div>
                        </div>
                        <div class="message sent">
                            হ্যালো! আপনার অর্ডার প্রসেসিংয়ে আছে। আগামীকাল ডেলিভারি হবে।
                            <div class="message-time">২:১৭ PM</div>
                        </div>
                        <div class="message received">
                            ঠিক আছে, ধন্যবাদ!
                            <div class="message-time">২:১৮ PM</div>
                        </div>
                    </div>

                    <div class="chat-input">
                        <form id="chatForm">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="মেসেজ লিখুন..." autocomplete="off" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </div>
                        </form>
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

            // অটো স্ক্রল
            function scrollToBottom() {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
            scrollToBottom();

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
            noConversation.style.display = 'none';
        </script>
    </body>
</html>