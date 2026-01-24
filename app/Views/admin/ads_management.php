
    <style>
        .card-header {
            background: linear-gradient(90deg, #007bff, #6610f2);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }
        .btn-gradient {
            background: linear-gradient(90deg, #007bff, #6610f2);
            border: none;
        }
        .btn-gradient:hover {
            opacity: 0.9;
        }
        .table img {
            max-height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
        .action-btn {
            font-size: 0.9rem;
            padding: 0.375rem 0.75rem;
        }
    </style>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header text-center py-4">
                <h2 class="mb-0"><i class="bi bi-megaphone-fill me-3"></i>Ads Management System</h2>
            </div>
            <div class="card-body p-4">
                <!-- Ad Form -->
                <h4 id="formTitle" class="mb-4">Add New Ad</h4>
                <div id="adForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Ad Title</label>
                            <input type="text" class="form-control adFormTitle" id="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Target URL</label>
                            <input type="url" class="form-control adFormLink" id="targetUrl" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ads Reward</label>
                            <input type="text" class="form-control adFormReward" id="title" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control adFormTime" id="imageUrl" required>
                        </div>
                        <div class="col-12">
                            <div id="submitBtn" class="btn btn-gradient text-white px-5">Add Ad</div>
                            <div id="cancelBtn" class="btn btn-secondary ms-2" style="display:none;">Cancel</div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <!-- Ads Table -->
                <h4 class="mb-4">Ads List</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Target URL</th>
                                <th>Image</th>
                                <th>Reward</th>
                                <th>Time</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="adsTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
                    <h5 class="modal-title">Ad Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h5 id="viewTitle"></h5>
                    <p><strong>Description:</strong> <span id="viewDescription"></span></p>
                    <p><strong>Image:</strong></p>
                    <img id="viewImage" class="img-fluid rounded shadow" style="max-height: 400px;">
                    <p class="mt-3"><strong>Target URL:</strong> <a id="viewTarget" href="#" target="_blank"></a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs.dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            loadAds();
            function loadAds() {

                $.ajax({
                    type: "get",
                    url: "lead/getAds",
                    data: "",
                    dataType: "json",
                    success: function (ads) {

                        let htmlrow = '';
                        ads.forEach((ad, index) => {
                            htmlrow += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${ad.ads_title || ''}</td>
                                    <td><a href="${ad.ads_link}" target="_blank" class="text-truncate d-block" style="max-width:150px;">${ad.ads_link}</a></td>
                                    <td><img src="${ad.ads_image}" class="img-thumbnail" width="80px" style="border-radius: 50px;"></td>
                                    <td align="center">${ad.ads_reward}</td>
                                    <td align="center">${ad.ads_view_time_sec}</td>
                                    <td class="text-center">
                                        <div class="btn btn-warning btn-sm action-btn" onclick="editAd(${ad.id})"><i class="bi bi-pencil"></i></div>
                                        <div class="btn btn-danger btn-sm action-btn" onclick="deleteAd(${ad.id})"><i class="bi bi-trash"></i></div>
                                    </td>
                                </tr>`;
                        });
                        $('#adsTableBody').html(htmlrow);

                    }
                });
            }

            $(document).on('click', '#submitBtn', function () {
                let adFormTitle     = $('.adFormTitle').val();
                let adFormLink      = $('.adFormLink').val();
                let adFormReward    = $('.adFormReward').val();
                let adFormTime      = $('.adFormTime').val();

                $.ajax({
                    type: "post",
                    url: "lead/insertNewAds",
                    data: {
                        adFormTitle: adFormTitle,
                        adFormLink: adFormLink,
                        adFormReward: adFormReward,
                        adFormTime: adFormTime,
                    },
                    success: function (sp) {
                        loadAds();
                        $('.adFormTitle').val('');
                        $('.adFormLink').val('');
                        $('.adFormReward').val('');
                        $('.adFormTime').val('');
                    }
                });

            });

            function editAd(ads_id) {  }
            function deleteAd(ads_id) {  }


        });
    </script>