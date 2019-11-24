<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wash Report</title>
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
        <span class="h1"> Wash Report (<?= date('d-M-Y', strtotime($date)) ?>)</span>
        <br>
    </p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Wash Date</th>
                <th>PO NUMBER</th>
                <th>Style Number</th>
                <th>Color</th>
                <th>Send</th>
                <th>Receive</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php        
                $count = 1;
                while ($row = mysqli_fetch_assoc($results)) {
            ?>
                    <tr>
                        <th scope="row"><?= $count ?></th>
                        <td><?= $row['Date'] ?></td>
                        <td><?= $row['PONumber'] ?></a></td>
                        <td><?= $row['StyleNumber'] ?></a></td>
                        <td><?= $row['color'] ?></td>
                        <td><?= $row['Send'] ?></td>
                        <td><?= $row['Receive'] ?></td>
                        <td><?= $row['Remark'] ?></td>
                    </tr>
            <?php 
            $count++;}
            ?>
        </tbody>
    </table>
</body>

</html>