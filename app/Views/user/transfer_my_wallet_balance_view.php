<style>

    .input-group-lg .form-control {
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
      padding: 0.8rem 1.2rem;
      font-size: 1.1rem;
    }
    .input-group-lg .btn {
      background-color: #0056b3;
      color: #fff;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      padding: 0.8rem 1.5rem;
      font-size: 1.1rem;
      transition: all 0.3s ease;
    }
    .input-group-lg .btn:hover {
      background-color: #0056b3;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transform: translateY(-1px);
    }
</style>


<div class="container py-5">
    <div class="row justify-content-center g-4">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">Search Profile for Balance Tranfer</h1>

                    <div class="input-group input-group-lg shadow-sm ">
                        <input type="text" class="form-control person_search_input_box" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        <button class="btn btn-primary search_btn_click " id="inputGroup-sizing-lg">
                            <i class="fa fa-search"></i>  খুঁজুন
                        </button>
                    </div>
                    <div id="userOutput" class="container my-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).on('click', '.search_btn_click', function () {
        let input_val = $('.person_search_input_box').val();
        $.ajax({
            type: "post",
            url: "user/getUserByPhone",
            data: {
                input_data: input_val
            },
            dataType: "json",
            success: function (rss) {
                console.log(rss);

                // চেক করবো রেসপন্সে 'No User Found' আছে কিনা
                if (rss === "No User Found here... " || !rss || Object.keys(rss).length === 0) {
                    $("#userOutput").html(`
                        <div class="alert alert-warning text-center shadow-sm" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            No User Found here... !
                        </div>
                    `);
                    return;
                }else {
                    const html = `
                        <div class="card shadow-sm border-0" style="max-width:500px;margin:auto;">
                            <div class="card-body text-center">
                                <img src="${rss.user_pro_pic_paths}" alt="${rss.user_full_name}" class="rounded-circle mb-3 shadow-sm" width="120" height="120" style="object-fit:cover;">
                                <h5 class="card-title mb-1">${rss.user_full_name}</h5>
                                <p class="text-muted mb-2">${rss.user_email_no}</p>
                                <ul class="list-group list-group-flush text-start">
                                    <li class="list-group-item">
                                        <strong>Address:</strong> ${rss.user_full_address}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Phone:</strong> ${rss.user_phone_no}
                                    </li>
                                </ul>
                                <div></div>
                            </div>
                        </div>
                        <div class="border rounded-3 p-3 bg-light shadow-sm">
                            <label for="transferAmount" class="form-label fw-bold mb-2">
                                💰 Balance Transfer Amount
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-success text-white fw-bold">৳</span>
                                <input type="text" class="form-control" id="transferAmount" placeholder="Type amount..." inputmode="numeric" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="this.value = this.value.replace(/[^0-9]/g, '');"  >
                                <button class="btn btn-success fw-semibold" id="inputGroup-sizing-lg" >
                                    Transfer
                                </button>
                            </div>
                        </div>
                    `;

                    $("#userOutput").html(html);
                }
            }
        });
    });
</script>
<!-- id="btnTransfer"   -->