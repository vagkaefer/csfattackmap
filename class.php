<?

class AttackMap{

  	public function gera_cache(){

  		/*
  		This function loads the data from the file containing the blocked ips and saved in the cache file

		Essa funcao carrega os dados do arquivo que contem os ips bloqueados e salva no arquivo de cache 
  		*/
	  
	  	require 'config.php';

	  	//carrega os dados do log - loads the log data
		$ponteiro = fopen ($config_am[BLACKLIST_LOG],"r");
		if (!$ponteiro) die('ERROR BLACKLIST: File does not exist or need access permission - Arquivo nao existe ou precisa permissao de acesso!');

		$array_dad = array();
		$array_name = array();
		$total=0;
		while (!feof ($ponteiro)) {
			
			$linha_original = fgets($ponteiro,4096);
			
				
			if($linha_original{0} != '#'){

				$linha = explode(" ",$linha_original);			  
				
				$keywords = preg_split("/[(]+/", $linha_original);
				$keywords = preg_split("/[)]+/", $keywords[2]);
				$dad_pais = explode('/',$keywords[0]);
				
				if($array_dad[$dad_pais[0]] == NULL){
				  
				  $array_dad[$dad_pais[0]] = array(1,$dad_pais[1]); //insere o valor
				  $array_name[] = $dad_pais[0]; //insere a sigla do pais na lista dos nomes
				  
				}else{				  
				  $array_dad[$dad_pais[0]][0]++;
				}
				++$total;
			}
		}
		fclose ($ponteiro);		
		
		//gera o javascript do mapa - generates javascript code to map
		$qtd = count($array_name);
		$max = 0;
		$linha = NULL;
		for($x=0; $x<$qtd; $x++){
		  $linha = $linha.'{title: "'.$array_dad[$array_name[$x]][1].' ('.$array_dad[$array_name[$x]][0].')",id: "'.$array_name[$x].'",value: '.$array_dad[$array_name[$x]][0].'},';
		  if($array_dad[$array_name[$x]][0] > $max){
			$max = $array_dad[$array_name[$x]][0];
		  }
		}	 

		//salva no cache - save in the cache
		$ponteiro = fopen ($config_am[CACHE_FILE],"w+");
		if (!$ponteiro) die('ERROR CACHE FILE: File does not exist or need access permission - Arquivo nao existe ou precisa permissao de acesso!');
			fwrite($ponteiro, $max."\n".$linha);

		echo "Novo cache gerado com sucesso! ".$total." registro(s) | New cache successfully generated! ".$total." record(s)";
	
	}//Fim da funcao gera_cache - End of the function gera_cache
}
?>
