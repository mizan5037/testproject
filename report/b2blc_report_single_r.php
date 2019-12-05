<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B2B Lc Report</title>
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

        .left {
            text-align: left;
        }
    </style>
    <h2>
        RISHAL GROUP OF INDUSTRIES
    </h2>
    <p>
        <span class="h1"> B2B Lc Report(<?= $blc['B2BLCNumber'] ?>) </span>
        <br>
    </p>

    <table>
        <thead>
            <tr>
                <th colspan="4"> B2B LC Details</th>
            </tr>


        </thead>
        <tbody>
            <tr>
                <td class="left" width="25%">B2B LC Number:</td>
                <td class="left" width="25%"><b><?= $blc['B2BLCNumber'] ?></b></td>
                <td class="left" width="25%">Supplier Name:</td>
                <td class="left" width="25%"><b><?= $blc['SupplierName'] ?></b></td>
            </tr>
            <tr>
                <td class="left">B2B LC Issue Date:</td>
                <td class="left"><b><?= $blc['Issuedate'] ?></b></td>
                <td class="left">Contact Person:</td>
                <td class="left"><b><?= $blc['ContactPerson'] ?></b></td>
            </tr>
            <tr>
                <td class="left">B2B LC Maturity Date:</td>
                <td class="left"><b><?= $blc['Maturitydate'] ?></b></td>
                <td class="left">Contact Number:</td>
                <td class="left"><b><?= $blc['ContactNumber'] ?></b></td>
            </tr>
            <tr>
                <td class="left">Master LC No:</td>
                <td class="left"><?= $blc['MasterLCNumber'] ?></td>
                <td class="left">Address:</td>
                <td class="left"><b><?= nl2br($blc['SupplierAddress']) ?></b></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th colspan="6"> B2B LC Item Details</th>
            </tr>
            <tr>
                <th>Item</th>
                <th>Style</th>
                <th>PO</th>
                <th>Qty</th>
                <th>Price/Unit</th>
                <th>Total Price</th>

            </tr>

        </thead>
        <tbody>
            <?php
            $total_price = 0;
            while ($rows = mysqli_fetch_assoc($b2bitem)) {
                $total_price += $rows['TotalPrice'];
                ?>
                <tr>
                    <td><?= $rows['ItemName'] ?></td>
                    <td><?= $rows['StyleNumber'] ?></td>
                    <td><?= $rows['PONumber'] ?></td>
                    <td><?= $rows['Qty'] ?></td>
                    <td><?= $rows['PricePerUnit'].' '. $blc['MasterLCCurrency'] ?></td>
                    <td><?= $rows['TotalPrice'] . ' ' . $blc['MasterLCCurrency'] ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="5">Total B2B LC Value</th>
                <th><?= $total_price . ' ' . $blc['MasterLCCurrency'] ?></th>
            </tr>
        </tbody>
    </table>
</body>

</html>