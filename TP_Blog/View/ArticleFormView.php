        <h1>Nouvelle PlayList:</h1>
        <form name='playlistAdd' enctype="multipart/form-data" action="index.php?action=PlayListFormHandler" method="post">

            <div class="form-group">
                <label class="control-label" for="name">Nom :</label>
                <input id="title" class="form-control" type="text" name="name" placeholder="name" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="description">Description :</label>
                <textarea class="form-control" rows="3"  name="description"></textarea>
            </div>
            <div class="form-group">
               <label class="control-label" for="myFile">Image :</label>
                     <input type="file" name="myFile" value="Browse" class="btn btn-default btn-file">

             </label>
            </div>

            <div class="form-group text-right">
                <button class="btn btn-default" onclick="history.back();">Annuler</button>
                <input type="Submit" name="submit" class="btn btn-primary  ">
            </div>
        </form>

