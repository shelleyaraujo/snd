<?php

require_once 'app/models/DestaquesModel.php';

class DestaquesModel extends Model {

 function __construct() {
  parent::__construct();
}

public function readItens($idcontainer, $popup) {

  $st_query = "
  SELECT id, classe, visivel, titulo
  FROM containers
  WHERE id = $idcontainer
  AND classe <> 'popup'
  ";

  if($popup == "0") {
    $st_query = "
    SELECT id, classe, visivel, titulo
    FROM containers
    WHERE id = $idcontainer
    AND classe <> 'popup'
    ";
  } else {
    $st_query = "
    SELECT id, classe, visivel, titulo
    FROM containers
    WHERE id = $idcontainer
    AND classe = 'popup'
    ";
  }

  $r = "";

  try {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {  
      $r .= "<h2 id='titulo_cnt_dst_" . $row["id"] . "'>" . $row["titulo"] . "</h2>";
      $r .= "<div id='row-" . $row["id"] . "' class='" . $row["classe"] . "'>";

      $r .= "<div class='flex'>";
      $r .= $this->readItensDestaques($row["id"]);
      $r .= "</div>";
      $r .= "</div>";
    }
  } catch (PDOException $e) {

  }
  return $r;
}


public function readItensDestaques($idcontainer) {
  $Conteudos = new DestaquesModel();

  $st_query = "
  SELECT id, titulo, ordem, classe, texto
  FROM destaques
  WHERE idcontainer = $idcontainer
  ORDER BY ordem";

  $r = "";

  try {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {  
      $r .= "<div id='dst-" . $row["id"] . "' class='w" . $row["classe"] . "'>";
      $r .= "<div>";
      $r .= $this->getTexto($row["id"]);
      $r .= "</div>";
      $r .= "</div>";
    }
  } catch (PDOException $e) {

  }
  return $r;
}


public function getTexto($id) {
  $st_query = "
  SELECT id, titulo, texto, classe, plugin
  FROM destaques 
  WHERE id = $id
  ";

  $r = "";
  $dr = array();  

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) { 

      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_conteudo/?idconteudo=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }

      $r .= "<h3>" . $row["titulo"]. "</h3>";
      $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);   

      $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $url = str_replace("?", "%3F", $url);
      $url = str_replace("&", "%26", $url);
      $url = str_replace("/", "%2F", $url);
      $url = str_replace(":", "%3A", $url);

      if($row["plugin"] !=""){
        $array = file("plugin/" . $row["plugin"]  . ".php");
        foreach($array as $line)
        {
          $r .= str_replace("url-plugin",$url,$line);
        }       
      } 

    }
  }
  catch(PDOException $e)
  {}  

  $r = str_replace("-iframe","<iframe",$r);
  $r = str_replace("-/iframe-","></iframe>",$r);


  $r = str_replace("<h3></h3>","",$r);

  return $r;

}  

public function readItensDestaquesByTipo($tipo) {

  $Conteudos = new DestaquesModel();
  $st_query = "
  SELECT id, classe
  FROM destaques
  WHERE tipo = $tipo
  ORDER BY id";

  $dr = array();

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   $r = array();
   $i = 0;

   while ($row = $stmt->fetch()) {
    $dr[$i] = "<div id='dst-" . $row["id"] . "' class='w" .  $row["classe"] . " '>" .
    $Conteudos->readConteudosIdDestaqueFixo($row["id"]) . "</div> ";
    $i++;
  }
} catch (PDOException $e) {

}
return $dr;
}

public function readItensDestaquesFixo($tipo) {

  $Conteudos = new DestaquesModel();
  $st_query = "
  SELECT id, classe
  FROM destaquesfixo
  WHERE tipo = $tipo
  ORDER BY id";

  $dr = array();

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   $r = array();
   $i = 0;

   while ($row = $stmt->fetch()) {
    $dr[$i] = "<div id='dst-" . $row["id"] . "' class='w" .  $row["classe"] . " '>" .
    $Conteudos->readConteudosIdDestaqueFixo($row["id"]) . "</div> ";
    $i++;
  }
} catch (PDOException $e) {

}

return $dr;
}


public function readItensDestaquesView() {
  $Conteudos = new DestaquesModel();
  $st_query = "
  SELECT id, classe
  FROM destaques
  WHERE tipo = 2
  ORDER BY id";

  $dr = array();
  $r = array();
  $i = 0;

  try {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {  
     $dr[$i] = "<div id='dst-" . $row["id"] . "' class='w" . $row["classe"] . " '>" .
     $Conteudos->readConteudosIdDestaque($row["id"]) . "</div> ";
     $i++;
   }
 } catch (PDOException $e) {

 }
 return $dr;
}


public function readItensEspeciais($id) {
  $st_query = "
  SELECT id, classe, visivel
  FROM containers
  WHERE id = $id
  ";

  $r = "";

  try {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {  
      $r .= "<div id='row-" . $row["id"] . "' class='" . $row["classe"] . "'>";
      $r .= $this->readItensDestaques($row["id"]);
      $r .= "</div>";
    }
  } catch (PDOException $e) {

  }
  return $r;
}

public function getTotalRegistrosFixos()
{
 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from destaques WHERE tipo = 0")->fetch());
 return $r;
}

public function getTotalRegistros()
{
 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from destaques WHERE tipo = 1")->fetch());
 return $r;
}
public function getTotalRegistrosContainers()
{
 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from containers")->fetch());
 return $r;
}


public function getRowDestaque($id)
{
  $st_query = "
  SELECT id, titulo, texto, classe, plugin
  FROM destaques  
  WHERE id = $id";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["titulo"];
    $r[2] = $row["texto"];
    $r[3] = $row["classe"];
    $r[4] = $row["plugin"];
  }
}
catch(PDOException $e)
{}  
$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return $r;
}



public function get_plugins() {

  $st_query = "
  SELECT id,
  titulo,
  plugin
  FROM plugin 
  ORDER BY titulo";
  $r = array();   
  $i=0;

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);

   while ($row = $stmt->fetch()) {
    $r[$i][0] = $row["id"];
    $r[$i][1] = $row["titulo"];
    $r[$i][2] = $row["plugin"];

    $i++;
  }

}
catch(PDOException $e)
{}  

return $r;

}  


public function set_plugin($id,$plugin)
{
  $st_query = "
  UPDATE destaques
  SET
  plugin = '$plugin'
  WHERE
  id = $id
  ";  

  $dbh=getdbh();
  $stmt = $dbh->prepare($st_query);
  try
  {
    $stmt->execute();
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}
}

?>