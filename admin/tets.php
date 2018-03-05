 
if (isset($_POST['submit'])) {
                  $email = $_POST['email'];
                  $name = $_POST['name'];
                  $comment = $_POST['comment'];
                  $post_id = $_POST['post_id'];

                  if ($email || $name || $comment) {
                    $email = $db->real_escape_string($email);
                    $name = $db->real_escape_string($name);
                    $post_id = $db->real_escape_string($post_id);
                    $comment = $db->real_escape_string($comment);
                    if ($addcomment = $db->prepare("INSERT INTO commnts(name, post_id, email, comment) VALUES(?,?,?,?)")) {
                      $addcomment = bind_param('ssss', $name, $id, $emial, $comment);
                      $addcomment = execute();
                      echo "thank u comment";
        
                  }else{
                      echo "Erro". $db->error;
                    }

                  }else{
                      echo "Error";
                }
            }



 <!--<div class="row">
              <div id="add-comments">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
      <div class="form-group">
      <label>Email Adress</label><input type="text" name="email" placeholder="Email Edress" class="form-control" style="width: 300px;">
      </div>
      <div class="form-group">
      <label>Name</label><input type="text" name="name" placeholder="User Name" class="form-control" style="width: 300px;">
      </div>
      <div class="form-group">
      <label>Comment</label><textarea name="comment" class="form-control" style="width: 300px;"></textarea >
      </div>
      <input type="submit" name="submit" value="Comment">
      </form>
      </div>
      </div>-->