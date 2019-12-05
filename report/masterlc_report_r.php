<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Lc Report</title>
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
        <span class="h1"> Master Lc Report </span>
        <br>
    </p>
    <h3>Master Lc Details</h3>

    <table>
        <thead>
            <tr>
                <th>MasterLc Number</th>
                <th>MasterLC Issue Date</th>
                <th>Master LC Expiry Date</th>
                <th>Master LC Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $masterLc['MasterLCNumber'] ?></td>
                <td><?= $masterLc['MasterLCIssueDate'] ?></td>
                <td><?= $masterLc['MasterLCExpiryDate'] ?></td>
                <td><?= $masterLc['MasterLCCurrency'].' '.$masterLc['MasterLCAmount'] ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <h3>B2B Lc Details</h3>
    <table>
        <thead>
            <tr>
                <th>B2BLC Number</th>
                <th>B2BLC Issue Date</th>
                <th>B2BLC Maturity Date</th>
                <th>B2BLC Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $totalB2blc = 0;
            while ($row = mysqli_fetch_assoc($rows)) {
                $totalB2blc += $row['Total'];
                ?>
                <tr>
                    <td><?= $row['B2BLCNumber'] ?></td>
                    <td><?= $row['Issuedate'] ?></td>
                    <td><?= $row['Maturitydate'] ?></td>
                    <td><?= $masterLc['MasterLCCurrency'].' '.$row['Total']?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="3">Total</th>
                <th><?= $masterLc['MasterLCCurrency'].' '.$totalB2blc;?></th>
            </tr>
        </tbody>
    </table>
    <br>
    <h1>Remaining Master LC Amount: <?= $masterLc['MasterLCCurrency'].' '.($masterLc['MasterLCAmount'] - $totalB2blc) ?></h1>
</body>

</html>