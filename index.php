<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <title>Table vk</title>
</head>
<body style="margin: 70px;">
<table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Links</th>
                <!-- <th>Text</th> -->
                <th>Likes</th>
                <th>Repost</th>
                <th>Comments</th>
                <th>Views</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
    <?php

        require_once 'parser.php';

        foreach ($result as $value) {

    ?>
        <tr>
            <td><a href="<?php echo $value['link'] ?>"> <?php echo $value['link'] ?></a></td>
            <!-- <td><?php //echo $value['text'] ?></td> -->
            <td><?php echo $value['likes'] ?></td>
            <td><?php echo $value['repost'] ?></td>
            <td><?php echo $value['comments'] ?></td>
            <td><?php echo $value['views'] ?></td>
            <td><?php echo $value['time'] ?></td>
        </tr>

    <?php

        }

    ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
</body>
</html>