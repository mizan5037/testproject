<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PO Shipment Report</title>
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
    <p>
        <span class="h1">PO Shipment Report</span>
        <br>
    </p>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Date</td>
                <td>PO Number</td>
                <td>Style</td>
                <td>Colour</td>
                <td>Shipment</td>
                <td>Sample</td>
                <td>Remark</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $total_sipment = 0;
            $total_sample = 0;
            while ($row = mysqli_fetch_assoc($rows)) {
                $total_sipment += $row['Shipment'];
                $total_sample  += $row['Sample'];
                ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= date('d-M-Y', strtotime($row['date'])); ?></td>
                    <td><?= $row['PONumber'] ?></td>
                    <td><?= $row['StyleNumber'] ?></td>
                    <td><?= $row['color'] ?></td>
                    <td><?= $row['Shipment'] ?></td>
                    <td><?= $row['Sample'] ?></td>
                    <td><?= $row['Remark'] ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="5">Total</th>
                <th><?= $total_sipment?></th>
                <th><?= $total_sample ?></th>
                <th></th>
            </tr>
        </tbody>
    </table>
</body>

</html>