<?php require_once('Connections/miconexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  global $miconexion;

  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = $miconexion->real_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO personas (Nombre) VALUES (%s)",
                       GetSQLValueString($_POST['nombre'], "text"));

  $Result1 = $miconexion->query($insertSQL) or die($miconexion->error);
}

$query_miconsulta = "SELECT * FROM clientes WHERE id = 18";
$miconsulta = $miconexion->query($query_miconsulta) or die($miconexion->error);
$row_miconsulta = $miconsulta->fetch_assoc();
$totalRows_miconsulta = $miconsulta->num_rows;

$query_Recordset1 = "SELECT * FROM personas";
$Recordset1 = $miconexion->query($query_Recordset1) or die($miconexion->error);
$row_Recordset1 = $Recordset1->fetch_assoc();
$totalRows_Recordset1 = $Recordset1->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Resume Page Template</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-6">
          <h1>John Doe</h1>
        </div>
        <div class="col-6">
          <p class="text-right"><a href="">Download my Resume</a></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="media">
            <img class="mr-3" src="images/115X115.gif" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="mt-0">Prueba de Acceso a Base de Datos (&aacute;)</h5>
              <p><?php echo $row_miconsulta['Nombre']; ?></p>
              <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
                <p>
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" id="nombre">
                </p>
                <p>
                  <input type="submit" name="submit" id="submit" value="Enviar">
                </p>
                <input type="hidden" name="MM_insert" value="form1">
              </form>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="row justify-content-md-around m-1">
            <address>
            <strong>Personas</strong>
            </address>
            <address>
            </address>
            <address>
            </address>
           
            <table width="200" border="1">
              <tbody>
                <tr>
                  <td>ID</td>
                  <td>Nombre</td>
                </tr>
             <?php do { ?>    <tr>
                  <td><?php echo $row_Recordset1['id']; ?></td>
                  <td><?php echo $row_Recordset1['Nombre']; ?></td>
                </tr>  <?php } while ($row_Recordset1 = $Recordset1->fetch_assoc()); ?>
              </tbody>
            </table>
          
            <address>
            <strong></strong>
            </address>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <h2>Education</h2>
          <hr>
          <div class="row">
            <div class="col-6">
              <h4>College of Web Design</h4>
            </div>
            <div class="col-6">
              <h5 class="text-right"><span aria-hidden="true"></span> Jan 2002 - Dec 2006</h5>
            </div>
          </div>
          <h5><span class="badge badge-secondary">Bachelors</span></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
          <div class="row">
            <div class="col-6">
              <h4>University of Web Design</h4>
            </div>
            <div class="col-6">
              <h5 class="text-right"><span aria-hidden="true"></span> Jan 2007 - Dec 2008</h5>
            </div>
          </div>
          <h5><span class="badge badge-secondary">Masters</span></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
        </div>
        <div class="col-md-6 col-sm-12">
          <h2>Skill Set</h2>
          <hr>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"> HTML</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> CSS</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"> JAVASCRIPT</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> PHP</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"> WORDPRESS</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> PHOTOSHOP</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> ILLUSTRATOR</div>
          </div>
        </div>
      </div>
      <hr>
      <h2>Work Experience</h2>
      <hr>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="row">
            <div class="col-5">
              <h4>ABC Corp.</h4>
            </div>
            <div class="col-6">
              <h5 class="text-right"><span aria-hidden="true"></span> Jan 2002 - Dec 2006</h5>
            </div>
          </div>
          <h5><span class="badge badge-secondary">Web Developer</span></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
          <ul>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet, consectetur.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
          </ul>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="row">
            <div class="col-5">
              <h4>XYZ Corp.</h4>
            </div>
            <div class="col-6">
              <h5 class="text-right"><span aria-hidden="true"></span> Jan 2002 - Dec 2006</h5>
            </div>
          </div>
          <h5><span class="badge badge-secondary">Senior Web Developer</span></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
          <ul>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet, consectetur.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
          </ul>
        </div>
      </div>
      <hr>
      <h2>Portfolio</h2>
      <hr>
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
        </div>
        <div class="row text-center">
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
          <div class="col-sm-4 col-12 p-0"><img class="img-thumbnail"  src="images/300X200.gif" alt=""></div>
        </div>
      </div>
      <hr>
      <h2>Contact</h2>
      <hr>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8  col-12 jumbotron">
            <form>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-describedby="emailHelp">
                <span id="emailHelp" class="form-text text-muted" style="display: none;">Please enter a valid e-mail address.</span>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message" aria-describedby="messageHelp"></textarea>
                <span id="messageHelp" class="form-text text-muted" style="display: none;">Please enter a message.</span>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <hr>
      <footer class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <p>Copyright &copy; MyWebsite. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
<?php
$miconsulta->free();

$Recordset1->free();
?>
