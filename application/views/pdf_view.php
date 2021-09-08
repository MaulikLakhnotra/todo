<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <style>
        table, td, th {  
        border: 1px solid #ddd;
        text-align: left;
        }

        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 15px;
        }
        h3
        {
            text-align:right;
        }
    </style>
</head>
<body>
<h3><?php date_default_timezone_set('Asia/Kolkata');
            echo date('d-m-Y');?></h3>
<?php
        if(!empty($ToDo)) { ?>
            <table>
                    <tr>
                    <th>User's Name</th>
                    <th>TITLE</th>
                    <th>NOTE</th>
                    <th>DATE</th>
                    <th>START TIME</th>
                    <th>END TIME</th>
                    <th>PRIORITY</th>
                    </tr>
            <?php foreach($ToDo as $data) {?>
                    <tr>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['title']; ?></td>
                    <td><?= $data['note']; ?></td>
                    <td><?= $data['date']; ?></td>
                    <td><?= $data['time1']; ?></td>
                    <td><?= $data['time2']; ?></td>
                    <td>
                        <?php 
                            if($data['priority'] == "1") 
                            { 
                                echo 'High'; 
                            } 
                            else if($data['priority'] == "2") 
                            { 
                                echo 'Midium'; 
                            } 
                            else 
                            { 
                                echo 'Low'; 
                            } 
                        ?>
                    </td>
                    
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { echo "<div class='notask'>Hey You have no todos today. Please add one or Enjoy the Day</div>"; }?>
</body>
</html>