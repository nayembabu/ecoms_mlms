<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deposit Requests</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .status-badge {
            font-size: 0.85rem;
        }
        .table-actions button {
            min-width: 90px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white fw-bold fs-5">
            💰 Customer Deposit Requests
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Txn ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Row 1 -->
                    <tr>
                        <td>1</td>
                        <td>
                            <strong>Rahim</strong><br>
                            <small class="text-muted">rahim@mail.com</small>
                        </td>
                        <td>bKash</td>
                        <td>৳ 1,500</td>
                        <td>BK12345</td>
                        <td>26 Jan 2026</td>
                        <td>
                            <span class="badge bg-warning text-dark status-badge">
                                Pending
                            </span>
                        </td>
                        <td class="text-center table-actions">
                            <button class="btn btn-success btn-sm approve-btn">
                                Approve
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td>2</td>
                        <td>
                            <strong>Karim</strong><br>
                            <small class="text-muted">karim@mail.com</small>
                        </td>
                        <td>Nagad</td>
                        <td>৳ 2,000</td>
                        <td>NG99887</td>
                        <td>25 Jan 2026</td>
                        <td>
                            <span class="badge bg-success status-badge">
                                Approved
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="text-success fw-semibold">Done</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Demo approve action
    document.querySelectorAll('.approve-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const row = this.closest('tr');
            const badge = row.querySelector('.status-badge');

            badge.className = 'badge bg-success status-badge';
            badge.innerText = 'Approved';

            this.outerHTML = '<span class="text-success fw-semibold">Done</span>';
        });
    });
</script>

</body>
</html>
