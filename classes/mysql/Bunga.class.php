<?php

if (ereg("Bunga.class.php",$_SERVER["PHP_SELF"])){ 
  header("Location:index.php");
  die;
}

class Bunga extends Connection{
   
   function Bunga(){
      parent::Connect();
   }
   
   function GetAllBunga($status, $kategori, $start, $limit){  
		
		$str_status = "status_produk = '".$status."' ";
		if(trim($kategori) == ""){
			$str_kategori = "";
		}else{
			$str_kategori = "AND id_kategori_produk = '".$kategori."' ";
		}
      
	  $query =  "SELECT a.* FROM  ci_produk a
				LEFT JOIN ci_kategori b ON a.id_kategori_produk = b.id_kategori
				WHERE ".
				$str_status.
				$str_kategori.
				"ORDER BY tanggal_produk DESC LIMIT ".$start.",".$limit;
		
		//print $query;
      $resultQuery = $this->parseQuery($query);      
	  $result  = $this->Open($resultQuery);   
	  return $result;
   }
   
   function GetCountBunga($status, $kategori){ 

		$str_status = "status_produk = '".$status."' ";
		if(trim($kategori) == ""){
			$str_kategori = "";
		}else{
			$str_kategori = "AND id_kategori_produk = '".$kategori."' ";
		}
		
      
	  $query =  "SELECT 
				COUNT(a.id_produk) as jml
				FROM  ci_produk a
				LEFT JOIN ci_kategori b ON a.id_kategori_produk = b.id_kategori
				WHERE ".
				$str_status.
				$str_kategori;
		
		//print $query;
      $resultQuery = $this->parseQuery($query);      
	  $result  = $this->Open($resultQuery);   
	  return $result;
   }
   
   function GetComboKategori(){
     $query =  "SELECT id_kategori AS id, nama_kategori AS NAME FROM ci_kategori 				
				ORDER BY nama_kategori";
     $resultQuery = $this->parseQuery($query);
     $row  = $this->Open($resultQuery);  
     return $row;    
   }
   
   /*function GetDataById($id){
     $query =  "SELECT * FROM ci_posts WHERE post_id=".$id;
     $resultQuery = $this->parseQuery($query);
     $row  = $this->Open($resultQuery);  
     return $row;    
   } */  
   
}

?>
