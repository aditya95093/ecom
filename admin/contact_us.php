<?php
require ('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE from contact_us where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "SELECT * From contact_us order by id desc";
$res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categorie</title>
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
    </style>
</head>

<body>
    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Contact_Us</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Query</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)) { ?>
                                            <tr>
                                                <td class="serial">
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['mobile'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['comment'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['added_on'] ?>
                                                </td>
                                                <td>
                                                    <a class="button delete-button"
                                                        href='?type=delete&id=<?php echo $row['id']; ?>'>Delete</a>
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