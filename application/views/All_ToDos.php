<?php
    include('Header.php');
    include('Footer.php');
?>
<div class="container">
    <a class="btn btn-info float-right my-2" value="Export" target="_blank" href="<?php echo base_url('Home/PDF'); ?>">PDF</a>
</div>
<div class="container">
    
    <?php
        if(!empty($ToDo)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">User's Name</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">NOTE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">START TIME</th>
                    <th scope="col">END TIME</th>
                    <th scope="col">PRIORITY</th>
                    </tr>
                </thead>
                <tbody><?php foreach($ToDo as $data) {?>
                    <tr>
                    <th><?= $data['name']; ?></th>
                    <th><?= $data['title']; ?></th>
                    <td><?= $data['note']; ?></td>
                    <td><?= $data['date']; ?></td>
                    <td><?= $data['time1']; ?></td>
                    <td><?= $data['time2']; ?></td>
                    <td>
                        <?php 
                            if($data['priority'] == "1") 
                            { 
                                echo '<span class="badge badge-danger">High</span>'; 
                            } 
                            else if($data['priority'] == "2") 
                            { 
                                echo '<span class="badge badge-warning">Midium</span>'; 
                            } 
                            else 
                            { 
                                echo '<span class="badge badge-success">Low</span>'; 
                            } 
                        ?>
                    </td>
                    
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { echo "<div class='notask'>Hey You have no todos today. Please add one or Enjoy the Day</div>"; }?>
</div>
