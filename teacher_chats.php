<?php   
    $db=new PDO('mysql:host=localhost; dbname=elz_project', 'elz', 'Zarina123hey');
    $db->exec("SET NAMES UTF8");
    if(count($_POST)>0) {
        $nickname=trim($_SESSION["nickname"]);
        $msg = trim($_POST['msg']);

        if($nickname != '' && $msg != '') {
            $query=$db->prepare("INSERT INTO comments SET nickname='$nickname', msg='$msg'");
            $query->execute();      
            
            //header("Location: todolist.php");
            //exit();
        }
    }
    $query=$db->prepare("SELECT * FROM comments ORDER by dt DESC");
    $query->execute();
    $comments=$query->fetchAll();
?>



<div class="container">
<h3 class=" text-center">Chats</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
          
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>10"A" physics class <span class="chat_date">Apr 17</span></h5>
                  <p>All of you should complete the assaignment</p>
                </div>
              </div>
            </div>
<div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>12"C" Advanced physics class <span class="chat_date">Apr 18</span></h5>
                  <p>Okey</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
        
        <div class="mesgs">
        
          <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">            
                <strong>Physics teacher</strong>
                  <p>End today's homework and prepare for exams</p>
                
                  <span class="time_date">2020-01-29 10:09:52</span></div>
              </div>
            </div>
            
            <?php foreach($comments as $element):?>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <strong><?php echo $element['nickname']?></strong>
                <p><?php echo $element['msg']?></p>
                <span class="time_date"> <?php echo $element['dt']?></span> </div>
            </div>
            <?php endforeach;?>
            
          </div>
          

          <div class="type_msg">
            <div class="input_msg_write">
            <form method="post">
              <input name="msg" type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </form>  
            </div>
          </div>
          
        </div>
</div>
           
    </div>
</div>