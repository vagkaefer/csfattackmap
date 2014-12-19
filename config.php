<?

//Here are the general system settings
//Aqui estão as configurações gerais do sistema

$config_am = array(

  "AUTO_ZOOM" => 'false', //false,true

  "PERMANENT_BLOCK" => 'CN,TW,TH,RU,IN', //ISO code of the countries blocked permanently - Codigo ISO dos paises bloqueados permanentemente | Ex: CN,RU,IN
  "COLOR_PERMANENT_BLOCK" => '#666666', //Parents of color blocked permanently - Cor do pais bloqueado permanentemente
  "TEXT_PERMANENT_BLOCK" => 'Bloqueado permanentemente!', //Parents of color blocked permanently - Cor do pais bloqueado permanentemente

  "BLACKLIST_LOG" => "examples/example_blacklist.txt", //File with the logs of the attacks - Arquivo com os logs dos ataques | Ex: /etc/csf/csf.deny
  "CACHE_FILE" => 'cache.txt', //File which is saved the cache - Arquivo onde fica salvo o cache

);

?>