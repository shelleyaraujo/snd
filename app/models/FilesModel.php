<?php

class FilesModel extends Model
{
	private $path;
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function setPath( $path )
	{
		$this->path = $path;
		return $this;
	}

	function openDirImagens($dir,$x,$y) {

		$r = array();
		$i = 0;
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false)
				{
					if($file != "") {
						if($i > 1) {
							if($i > $x && $i < $y) {
								$r[$i] = $file;
							}
						}
						$i++;						
					}
				}
				closedir($dh);
			}
		}
		return $r;
		closedir($handle);
	}

	function openDir($dir) {

		$r = array();
		$i = 0;
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false)
				{
					if($file != "")
					{
						$r[$i] = $file;
						$i++;						
					}
				}
				closedir($dh);
			}
		}
		return $r;
		closedir($handle);
	}
	
	public function deleteArquivo($arquivo) {
		if (file_exists($arquivo)) {
			unlink($arquivo);
		} else {
			// File not found.
		}
	}

	function limpaArquivoCache($arquivo) {
		$arquivo = sha1($arquivo) . ".tmp";

		echo $arquivo;
		$dir = "../cache";
		$r = array();
		$i = 0;
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false)
				{
					if($file != "")
					{
						if($file == $arquivo)
							$r[$i] = $file;
						$this->deleteArquivo("../cache/" . $arquivo);
						$i++;						
					}
				}
				closedir($dh);
			}
		}
		return $r;
		closedir($handle);
	}

	function compareFiles($file_a, $file_b)
	{
		if (filesize($file_a) == filesize($file_b))
		{
			$fp_a = fopen($file_a, 'rb');
			$fp_b = fopen($file_b, 'rb');

			while (($b = fread($fp_a, 4096)) !== false)
			{
				$b_b = fread($fp_b, 4096);
				if ($b !== $b_b)
				{
					fclose($fp_a);
					fclose($fp_b);
					return false;
				}
			}

			fclose($fp_a);
			fclose($fp_b);

			return true;
		}

		return false;
	}
}

?>