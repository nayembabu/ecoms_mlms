<style>
  .profile-card{border:0;border-radius:1.25rem;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.08)}
  .profile-card .card-header{background:linear-gradient(135deg,#7b2ff7,#f107a3,#ff5858);background-size:200% 200%;animation:hueFlow 6s ease infinite;color:#fff}
  @keyframes hueFlow{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
  .profile-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(255,255,255,.15);color:#fff;padding:.4rem .8rem;border-radius:999px;backdrop-filter:blur(4px)}
  .info-label{font-size:.85rem;color:#6c757d;margin:0}
  .info-value{font-weight:600;margin:0;word-break:break-word}
  .avatar{width:96px;height:96px;border-radius:50%;object-fit:cover;border:3px solid rgba(255,255,255,.7);box-shadow:0 8px 20px rgba(0,0,0,.1)}
  .btn-gradient{border:0;color:#fff;background:linear-gradient(135deg,#6a11cb,#2575fc);box-shadow:0 8px 20px rgba(37,117,252,.35)}
  .btn-gradient:hover{filter:brightness(1.05)}
  .modal-header{background:linear-gradient(135deg,#ff9966,#ff5e62);color:#fff;border-bottom:0}
  .form-control{border-radius:.9rem}
  .swal2-popup{border-radius:1rem!important}
</style>

<div class="container-fluid-lg py-4">
  <div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-11 col-12">
      <div class="card profile-card">
        <div class="card-header d-flex align-items-center justify-content-between p-3 p-md-4">
          <div class="d-flex align-items-center gap-3">
            <img class="avatar" id="uiAvatar" src="./inc/user_pic/1760379485_695e62e5f65ea16c3644.png" alt="User Avatar">
            <div>
              <h4 class="mb-1 d-flex align-items-center gap-2"><i class="fa-solid fa-user"></i><span id="uiName"></span></h4>
              <span class="profile-badge"><i class="fa-solid fa-id-badge"></i> ID: <span id="uiId"></span></span>
            </div>
          </div>
          <button id="btnEdit" type="button" class="btn btn-gradient px-4 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</button>
        </div>
        <div class="card-body p-3 p-md-4">
          <div class="row g-3 g-md-4">
            <div class="col-sm-6">
              <p class="info-label"><i class="fa-solid fa-user-pen me-1"></i> Full Name</p>
              <p class="info-value" id="uiName2"><?= esc($user['user_full_name']) ?></p>
            </div>
            <div class="col-sm-6">
              <p class="info-label"><i class="fa-solid fa-envelope me-1"></i> Email</p>
              <p class="info-value" id="uiEmail"></p>
            </div>
            <div class="col-sm-6">
              <p class="info-label"><i class="fa-solid fa-phone me-1"></i> Phone</p>
              <p class="info-value" id="uiPhone"></p>
            </div>
            <div class="col-12">
              <p class="info-label"><i class="fa-solid fa-location-dot me-1"></i> Address</p>
              <p class="info-value" id="uiAddress"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="userEditForm" class="modal-content needs-validation">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Profile</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3 p-md-4">
        <input type="hidden" name="user_id" id="user_id" value="<?= esc($user['user_full_info_idd']) ?>">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="user_full_name" id="user_full_name" value="<?= esc($user['user_full_name']) ?>" required>
            <div class="invalid-feedback">Full name is required.</div>
          </div>
          <div class="col-12">
            <label class="form-label">Address</label>
            <textarea class="form-control" rows="3" name="user_full_address" id="user_full_address" value="<?= esc($user['user_full_address']) ?>"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-1"></i> Close</button>
        <button id="btnSave" type="submit" class="btn btn-gradient px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Save Changes</button>
      </div>
    </form>
  </div>
</div>

<script>
  const userData={name:"<?= esc($user['user_full_name']) ?>",email:"<?= esc($user['user_email_no']) ?>",phone:"<?= esc($user['user_phone_no']) ?>",address:"<?= esc($user['user_full_address']) ?>",avatar:"<?= esc($user['user_pro_pic_paths']) ?>"};

  function hasSwal(){return typeof window.Swal==="function"}
  function toast(icon,title,ms=1200){
    if(hasSwal()) Swal.fire({toast:true,position:"top-end",showConfirmButton:false,timer:ms,icon,title});
    else console.log(icon.toUpperCase()+": "+title);
  }
  function alertBox(icon,title,text){
    if(hasSwal()) Swal.fire({icon,title,text,confirmButtonText:"OK",buttonsStyling:false,customClass:{confirmButton:"btn btn-gradient px-4"}});
    else alert((title?title+"\n":"")+(text||""));
  }

  function paintUser(u){
    $("#uiId").text(u.id||"");
    $("#uiName, #uiName2").text(u.name||"");
    $("#uiEmail").text(u.email||"");
    $("#uiPhone").text(u.phone||"");
    $("#uiAddress").text(u.address||"");
    if(u.avatar) $("#uiAvatar").attr("src",u.avatar);
  }

  function fillForm(u){
    $("#user_id").val("<?= esc($user['user_full_info_idd']) ?>");
    $("#user_full_name").val("<?= esc($user['user_full_name']) ?>");
    $("#user_full_address").val("<?= esc($user['user_full_address']) ?>");
  }
  $(document).ready(function() {
  $('#userEditForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: '<?= site_url('user/edit-profile') ?>',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        if (response.success) {
          toast('success', 'Profile updated successfully!');
          $('#editModal').modal('hide');
          location.reload();
        } else {
          alertBox('error', 'Error', response.message || 'An error occurred while updating the profile.');
        }
      },
    });
  });
});
  $(function(){
    paintUser(userData);

    $("#btnEdit").off("click").on("click",function(){toast("info","Editing profile...")});
    $("#editModal").off("shown.bs.modal").on("shown.bs.modal",function(){fillForm(userData)});
  });
</script> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>