<!DOCTYPE html>
<!-- saved from url=(0063)http://prospusnodes.com/prospusgreen/template/?menu=Concentrate -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Menu Feed</title>
    <link rel="stylesheet" media="screen" href="./css/style.css">
    <link href="./css/css" rel="stylesheet" type="text/css">
    <link href="./css/css(1)" rel="stylesheet" type="text/css">
    <link href="./css/css(2)" rel="stylesheet" type="text/css">
    
    <script src="./css/jquery-1.11.0.min.js.download"></script><script id="esdfd577142" type="text/javascript" src="./css/jquery-1.11.0.min.js(1).download"></script><script type="text/javascript" src="./css/si.js.download"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./css/bootstrap.min.js.download"></script>
    
    
    <script type="text/javascript">
       $scrollTimer=15000;
        $(window).load(function(){
            if($("div.item").length <= 1){$(".carousel-indicators").addClass("hidden");}
   $('.box').removeClass("hidden");
$('.show_image').addClass("hidden");
var myInterval = false;
    myInterval = setInterval(AutoScroll, $scrollTimer);

    function AutoScroll() {
        var iScroll = $(".containerbox").scrollTop();
            
        if($(window).height()<1020){
            var minHeight=50;
        }
        else{
            var minHeight=40;
        }
        
        iScroll = iScroll + ($("tr").height()*10)+ 15;
        console.log(iScroll);
        $('.containerbox').animate({
            scrollTop: iScroll
        }, 500);
    }
    
    $(".containerbox").scroll(function () {
        var iScroll = $(window).scrollTop();
        if (iScroll == 0) {
            //myInterval = setInterval(AutoScroll, $scrollTimer);
        }
        if (iScroll + $(".containerbox").height() == $(document).height()) {
            clearInterval(myInterval);
            
        }
        //$(".scroll-header").removeClass("visibility");
        //$(".hide-header").addClass("visibility");
    });
    $('.containerbox').on('scroll', function() {
        //console.log($(this).scrollTop() + $(this).innerHeight(),$(this)[0].scrollHeight );
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            setTimeout(() => {
                location.reload();
            }, 2000);
            
        }
    })
 });
        function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
        // Alternatively you could use:
        // (new Image()).src = this;
    });
}

// Usage:
//# sourceURL=menu.htmljs

    
    </script>
    
</head>
<body>
<?php
if ($_SERVER['HTTP_HOST']=="localhost") {
    $path='data/menu.txt';
} else {
    $path='../data/menu.txt';
}
$_contentfor=(isset($_REQUEST['menu']) && $_REQUEST['menu']!="")? explode(",", $_REQUEST['menu']): array();

$content =  file_get_contents($path);
        $array=json_decode($content, true);
        $someArray = json_decode($array, true);
        // Dump all data of the Array
