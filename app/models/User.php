<?php
class User extends Model {

  function __construct($id='') {
    parent::__construct('uid','users'); //primary key = uid; tablename = users
    $this->rs['uid'] = '';
    $this->rs['username'] = '';
    $this->rs['password'] = '';
    $this->rs['fullname'] = '';
    $this->rs['created_dt'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['created_dt']=date('Y-m-d H:i:s');
    return parent::create();
  }

  function readItensPaginacao($ln, $x, $y, $ordenar,$credencial)
  {
    $i = 0;
    $l=0;
    $totallinhas = 0;
    $linhas = $ln;
    $paginas = 0;

    $dbh=getdbh();

    $stmt = $dbh->query('SELECT * FROM usuarios');
    $totallinhas = $stmt->rowCount();

    $paginas = $totallinhas / $linhas;

    echo $totallinhas;

    $st_query = "
    SELECT id,
    dma,
    nome,
    email,
    endereco,
    bairro,
    cidade,
    estado,
    cep,
    credencial
    FROM usuarios
    ORDER BY $ordenar";

    $r = array();   
    $r[3][0] = ""; 
    try
    {

      $r = array();
      $i=0;

      $stmt = $dbh->query("SELECT * FROM usuarios");
      while ($row = $stmt->fetch()) {
      
        if ($i >= $x) {
          $r[$l][0] = $row['id'];
          $r[$l][1] = $row['dma'];
          $r[$l][2] = $row['nome'];
          $r[$l][3] = $row['email'];
          $r[$l][4] = $row['endereco'];
          $r[$l][5] = $row['bairro'];
          $r[$l][6] = $row['cidade'];
          $r[$l][7] = $row['estado'];
          $r[$l][8] = $row['cep'];
          $r[$l][9] = $row['credencial'];
          $l++;
        }
        $i++;
        if ($i == $x + $linhas) {
                $l = $l + 1; // for create pages

                break;
              }

            }

          }
          catch(PDOException $e)
          {}  

          $r[$l][0] = "";
          $r[$l][1] = "";
          $r[$l][2] = "";
          $r[$l][3] = "";
          $r[$l][4] = "";
          $r[$l][5] = "";
          $r[$l][6] = "";


// create flow rows
          $p = $y;
          if ($y > 0) {
            $a = $y * $linhas;
            $a = $a - $linhas;
            $b = $y - 10;
            $r[$l][1] .= "<ul class='paginacao'><li><a href='?controle=page&acao=open&x=" . $a . "&y=" . $b . "'>...</a></li>";
          }
          for ($i = 1; $i < 11; $i++) {
            $p++;
            $x = $p * $linhas - $linhas;
            $r[$l][0] = "#p#";
            if ($x < $totallinhas) {
              $r[$l][1] .= "<li class='pag-now'>";
              $r[$l][1] .= "<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
              $r[$l][1] .= "</li>";
            }
          }
        $r[$l][2] .= $totallinhas . " itens"; // $paginas;

        if ($x < $totallinhas) {
          $x = $x + $linhas;
          $y = $y + 10;
          $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "'>...</a></li></ul>";
        }
        // and flow rows

        return $r;
      }   

    }