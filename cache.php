<?
require_once 'config.php';

//loads the cache data
//carrega os dados do cache
$ponteiro = fopen ($config_am[CACHE_FILE],"r");
$max = fgets($ponteiro,4096);
echo fgets($ponteiro,4096);
fclose ($ponteiro);

//loads the countries blocked permanently
//carrega os paises bloqueados permanentemente
$perm_block = $config_am[PERMANENT_BLOCK];
$perm_block = str_replace(' ','',$perm_block);
$perm_block = explode(',',$perm_block);
$qtd_perm = count($perm_block);
for($x=0; $x<$qtd_perm; $x++){
	echo '{title: "",id: "'.$perm_block[$x].'", color: "'.$config_am[COLOR_PERMANENT_BLOCK].'"},';
}
?>