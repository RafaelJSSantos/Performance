<?php
require_once('connectvars.php');
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

set_time_limit(0); 

function sqlAddslashes($str = '', $is_like = FALSE) 
{ 
	if ($is_like) 
	{ 
		$str = str_replace('\\', '\\\\\\\\', $str); 
		}else{ 
		$str = str_replace('\\', '\\\\', $str); 
		} 
		$str = str_replace('\'', '\\\'', $str); 
		return $str; 
} 

function dumptb($table) { 
	$nline = "\n"; 
	$dp = "CREATE TABLE $table ($nline"; 
	$firstfield = 1; 
	$fields_array = mysql_query("SHOW FIELDS FROM $table"); 
	 
	while ($field = mysql_fetch_array($fields_array)) 
	{ 
		if (!$firstfield) 
		{ 
			$dp .= ",\n"; 
		}else{ 
			$firstfield = 0; 
		} 
		$dp .= "\t".$field["Field"]." ". $field["Type"]; 
		if (isset($field['Default']) && $field['Default'] != '') 
		{ 
					$dp .= ' default \'' . sqlAddslashes($field['Default']) . '\''; 
		} 
		if ($field['Null'] != 'YES') 
		{ 
			$dp .= ' NOT NULL '; 
		} 
		if (!empty($field["Extra"])) 
		{ 
			$dp .= $field["Extra"]; 
		} 
	} 
	mysql_free_result($fields_array); 

	$keysindex_array = mysql_query("SHOW KEYS FROM $table"); 

	while ($key = mysql_fetch_array($keysindex_array)) 
	{ 
		$kname = $key['Key_name']; 
		if ($kname != "PRIMARY" and $key['Non_unique'] == 0) 
		{ 
			$kname = "UNIQUE|$kname"; 
		} 

		$index[$kname][] = $key['Column_name']; 
	} 
	mysql_free_result($keysindex_array); 
	 
	while(list($kname, $columns) = @each($index)) 
	{ 
		$dp .= ",\n"; 
		$colnames = implode($columns,","); 
		if($kname == 'PRIMARY') 
		{ 
			$dp .= "\tPRIMARY KEY ($colnames)"; 
		}else{ 
			if (substr($kname,0,6) == 'UNIQUE') 
			{ 
				$kname = substr($kname,7); 
			} 
			$dp .= "   KEY $kname ($colnames)"; 
		} 
	} 
	$dp .= "\n);\n\n"; 
	$rows = mysql_query("SELECT * FROM $table"); 
	$numfields=mysql_num_fields($rows); 
	 
	while ($row = mysql_fetch_array($rows)) 
	{ 
		$dp .= "INSERT INTO $table VALUES("; 
		$fieldcounter=-1; 
		$firstfield=1; 
		while (++$fieldcounter<$numfields) 
		{ 
			if(!$firstfield) 
			{ 
				$dp .=' , '; 
			}else{ 
				$firstfield=0; 
			} 
			if (!isset($row[$fieldcounter])) 
			{ 
				$dp .= 'NULL'; 
			}else{ 
				$dp .= "'".mysql_escape_string($row[$fieldcounter])."'"; 
			} 
		} 
		$dp .= ");\n"; 
	} 
	mysql_free_result($rows); 
	return $dp; 
} 

 
$file_name = date("d-m-Y").".txt"; 
$filehandle = fopen($file_name,'w'); 
$result = mysql_query("SHOW tables"); 
	while ($row = mysql_fetch_array($result)) 
	{ 
		fwrite($filehandle,dumptb($row[0])."\n\n\n"); 
	} 
fclose($filehandle); 


require("zip_lib.php");

$zipfile = new zipfile(date("d-m-Y").".zip");

$zipfile->addFileAndRead($file_name);

echo $zipfile->file();	
  
?>