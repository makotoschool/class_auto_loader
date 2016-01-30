<?php
ini_set('display_errors',1);
spl_autoload_register(function($val){
    require_once(__DIR__.'/lib/'.$val.'.php');
}); 

$number=isset($_POST['number'])?$_POST['number']:10;
$url='https://itunes.apple.com/jp/rss/topsongs/limit='.$number.'/xml';
$req=new ItunesRss($url);
$smenu=new SelectMenu(array('10'=>10,'25'=>25,'50'=>50,'100'=>100  ));

//echo '<pre>';
//print_r($req->getRequest());
//echo '</pre>';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>itunesRsscustom</title>
</head>
<body>
   <div class="container">
      <div class="controll">
          <form action="" method="post" id="number">
             邦楽top
              <select name="number" onChange="document.getElementById('number').submit()">
                  <?php 
                  foreach($smenu->getoption() as $n=>$v):
                  if(isset($_POST['number']) && $n==$_POST['number']):
                        echo  "<option value='".$n."' selected>".$v."</option>";
                    else:
                        echo "<option value='".$n."'>".$v."</option>";
                    endif;
                  endforeach;
                  ?>
   
              </select>
              検索！
          </form>
      </div>
       <?php $number=1;foreach($req->getRequest()->entry as $entry): ?>
       <div class="item">
           <h1><?= $number.'位:'.$entry->title ;?></h1>
       </div>
   <?php $number++;endforeach; ?>
   </div>
    
</body>
</html>