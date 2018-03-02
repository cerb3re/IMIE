

        <form class="" name='musicAdd' action="index.php?action=TrackFormHandler" method="post">
            <input type="hidden" name="id" value=" "/>

            <div class="form-group">
                <label class="control-label" for="title">Entrez le titre :</label>
                <input id="title" class="form-control" type="text" name="title" placeholder="Title" required pattern=".{0,255}" value="<?php  ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="author">Entrez l'auteur :</label>
                <input id="author" class="form-control" type="text" name="author" placeholder="Author" required pattern=".{0,255}" value="<?php ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="length">Entrez la durée :</label>
                <input id="length" class="form-control" type="number" min="1" max="1000" name="duration" placeholder="Length in [s]" required value="<?php  ?>">
            </div>
            <div class="form-group text-right">
                <button class="btn btn-default" onclick="history.back();">Annuler</button>
                <input type="Submit" name="submit" class="btn btn-primary  ">
            </div>
        </form>


 
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


        