





        <style>
            @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Rajdhani:wght@600&display=swap');

            body {
                margin: 0;
                padding: 0;
                background: linear-gradient(135deg, #201771ff, #1f1d37ff, #24243e);
                min-height: 100vh;
                font-family: 'Rajdhani', sans-serif;
                color: #fff;
            }

            .container_body_set {
                max-width: 1200px;
                margin: 40px auto;
                padding: 20px;
            }

            header {
                text-align: center;
                margin-bottom: 40px;
            }

            h1 {
                font-family: 'Orbitron', sans-serif;
                font-size: 3.5rem;
                background: linear-gradient(90deg, #ff00cc, #3333ff, #00ffcc);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-shadow: 0 0 30px rgba(255, 0, 204, 0.5);
                margin: 0;
            }

            .card {
                background: rgba(20, 20, 40, 0.7);
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0 0 40px rgba(0, 255, 255, 0.3), inset 0 0 20px rgba(255, 0, 204, 0.1);
                border: 1px solid rgba(0, 255, 255, 0.4);
                backdrop-filter: blur(10px);
            }

            .search-bar {
                margin-bottom: 30px;
                text-align: center;
            }

            input[type="text"] {
                padding: 15px 25px;
                width: 400px;
                max-width: 90%;
                border-radius: 50px;
                border: 2px solid #00ffcc;
                background: rgba(0, 0, 0, 0.5);
                color: #fff;
                font-size: 1.1rem;
                box-shadow: 0 0 20px rgba(0, 255, 204, 0.4);
                transition: all 0.3s;
            }

            input[type="text"]:focus {
                outline: none;
                box-shadow: 0 0 30px rgba(0, 255, 255, 0.8);
                border-color: #ff00cc;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background: rgba(10, 10, 30, 0.6);
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 0 30px rgba(255, 0, 204, 0.3);
            }

            th {
                background: linear-gradient(90deg, #ff00cc, #3333ff);
                padding: 18px;
                text-transform: uppercase;
                font-size: 1.1rem;
                letter-spacing: 1px;
                text-shadow: 0 0 10px rgba(0,0,0,0.8);
            }

            td {
                padding: 18px 0;
                text-align: center;
                border-bottom: 1px solid rgba(0, 255, 255, 0.2);
            }

            tr:hover {
                background: rgba(0, 89, 255, 0.37);
                transform: scale(1.02);
                transition: all 0.3s;
            }

            .status {
                padding: 8px 20px;
                border-radius: 30px;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 0.9rem;
            }

            .pending { background: linear-gradient(90deg, #ff9d00, #ff6600); color: white; box-shadow: 0 0 15px rgba(255, 153, 0, 0.6); }
            .completed { background: linear-gradient(90deg, #00ff88, #00cc66); color: black; box-shadow: 0 0 15px rgba(0, 255, 136, 0.6); }
            .rejected { background: linear-gradient(90deg, #ff3366, #cc0033); color: white; box-shadow: 0 0 15px rgba(255, 51, 102, 0.6); }

            .amount {
                font-size: 1.4rem;
                font-weight: bold;
                color: #00ffcc;
                text-shadow: 0 0 10px #00ffcc;
            }

            .glow {
                animation: glow 2s infinite alternate;
            }

            @keyframes glow {
                from { box-shadow: 0 0 20px rgba(0, 255, 255, 0.4); }
                to { box-shadow: 0 0 40px rgba(255, 0, 204, 0.8); }
            }

            footer {
                text-align: center;
                margin-top: 50px;
                color: #00ffcc;
                text-shadow: 0 0 10px #00ffcc;
            }
        </style>


        <div class="container_body_set mt-5 ">
            <br><br>
            <header>
                <h1 class="glow">WITHDRAW HISTORY</h1>
            </header>

            <div class="card">
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search by ID, Method or Status...">
                </div>

                <table id="withdrawTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl=1; foreach ($user_withdraws as $withdraw) { ?>
                            <tr>
                                <td><?= $sl; ?></td>
                                <td><?= date('d-M-y h:m:s a', $withdraw->today_times); ?></td>
                                <td class="amount" align="right">৳ <?= $withdraw->requ_amount_taka; ?></td>
                                <td>
                                    <?php if ($withdraw->approve_status == 0) { ?>
                                        <span class="status pending">
                                            Pending
                                        </span>
                                    <?php }elseif ($withdraw->approve_status == 1) { ?>
                                        <span class="status completed ">
                                            Completed
                                        </span>
                                    <?php }elseif ($withdraw->approve_status == 2) { ?>
                                        <span class="status rejected">
                                            Rejected
                                        </span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sl++; } ?>
                    </tbody>
                </table>
            </div>

        </div>

        <script>
            $(document).ready(function(){
                $("#searchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#withdrawTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                // Hover glow effect on rows
                $("#withdrawTable tbody tr").hover(
                    function(){ $(this).addClass("glow"); },
                    function(){ $(this).removeClass("glow"); }
                );
            });
        </script>






