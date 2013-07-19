<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <title>Film</title>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <li class="brand">Fouraxprod</li>
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="active"><a  href="register.php">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
           
            <div class="text-center">
                
                <form>
                    
                    <fieldset>
                        <legend>Fiche du Film</legend>
                        <label>Titre</label>
                        <input type="text" placeholder="Type something…">
                        <label>Genre</label>
                            <!-- Button to trigger modal -->
    <a href="#myModal" role="button" class="btn" data-toggle="modal">Genre du film</a>
     
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Catégories</h3>
    </div>
    <div class="modal-body">
<!--    <p>One fine body…</p>-->
              
           
<input type="radio" name="fav_food" id="food1" value="Pizza">
<label for="food1">Pizza</label> <br />
<input type="radio" name="fav_food" id="food2" value="Cereal">
<label for="food2">Cereal</label> <br />
<input type="radio" name="fav_food" id="food3" value="Ramen Noodles">
<label for="food3">Ramen Noodles</label> <br />
<input type="radio" name="fav_food" id="food4" value="Hamburger">
<label for="food4">Hamburger</label>
            
      
    
    
      
      
        
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
    </div>
    </div>
                        <label>Année</label>
                        <input type="text" placeholder="11/07/2013">
                        <label>Résumé</label>
                        <textarea rows="3"></textarea>
                        <label>Commentaire</label>
                        <textarea rows="3"></textarea>
                        <span class="help-block">Example block-level help text here.</span>
                        <button type="submit" class="btn">Submit</button>
                    </fieldset>
                </form>
            </div>
                        

        </div>
    
</body>
</html>
