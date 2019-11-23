<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hourly Report</title>
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
        <span class="h1"> Hourly Report (<?= date('d-M-Y', strtotime($date)) ?>)</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>FloorNO</th>
                <th>Line</th>
                <th>Buyer/PO</th>
                <th>Color</th>
                <th>Style</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>1</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>Total</th>
                <th>FOB</th>
                <th>CM</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_nine     = 0;
            $total_ten      = 0;
            $total_eleven   = 0;
            $total_twelve   = 0;
            $total_one      = 0;
            $total_three    = 0;
            $total_four     = 0;
            $total_five     = 0;
            $total_six      = 0;
            $total_seven    = 0;
            $total_eight    = 0;
            $total_in_line  = 0;
            $total_fob_line = 0;
            $total_cmp_line = 0;
            $total_day_fob  = 0;
            $total_day_cmp  = 0;
            $total_in_day   = 0;
            foreach ($results as $result) {
                $total_nine   += $result['nine'];
                $total_ten    += $result['ten'];
                $total_eleven += $result['eleven'];
                $total_eleven += $result['eleven'];
                $total_twelve += $result['twelve'];
                $total_one    += $result['one'];
                $total_three  += $result['three'];
                $total_four   += $result['four'];
                $total_five   += $result['five'];
                $total_six    += $result['six'];
                $total_seven  += $result['seven'];
                $total_eight  += $result['eight'];

                $total_in_line = $result['nine'] + $result['ten'] + $result['eleven'] + $result['twelve'] + $result['one'] + $result['three'] + $result['four'] + $result['five'] + $result['six'] + $result['seven'] + $result['eight'];

                $total_fob_line = $total_in_line * $result['FOB'];
                $total_cmp_line = $total_in_line * $result['POCMPWH'];
                ?>
                <tr>
                    <td><?= $result['Date']; ?></td>
                    <td><?= $result['floor_name']; ?></td>
                    <td><?= $result['line']; ?></td>
                    <td><?= $result['PONumber']; ?></td>
                    <td><?= $result['color']; ?></td>
                    <td><?= $result['StyleNumber']; ?></td>
                    <td><?= $result['nine']; ?></td>
                    <td><?= $result['ten']; ?></td>
                    <td><?= $result['eleven']; ?></td>
                    <td><?= $result['twelve']; ?></td>
                    <td><?= $result['one']; ?></td>
                    <td><?= $result['three']; ?></td>
                    <td><?= $result['four']; ?></td>
                    <td><?= $result['five']; ?></td>
                    <td><?= $result['six']; ?></td>
                    <td><?= $result['seven']; ?></td>
                    <td><?= $result['eight']; ?></td>
                    <td><?= $total_in_line ?></td>
                    <td><?= $total_in_line * $result['FOB']; ?></td>
                    <td><?= $total_in_line * $result['POCMPWH']; ?></td>
                    <td></td>
                </tr>
            <?php
                $total_day_fob += $total_fob_line;
                $total_day_cmp += $total_cmp_line;
                $total_in_day  += $total_in_line;
            } ?>
            <tr>
                <td colspan="6"><strong>Total Per Hour</strong></td>
                <td><?= $total_nine; ?></td>
                <td><?= $total_ten; ?></td>
                <td><?= $total_eleven; ?></td>
                <td><?= $total_twelve; ?></td>
                <td><?= $total_one; ?></td>
                <td><?= $total_three; ?></td>
                <td><?= $total_four; ?></td>
                <td><?= $total_five; ?></td>
                <td><?= $total_six; ?></td>
                <td><?= $total_seven; ?></td>
                <td><?= $total_eight; ?></td>
                <td><?= $total_in_day; ?></td>
                <td><?= $total_day_fob; ?></td>
                <td><?= $total_day_cmp; ?></td>
                <td></td>
            </tr>
            <?php  ?>
        </tbody>
    </table>
</body>

</html>