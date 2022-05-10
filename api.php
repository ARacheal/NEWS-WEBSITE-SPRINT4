
<?php
//$url = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=7cccdad1e5184db5add52500a1ff17a4";
$url = "https://newsapi.org/v2/top-headlines/sources?apiKey=67ba99e34a074445819dc9fe5e656755";
$response = file_get_contents($url);
$allnewsData = json_decode($response);

?>