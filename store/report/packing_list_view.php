<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Packing List</title>
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
        <span class="h1">P.O. Number: <?= $porow['PONumber'] ?></span>
        <br>
        <span class="h2">From: <?= $porow['POFrom'] ?> | Date: <?= $porow['PODate'] ?></span>
        <?php if ($porow['special_note'] != '') { ?><span class="h2">Note: <?= $porow['special_note'] ?></span><?php } ?>
    </p>
    <h3>Packing List</h3>
    <table>
        <thead>
            <tr>
                <td>PrePackCode</td>
                <td>SIZE</td>
                <td>PCS</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $qty = 0;
            $ppk = true;
            $ppk_temp = '';
            $qty_temp = 0;
            while ($row = mysqli_fetch_assoc($rows)) {
                $qty += $row['PrepackQty'];
                $ppk = $ppk_temp == '' || $ppk_temp == $row['PrePackCode'] ? true : false;
                $ppk_temp = $row['PrePackCode'];
                $qty_temp = $row['PrepackQty'];
                ?>
                <tr>
                    <td><?= $row['PrePackCode'] ?></td>
                    <td><?= $row['size'] ?></td>
                    <td><?= $row['PrepackQty'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">PCS / PREPACK: <?=$ppk ? $qty : $qty_temp ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>