<?php
    function add_new_event($id,$data = NULL)
    {
        if(!empty($data))
        {
            $selected = 'selected="selected"';
            echo '<form method="post" action="'.base_url('EditEvent').'"> 
        <input type="hidden" name="id" value="'.$data[0]['id'].'">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="'.$data[0]['title'].'" required>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="custom-select" name="priority" required>
                <option value="1"';if($data[0]['priority'] == "1") {echo $selected;} echo '>High</option>
                <option value="2"';if($data[0]['priority'] == "2") {echo $selected;} echo '>Medium</option>
                <option value="3"';if($data[0]['priority'] == "3") {echo $selected;} echo '>Low</option>
            </select>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" name="note" rows="3">'.$data[0]['note'].'</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" value="'.$data[0]['date'].'" required>
        </div>
        <div class="form-group">
            <label for="time1">Starts From</label>
            <input type="time" class="form-control" name="time1" value="'.$data[0]['time1'].'" required>
        </div>
        <div class="form-group">
            <label for="time2">Ends At</label>
            <input type="time" class="form-control" name="time2" value="'.$data[0]['time2'].'" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>';    
        }   

        else {     
        echo '<form> 
        <input type="hidden" name="userid" id="userid" value="'.$id.'">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="custom-select" id="priority" name="priority" required>
                <option selected>Select Priority</option>
                <option value="1">High</option>
                <option value="2">Medium</option>
                <option value="3">Low</option>
            </select>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time1">Starts From</label>
            <input type="time" class="form-control" id="time1" name="time1" required>
        </div>
        <div class="form-group">
            <label for="time2">Ends At</label>
            <input type="time" class="form-control" id="time2" name="time2" required>
        </div>
        <button type="submit" id="submit" class="btn btn-primary float-right">Submit</button>
        </form>';
        }

    }
?>
