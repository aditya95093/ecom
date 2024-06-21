<?php
require ('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status_sql = "UPDATE product set status='$status' where id='$id'";
        mysqli_query($con, $update_status_sql);
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE from product where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$search = '';
if (isset($_GET['search'])) {
    $search = get_safe_value($con, $_GET['search']);
}

$sql = "SELECT product.*, categories.categories FROM product, categories WHERE product.categories_id = categories.id ";
if ($search != '') {
    $sql .= "AND product.name LIKE '%$search%' ";
}
$sql .= "ORDER BY product.id DESC";
$res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .active-button {
            background-color: #00c292;
            color: #fff;
        }

        .active-button:hover {
            background-color: #fb9678;
        }

        .deactive-button {
            background-color: #fb9678;
            color: #fff;
        }

        .deactive-button:hover {
            background-color: #00c292;
        }

        .delete-button {
            background-color: #ff4d4d;
            color: #fff;
        }

        .delete-button:hover {
            background-color: #fb9678;
        }

        .edit-button {
            background-color: #4da6ff;
            color: #fff;
        }

        .edit-button:hover {
            background-color: #4da24dff;
        }

        .search-form {
            display: flex;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            flex: 1;
        }

        .search-button {
            padding: 10px 20px;
            border: 1px solid #00c292;
            border-radius: 0 5px 5px 0;
            background-color: #00c292;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #fb9678;
        }

        @media (max-width: 600px) {
            .search-form {
                flex-direction: column;
            }

            .search-input {
                border-radius: 5px;
                margin-bottom: 10px;
            }

            .search-button {
                border-radius: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Products</h4>
                            <h4 class="box-link"><a href="manage_product.php">Add Product</a></h4>
                            <form method="get">
                                <input type="text" name="search" placeholder="Search Product"
                                    value="<?php echo $search; ?>">
                                <input type="submit" value="Search">
                            </form>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Id</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>MRP</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)) { ?>
                                            <tr>
                                                <td class="serial"><?php echo $i ?></td>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['categories'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>"></td>
                                                <td><?php echo $row['mrp'] ?></td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td><?php echo $row['qty'] ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 1) { ?>
                                                        <a class='button active-button'
                                                            href='?type=status&operation=deactive&id=<?php echo $row['id']; ?>'>Active</a>&nbsp;
                                                    <?php } else { ?>
                                                        <a class='button deactive-button'
                                                            href='?type=status&operation=active&id=<?php echo $row['id']; ?>'>Deactive</a>&nbsp;
                                                    <?php } ?>
                                                    <a class="button delete-button"
                                                        href='?type=delete&id=<?php echo $row['id']; ?>'
                                                        onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                                    <a class="button edit-button"
                                                        href='manage_product.php?id=<?php echo $row['id']; ?>'>Edit</a>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require ('footer.inc.php');
    ?>
</body>

</html>