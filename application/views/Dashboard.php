<?php
    include('Header.php');
    include('Footer.php');
$today_todo = $this->session->userdata('today');

?>
<div class="jumbotron main">
  <h1 class="display-4">Welcome, <?= $alldata[0]->name; ?></h1>
  <p class="lead">Welcome to our Dashboard Panel here you will find your Today's ToDo List bellow. You can Goto Side-bar options and Logoff is at bottom right. Thank you</p>
</div>
<div class="container">
    <div class="bg-grey">
        Today's Todo List With Priorities
    </div>
    <?php
        if(!empty($today_todo)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">NOTE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">START TIME</th>
                    <th scope="col">END TIME</th>
                    <th scope="col">PRIORITY</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody><?php foreach($today_todo as $data) {?>
                    <tr>
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
                    <td>
                        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('H:i:s');
                            if($date > $data['time2'])
                            {
                                echo '<form action="'.base_url('Home/DeleteEvent').'" method="post">
                                    <input type="hidden" name="id" value="'.$data['id'].'">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>';
                            }
                        ?>
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { echo "<div class='notask'>Hey You have no todos today. Please add one or Enjoy the Day :)</div>"; }?>
</div>