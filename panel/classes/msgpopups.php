<?php
class msgpopups{

public function popNow($SendTo, $mdname, $totype, $FromType, $ToId){

//Pop ups
echo 
'


<div class="modal fade" id='.$mdname.' tabindex="-1" role="dialog" aria-labelledby='.$mdname.' aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="inc/message_inc.php?totype='.$totype.'&fromtype='.$FromType.'&msg_to='.$ToId.'">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input disabled="" value='.$SendTo.' type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea name="msg_body" class="form-control" id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="msgbtn" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
 </form>

';


}

}




?>