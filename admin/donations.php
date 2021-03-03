<?php include('header.inc.php');

$sql = "select * from donations";
$res = mysqli_query($con, $sql);



?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Donations</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Notes
                                    </th>
                                    <th>
                                        Payment Method
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id'] ?>
                                        </td>
                                        <td>
                                            <?= $row['amount'] . " $" ?>
                                        </td>
                                        <td>
                                            <?= $row['type'] ?>
                                        </td>
                                        <td>
                                            <?= $row['name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        <td>
                                            <?= $row['phone'] ?>
                                        </td>
                                        <td>
                                            <?= $row['address'] ?>
                                        </td>
                                        <td>
                                            <?= $row['notes'] ?>
                                        </td>
                                        <td>
                                            <?= $row['payment_method'] ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($row['status']) {
                                                    echo "Paid";
                                                } else {
                                                    echo "Pending";
                                                }
                                                ?>

                                        </td>
                                    </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>