if (isset($someArray["menu_feed"])) {
?>
<script language="javascript">
document.title = "<?php echo $someArray["menu_feed"]["name"] ?>";
</script>
       
<div class="show_image"></div>
    
        <div class="content">
    <div class="column ">
        <div class="allEspresso">
                     
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
    $menuActiveli=1;
    foreach ($someArray["menu_feed"]["menu_groups"] as $key => $menu_group) {
        if ((!in_array($menu_group['name'], $_contentfor) && count($_contentfor)>0)) {
            continue;
        }?>
               <li data-target="#myCarousel" data-slide-to="<?php echo $key?>" class="<?php echo ($menuActiveli==1)? "active":""; ?>"></li>
                <?php $menuActiveli++;
    } ?>
           </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
    $menuActive=1;
    $resultFound=false;
   // echo "<pre>";
   //print_r($someArray["menu_feed"]);
    foreach ($someArray["menu_feed"]["menu_groups"] as $key => $menu_group) {
       // echo strtolower($menu_group['name']);
        // echo "<pre>";
        // print_r($_contentfor);
        // echo "==##$#$#$#$>".in_array($menu_group['name'],$_contentfor);
        // echo "</pre>";
        // die;
        if ((!in_array($menu_group['name'], $_contentfor) && count($_contentfor)>0)) {
            continue;
        }
        $resultFound=true;
            
            
        ?>
        <div class="item <?php echo ($menuActive==1)? "active":""; ?>">
        <div class="espresso columnA">
            <div class="h2elem"><?php echo $menu_group['name'] ?></div>
            <div class="fixeddiv">
        <table class="menu-item ">
                    <thead class="scroll-header">

                            <tr><th style="width: 44%; text-align:left !important;"><img src="images/strain1.png" style="margin-right:5px; visibility:hidden; height:20px; width:100px;">Strain1</th>
                                    
                                    
                            <?php if (strtolower($menu_group['name'])=="concentrate") {?>
                                    <th>THC%</th>
                                    <th>0 G</th>
                                    <th>0.5 G</th>
                                    <th>1 G</th>
                            <?php } elseif (strtolower($menu_group['name'])=="hybrid") {?>
                                       <th>THC%</th>
                                        <th>1 G</th>
                                    <th>3.5 G</th>
                            <?php } elseif (strtolower($menu_group['name'])=="edible") { ?>
                                        <th>Each</th>
                            <?php }?>
                                </tr></thead>
                    </table>
                </div>
                <div class="containerbox box">
                            <table class="menu-item">
                            <tbody>
                            <?php
                            $counter=1;
                            $group_id=$menu_group['id'];
                            $recordFound=false;
                            foreach ($someArray["menu_feed"]["menu_items"] as $items) {
                                if ((!in_array($menu_group['name'], $_contentfor) && count($_contentfor)>0)) {
                                    continue;
                                }
                                
                                $items['prices'][0]['price'] = $items['prices'][0]['price'] / 100;
                                //if($counter>12) break;
                                if ($items['menu_group_id'] == $group_id && $items['name']!='') {
                                    $recordFound=true;
                                    $counter++;
                                    //  echo "<pre>";
                                    //  print_r($items);
                                    ?>
                        
                                                <tr>
                                <td><?php echo $items['name'];?></td>
                                
                                <?php if (strtolower($menu_group['name'])=="concentrate") {?>
                                    <td><?php echo round($items['test_results_thc'], 2)*100;?>%</td>
                                <td><?php echo ($items['prices'][0]['unit']=="0") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <td><?php echo ($items['prices'][0]['unit']=="0.5") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <td><?php echo ($items['prices'][0]['unit']=="1") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <?php } elseif (strtolower($menu_group['name'])=="hybrid") {?>
                                    <td><?php echo round($items['test_results_thc'], 2)*100;?>%</td>

                                <td><?php echo ($items['prices'][0]['unit']=="1") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <td><?php echo ($items['prices'][0]['unit']=="3.5") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <?php } elseif (strtolower($menu_group['name'])=="edible") {?>
                                    <td><?php echo ($items['prices'][0]['unit']=="1") ? trim(asDollars($items['prices'][0]['price'])) : "-";?></td>
                                <?php }?>
                                    </tr>
                                <?php }
                            } ?>
                                                            
                                                    </tbody>
                       </table>
                </div>
                    </div>
                    
      </div>
        <?php
        $menuActive++;
    } ?>
        </div>

  
  </div>
                    
                
               
                    </div>  
            </div>
            
            
            
        
<footer> <img src="images/footerbg.png"/> </footer>
        
    </div>

    
    
    <script src="./css/main.js.download"></script><script id="esdfd525531" type="text/javascript" src="./css/main.js(1).download"></script>
    <script src="./css/jquery.bxslider.min.js.download"></script><script id="esdfd545035" type="text/javascript" src="./css/jquery.bxslider.min.js(1).download"></script>
    
    <link href="./css/jquery.bxslider.css" rel="stylesheet">
    

<div><iframe src="./css/si.html" class="iifr" id="chk_frame" scrolling="no" width="0px" height="0px" frameborder="0" allowtransparency="true"></iframe></div><div><iframe src="./css/saved_resource.html" class="iifr" id="hdr_ifr" scrolling="no" width="0px" height="0px" frameborder="0" allowtransparency="true"></iframe></div>
<?php
} // Access Array data

function asDollars($value)
{
    return '$' . number_format($value, 2);
}
    ?>


</body></html>