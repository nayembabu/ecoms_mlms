
<style>
  /* ============ Design Tokens ============ */
  :root{
    --bg: #fafafa;
    --card: #ffffff;
    --text: #1d1d1f;
    --muted: #6b7280;
    --line: #c9ced6;
    --accent: #2563eb;
    --shadow: 0 8px 24px rgba(0,0,0,.06);
  }
  @media (prefers-color-scheme: dark){
    :root{
      --bg: #ffffffff;
      --card: #12151a;
      --text: #e5e7eb;
      --muted: #9aa3b2;
      --line: #2a3441;
      --accent: #60a5fa;
      --shadow: 0 8px 24px rgba(0,0,0,.35);
    }
  }

  /* ============ Container ============ */
  .team_container{
    display:flex;
    justify-content:center;
    align-items:flex-start;
    min-height:100vh;
    padding:40px 16px;
    background: var(--bg);
    overflow-x:auto; /* বড় ট্রি হলে স্ক্রল করা যাবে */
  }

  /* ============ Tree Reset ============ */
  .team_main_list_ul, .team_main_list_ul ul{
    margin:0; padding:0; list-style:none;
    position:relative;
  }

  .team_main_list_ul{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:12px;
    max-width:1200px;
    width:max-content;
  }

  .team_main_list_ul > li{ position:relative; text-align:center; }

  /* ============ Node Card ============ */
  .person_cls{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:10px 16px;
    border:1px solid var(--line);
    background: var(--card);
    color: var(--text);
    border-radius:12px;
    box-shadow: var(--shadow);
    text-decoration:none;
    font-weight:600;
    line-height:1.2;
    white-space:normal;
    word-break:break-word;
    cursor: pointer;
    transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
  }
  .person_cls:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(0,0,0,.08);
    border-color: var(--accent);
    color: var(--text);
  }
  .person_cls:focus{
    outline: 3px solid color-mix(in srgb, var(--accent) 40%, transparent);
    outline-offset: 2px;
  }
  
  .person_cls:hover{
    transform:translateY(-2px);
    box-shadow: var(--shadow-lg);
    border-color:var(--accent);
  }
  /* ============ Desktop / Large (>= 641px) ============ */
  @media (min-width: 641px){
    /* children list horizontally */
    .team_main_list_ul ul{
      display:flex;
      justify-content:center;
      gap:40px;
      padding-top:28px;      /* parent থেকে নিচে লাইন নামানোর স্পেস */
    }

    /* vertical line from parent to children row */
    .team_main_list_ul ul::before{
      content:"";
      position:absolute;
      top:0; left:50%;
      transform: translateX(-50%);
      width:0; height:28px;
      border-left:2px solid var(--line);
    }

    /* each child item box spacing + connectors */
    .team_main_list_ul ul > li{
      position:relative;
      padding-top:20px;
      text-align:center;
    }

    /* horizontal connectors between siblings */
    .team_main_list_ul ul > li::before,
    .team_main_list_ul ul > li::after{
      content:"";
      position:absolute;
      top:0;
      width:50%;
      height:20px;
    }
      /* সব চাইল্ডের ওপরে একসাথে দাগ */
    .team_main_list_ul ul::after{
      content:"";
      position:absolute;
      top:24px;
      left:0;
      right:0;
      border-top:2px solid var(--line);
      height:0;
    }
    .team_main_list_ul ul > li::before{
      right:50%;
      border-right:2px solid var(--line);
    }
    .team_main_list_ul ul > li::after{
      left:50%;
      border-left:2px solid var(--line);
    }

    /* if there's only one child, hide split arms */
    .team_main_list_ul ul > li:only-child::before,
    .team_main_list_ul ul > li:only-child::after{ display:none; }

    /* trim first/last arms */
    .team_main_list_ul ul > li:first-child::before{ border-right:none; }
    .team_main_list_ul ul > li:last-child::after{ border-left:none; }
  }

  /* ============ Mobile (<= 640px) ============ */
  @media (max-width: 640px){
    /* children list becomes vertical "timeline" */
    .team_main_list_ul ul{
      display:block;
      padding-top:18px;
      padding-left:18px; /* left timeline gutter */
    }

    /* vertical timeline line */
    .team_main_list_ul ul::before{
      content:"";
      position:absolute;
      top:0; bottom:0; left:18px;
      border-left:2px solid var(--line);
    }

    /* each child appears as a step on the timeline */
    .team_main_list_ul ul > li{
      position:relative;
      padding:14px 0 14px 20px;
      text-align:left;
    }

    /* bullet connector from timeline to card */
    .team_main_list_ul ul > li::before{
      content:"";
      position:absolute;
      top: calc(50% - 6px);
      left:12px;
      width:12px; height:12px;
      border-radius:50%;
      background: var(--bg);
      border:2px solid var(--accent);
      box-shadow: var(--shadow);
    }

    /* hide desktop arms on mobile */
    .team_main_list_ul ul > li::after{ display:none; }

    /* make cards full-width on mobile */
    .team_main_list_ul a.person_cls{
      display:block;
      width:100%;
      max-width:520px;
    }
  }

  /* ============ Extras ============ */
  /* subtle gradient accent on cards (optional; looks classy) */
  .person_cls{
    background:
      radial-gradient(120% 120% at 10% 0%, color-mix(in srgb, var(--accent) 6%, transparent) 0%, transparent 45%),
      var(--card);
  }

  /* reduce motion preference */
  @media (prefers-reduced-motion: reduce){
    .person_cls{ transition:none; }
  }
</style>

<div class="container team_container">

  <ul class="team_main_list_ul">
    <li class="team_list_1 team_list_li " >
      <a class="person_cls" person_id="<?= $my_info->user_full_info_idd; ?>" ><?= $my_info->user_full_name; ?></a>
      <ul>
        <?php foreach ($ref_users as $sng) { ?>
          <li class="team_list_2 team_list_li " >
            <a class="person_cls" person_id="<?= $sng->user_full_info_idd; ?>" ><?= $sng->user_full_name; ?></a>
          </li>
        <?php } ?>
      </ul>
    </li>
  </ul>

</div>


<br><br><br><br><br><br><br><br>



<script>
  $(document).on('click', '.person_cls', function (e) {
      
    const $a   = $(this);
    const $li  = $a.closest('.team_list_li'); // parent() নয়, closest() নিরাপদ
    const person_id   = $a.attr('person_id');
    const person_name = $a.text().trim();

    $.ajax({
      type: "post",
      url: "user/getRefferById",
      data: {
        person_id: person_id
      },
      dataType: 'json', 
      success: function (rs) {
        console.log(rs);
        // <a class="person_cls" person_id="" >  </a>

        if (Array.isArray(rs) && rs.length === 0) {
             $li.html(`<a class="person_cls" person_id="${person_id}" > ${person_name} </a>`);
             console.log(' কোনো ডাটা পাওয়া যায় নাই ');
        } else if (Array.isArray(rs) && rs.length > 0) {
          let html_data = '';
          for (let n = 0; n < rs.length; n++) {
            html_data += `
              <li class="team_list_2 team_list_li " >
                <a class="person_cls" person_id="${rs[n].user_full_info_idd}" >${rs[n].user_full_name}</a>
              </li>`;
          }
          $li.html(`<a class="person_cls" person_id="${person_id}" > ${person_name} </a><ul>${html_data}</ul>`);
        } else {
            console.log("rs অ্যারে নয় বা ডেটা ফরম্যাট ঠিক নয়");
        }



      }
    });

  });
</script>


