<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">নতুন পণ্য যোগ করুন</h5>
        </div>

        <div class="card-body">

            <div>
                <!-- Product Image -->
                <div class="mb-3">
                    <label class="form-label">পণ্যের ছবি</label>
                    <input type="file" class="form-control">
                </div>

                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">প্রোডাক্টের নাম</label>
                    <input type="text" class="form-control" placeholder="প্রোডাক্টের নাম লিখুন">
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">ক্যাটাগরি</label>
                    <select class="form-select">
                        <option selected>ক্যাটাগরি নির্বাচন করুন</option>
                        <option>Electronics</option>
                        <option>Fashion</option>
                        <option>Grocery</option>
                    </select>
                </div>

                <!-- Sub Category -->
                <div class="mb-3">
                    <label class="form-label">সাব-ক্যাটাগরি</label>
                    <select class="form-select">
                        <option selected>সাব-ক্যাটাগরি নির্বাচন করুন</option>
                        <option>Mobile</option>
                        <option>Laptop</option>
                        <option>Accessories</option>
                    </select>
                </div>

                <!-- Product Details -->
                <div class="mb-3">
                    <label class="form-label">পণ্য বিস্তারিত</label>
                    <textarea class="form-control" rows="4" placeholder="পণ্যের বিস্তারিত লিখুন"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="text-end">
                    <button type="reset" class="btn btn-secondary">রিসেট</button>
                    <button type="submit" class="btn btn-success">সংরক্ষণ করুন</button>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
