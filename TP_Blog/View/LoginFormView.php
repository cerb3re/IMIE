        <div class="form-container">
           <form method="post" action="index.php?action=LoginFormHandler">
               <h2>Sign in.</h2><hr />
               <?php
               if (isset($data['errors'])){
                   echo ' <div class="alert alert-warning" role="alert">
                   <strong>Warning!</strong>'.$data['errors'].'</div>';
               }
               ?>
               <div class="form-group">
                <input type="text" class="form-control" name="nom" placeholder="Username or E mail ID" required />
               </div>
               <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password" required />
               </div>
               <div class="clearfix"></div><hr />
               <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                    <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                   </button>
               </div>
               <br />
               <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>
           </form>
          </div>