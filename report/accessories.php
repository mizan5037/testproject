<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accessories Report</title>
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
            font-size: 24px;
        }

        .h3 {
            font-size: 14px;
        }
    </style>
    <h2>
        RISHAL GROUP OF INDUSTRIES
    </h2>
    <h3><span>Buyer:<?= $buyer_name ?>
        </span> </h3>
    <h3><span>Item:  <?= $item_name ?> </span> <span>Size:<?= $size ?></span> </h3>
    <p>
        <span class="h1">Received Items</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <td>Size</td>
                <td>Date</td>
                <td>PO Number</td>
                <td>Style</td>
                <td>Received Itme</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while ($row = mysqli_fetch_assoc($rows)) {
                $total +=  $row['Received'];
                ?>
                <tr>
                    <td><?= $row['size'] ?></td>
                    <td><?= date('d-M-Y', strtotime($row['TimeStamp'])) ?></td>
                    <td><?= $row['PONumber'] ?></td>
                    <td><?= $row['StyleNumber'] ?></td>
                    <td><?= $row['Received'] ?></td>
                </tr>
            <?php
            }

            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?= $total ?></td>
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
                <td>Size</td>
                <td>Date</td>
                <td>PO Number</td>
                <td>Style</td>
                <td>Received Itme</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_issued = 0;
            while ($data = mysqli_fetch_assoc($sql_issued)) {
                $total_issued +=  $data['Qty'];
                ?>
                <tr>
                    <td><?= $data['size'] ?></td>
                    <td><?= date('d-M-Y', strtotime($data['TimeStamp'])) ?></td>
                    <td><?= $data['PONumber'] ?></td>
                    <td><?= $data['StyleNumber'] ?></td>
                    <td><?= $data['Qty'] ?></td>
                </tr>
            <?php
            }

            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?= $total_issued ?></td>
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