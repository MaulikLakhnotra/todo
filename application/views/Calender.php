<?php
    include('Header.php');
    $this->load->helper('form');
    include('Footer.php');
    $data = $this->session->flashdata('edit');
    if(!empty($data))
    {
      echo '<script type="text/javascript">'
    . '$( document ).ready(function() {'
    . '$("#exampleModal").modal("show");'
    . '});'
    . '</script>';
    $this->session->unset_userdata('edit');
    }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="assets/sweetalert.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog center_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TODO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(!empty($data)){ echo add_new_event($alldata[0]->id,$data); } else{ echo add_new_event($alldata[0]->id); } ?>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
          left:'prev,next,today',
          center:'title',
          right:'month,agendaWeek,agendaDay'
          },
    events:"<?= base_url('Home/loadcalender/').$alldata[0]->id; ?>",
    selectable:true,
    selectHelper:true,
      //ADD TODO
      select:function(start)      
        {
          var start = $.fullCalendar.formatDate(start,"Y-MM-DD");                   //FETCHES DATE FROM CLICK
          $('#date').val(start);                                                    //ASSIGN DATE TO DATE FIELD
          $('#exampleModal').modal('show');                                         //ON CLICK OPENS POP-UP
          $("#submit").click(function () {
            if($('#title , #priority, #date, #time1, #time2').val() == ''){         //CHECK REQUIRED VALIDATION
                  alert('Inputs can not be left blank');
            } else {
            var userid = $('#userid').val();                                        //FETCH ALL VALUES FROM INPUT AFTER SUBMIT
            var title = $('#title').val();
            var priority = $('#priority').val();
            var note = $('#note').val();
            var date = $('#date').val();
            var time1 = $('#time1').val();
            var time2 = $('#time2').val();
              $.ajax({                                                              //AJAX CALL SENDS DATA TO STORE
                url:"<?= base_url('addevent'); ?>",
                type:"POST",
                dataType : "json",
                data:{userid:userid, title:title, priority:priority, note:note, date:date, time1:time1, time2:time2},
                success:function()
                {
                  calendar.fullCalendar('refetchEvents');                           //REFRESH CALENDAR ON SUCCESS
                }
              });
            }
          });            
        },
        editable:true,
        selectHelper:true,
      //TIME UPDATE(STRACH)
      eventResize:function(event)
          {
            var time1 = $.fullCalendar.formatDate(event.start,"HH:mm");
            
            var time2 = $.fullCalendar.formatDate(event.end,"HH:mm");
            
            var id = event.id;
            
              $.ajax({
                url:"<?= base_url('UpdateEvent'); ?>",
                type:"POST",
                data:{id:id, time1:time1, time2:time2},
                success:function()
                {
                  swal({
                        title: "Task Successfully Resheduled",
                        icon: "success",
                    });
                  calendar.fullCalendar('refetchEvents');
                }
              });
              
          },
      //DATE AND TIME CHANGE (DRAG)
      eventDrop:function(event)
        {
          var time1 = $.fullCalendar.formatDate(event.start,"HH:mm");
        
          var time2 = $.fullCalendar.formatDate(event.end,"HH:mm");

          var date = $.fullCalendar.formatDate(event.start,"Y-MM-DD");

          var id = event.id;
          
          $.ajax({
            url:"<?= base_url('UpdateEvent'); ?>",
            type:"POST",
            data:{id:id, time1:time1, time2:time2, date:date},
            success:function()
            {
              swal({
                    title: "Task Successfully Resheduled",
                    icon: "success",
                });
              calendar.fullCalendar('refetchEvents');
            }
          });
        },
      //ONCLICK EVENT (LOADS MODAL WITH FETCH EDIT DATA FILLED)
      eventClick:function(event)
      {
          var id = event.id;
          window.location = "<?php  echo base_url('Home/edit/'); ?>"+id;
          $('#exampleModal').modal('show');
      }
        });
    });
    //MODAL CLOSE X 
    $(".close").click(function(){
          $("#exampleModal").modal('hide');
    });
  </script>
<div id='calendar' class="main container">
</div>