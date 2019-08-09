<?php
//file ini berisi fungsi koneksi ke database mysql
if (ereg("fungsi_mysql.php",$_SERVER["PHP_SELF"])){ 
  header("Location:notfound.php");
  die;
}

$limit = 6;

//------------------------ class connection-------------------------------
class Connection {   
   
   function Connect($param='trans'){   
      require_once "configuration.php";
      $this->db_host = $db[$param]['db_host'];
      $this->db_user = $db[$param]['db_user'];
      $this->db_password = $db[$param]['db_password'];
      $this->db_name  = $db[$param]['db_name'];
     
     mysql_connect($this->db_host,$this->db_user,$this->db_password) or die (mssql_get_last_messsage());
     mysql_select_db($this->db_name) or die(mssql_get_last_messsage()); 
   }
   
   function parseQuery($strQuery){      
      $result = mysql_query($strQuery);
      return $result;
   }
   
   function Open($parseQuery){
      while($row = mysql_fetch_assoc($parseQuery))
         $result[] = $row;      
      return $result;
   }
   
   function getNumRows($result){
      $num = mysql_num_rows($result);   
      return $num;
   }
   
   /*function ExecSp($spName, $params, $data, $length){      
      $stmt = mssql_init($spName);
      
      foreach($params as $key => $value):
         mssql_bind($stmt, $value, $data[$key], SQLVARCHAR, false,  false, $length[$key]);      
      endforeach;     
      
      $result = mssql_execute($stmt);
      
      mssql_free_statement($stmt);
      return $result;
   }*/
}

?>