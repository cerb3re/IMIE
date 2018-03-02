
         <form action="index.php" method="get">
            <div class="input-group col-md-12">
                <input type="hidden" name="action" value="Article"/>
                <input type="text" name="search" class="form-control" placeholder="recherche par titre" value=""/>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
                <?php if (!empty($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) 
                echo ' <a type="button" class="btn btn-success pull-right" href="index.php?action=ArticleNew">Ajouter un article</a>
                ';?>
                </div>
         </form>
         <table class="table table-hover">
             <thead>
             <tr>
                 <th>Titre</th>
                 <th>Auteur</th>
                 <th>Categorie</th>
                 <th>Date</th>
                 <th></th>
             </tr>
             </thead>
             <tbody>
             <?php



             foreach ($data['search'] as $search) {
                 $adminContent = "";
                 if ($data['isadmin']){
                     $adminContent= '<a href="index.php?action=ArticleEdit&id='.$search->getId().'" title="edit article"><span class="glyphicon glyphicon-pencil">&nbsp;</span></a>'
                         . '<a href="index.php?action=ArticleDelete&id='.$search->getId().'" title="delete article"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>';
                 }
                 echo '<tr><td><a href="index.php?action=Article&id='.$search->getId().'"> '.$search->getTitre().'</td><td>'.$search->getNom().'</td><td>'
                     . $search->getNom().'</td><td>'.$search->getDate_publication().'</td><td>';
//                 echo $adminContent;
//                 echo '<a href="#modal-playlist" data-toggle="modal" class="add-to-playlist" data-id="'.$article->getId().'" title="add article"><span class="glyphicon glyphicon-plus">&nbsp;</span></a>'
//                     . '</td></tr></a>';

             }
             ?>
             </tbody>
         </table>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Categorie</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
  <?php
      foreach ($data['articleBy'] as $article) {
          echo $article->getContenu();
      }



  foreach ($data['articlesFull'] as $article) {
              $adminContent = "";
              if ($data['isadmin']){
                  $adminContent= '<a href="index.php?action=ArticleEdit&id='.$article->getId().'" title="edit article"><span class="glyphicon glyphicon-pencil">&nbsp;</span></a>'
                      . '<a href="index.php?action=ArticleDelete&id='.$article->getId().'" title="delete article"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>';
              }
              echo '<tr><td><a href="index.php?action=Article&id='.$article->getId().'"> '.$article->getTitre().'</td><td>'.$article->getNom().'</td><td>'
                  . $article->getNom().'</td><td>'.$article->getDate_publication().'</td><td>';
              echo $adminContent;
              echo '<a href="#modal-playlist" data-toggle="modal" class="add-to-playlist" data-id="'.$article->getId().'" title="add article"><span class="glyphicon glyphicon-plus">&nbsp;</span></a>'
                  . '</td></tr></a>';

  }
        ?>
            </tbody>
            </table>
         <form method="POST" action="">
         <div id="modal-playlist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

              <!-- Modal content-->


              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Ajouter à la playlist</h4>
                </div>
                <div class="modal-body">
                  <div id="playlist" class="list-group">
                 
                <input type="text" name="titre" />Titre<br>
<select id="author" class="form-control" name="author" placeholder="Auteur">

    <option value="-1">AUTEUR</option>

            <?php 
            foreach($data['auteur'] as $auteur)
            {
                //echo '<option value="'.$auteur->getId().'".'$auteur->getNom().'</option>';
                echo '<option value="'.$auteur->getId().'">'.$auteur->getNom().'</option>';
            }
              ?>
</select>
<select id="author" class="form-control" name="author" placeholder="Auteur">
      
<option value="-1">CATEGORIE</option>

            <?php 
            foreach($data['categorie'] as $auteur)
            {
                //echo '<option value="'.$auteur->getId().'".'$auteur->getNom().'</option>';
                echo '<option value="Author_'.$auteur->getId().'">'.$auteur->getNom().'</option>';
            }
              ?>
</select>
                    
                <input type="date" name="date"> date  <br> 

                  </div>
                </div>


                <div class="modal-footer">
                                    <button class="btn btn-default">insert article</button>

                  <div id="modal-alert-success" class="alert alert-success fade in hidden" aria-hidden="true">
                    <strong>Success!</strong> Indicates a successful or positive action.
                  </div>
                  <div id="modal-alert-warning" class="alert alert-warning fade in hidden">
                    <strong>Warning!</strong> Indicates a warning that might need attention.
                  </div>
                </div>
              </div>

            </div>
          </div>
</form>    


        