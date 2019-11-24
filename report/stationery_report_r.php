<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stationery Report</title>
</head>

<body>
    <style>
        body {
            text-align: center;
        }

        * {
            margin: 0px auto;
            padding: 0;
            outline: 0;
        }

        table {
            width: 100%;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .h1 {
            text-transform: uppercase;
            font-size: 18px;
        }

        .h3 {
            font-size: 14px;
        }
    </style>
    <h2>
        RISHAL GROUP OF INDUSTRIES
    </h2>
    <h1><span>Item:<?= $item_name ?>
        </span> </h1>
    <h3><span><?= $monthName; ?> </span> <span><?= $year; ?></span> </h3>
    <p>
        <br>
        <br>
        <span class="h1">Received Items</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Supplier Name</th>
                <th>Challan No</th>
                <th>Received Qty</th>
                <th>Shortage/Excess</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while ($row = mysqli_fetch_assoc($rows)) {
                $total +=  $row['ReceivedQty'];
                ?>
                <tr>
                    <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                    <td><?= $row['SupplierName'] ?></td>
                    <td><?= $row['ChallanNo'] ?></td>
                    <td><?= $row['ReceivedQty'] . ' ' . $item_m_unit; ?></td>
                    <td><?= $row['Shortage'] ?></td>
                </tr>
            <?php
            }

            ?>
            <tr>
                <td colspan="3">Total</td>
                <td><?= $total ?></td>
                <td></td>
            </tr>

        </tbody>
    </table>
    <br>
    <hr>
    <br>


    <p>
        <span class="h1">Issued Items</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Unit Name</th>
                <th>Issued By</th>
                <th>Issue Qty</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_issued = 0;
            while ($data = mysqli_fetch_assoc($sql_issued)) {
                $total_issued +=  $data['Qty'];
                ?>
                <tr>
                    <td><?= date('d-M-Y', strtotime($data['timestamp'])) ?></td>
                    <td><?= $data['UnitName'] ?></td>
                    <td><?= $data['IssueBy'] ?></td>
                    <td><?= $data['Qty'] . ' ' . $item_m_unit;?></td>
                    <td><?= $data['Remark'] ?></td>
                </tr>
            <?php
            }

            ?>
            <tr>
                <td colspan="3">Total</td>
                <td><?= $total_issued ?></td>
                <td></td>
            </tr>

        </tbody>
    </table>
    <br>
    <hr>
    <br>


    <p>
        <span class="h1">Reamining Items</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <td> Received</td>
                <td> Issued</td>
                <td> Remaining</td>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?= $total ?></td>
                <td><?= $total_issued ?></td>
                <td><?= $total - $total_issued ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>