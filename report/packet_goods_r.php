<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Packet/Carton Report</title>
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
        <span class="h1"> Packet Goods Report (<?= date('d-M-Y', strtotime($date)) ?>)</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>PO Number</td>
                <td>Style</td>
                <td>Colour</td>
                <td>Shipment</td>
                <td>Remark</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            while ($row = mysqli_fetch_assoc($rows)) {
                ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $row['PONumber'] ?></td>
                    <td><?= $row['StyleNumber'] ?></td>
                    <td><?= $row['color'] ?></td>
                    <td><?= $row['Qty'] ?></td>
                    <td><?= $row['Remark'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>