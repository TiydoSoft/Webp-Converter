<?php
$i = 0;

    $picturesSrc= __DIR__.'\input\\';

    $pictures= scandir($picturesSrc);
    $clear_array_once= array_shift($pictures);
    //$clear_array_once= array_shift($pictures);

    foreach ($pictures as $key => $picture);
    if ($key != 0) {
        $clear_array_once= array_shift($pictures);
        

        echo "<h2>Inputted images for convert:</h2><br>";

        foreach($pictures as $key => $picture) { 
            $urlTampImage= "input\\".$picture;
            ?>
            <img src="<?php echo $urlTampImage;?>" width="100" height="100"/><?php
        }
    }

?>

<div class="row">
    <div class="column">
        <?php
            $picturesSrc= __DIR__.'\img\\';

            $pictures= scandir($picturesSrc);
            $clear_array_once= array_shift($pictures);
            //$clear_array_once= array_shift($pictures);

            foreach ($pictures as $key => $picture);

            if ($key != 0) {
                $i = $i+1;
                $clear_array_once= array_shift($pictures);
                echo "<h2>Available images for convart:</h2><br>";

                foreach ($pictures as $key => $picture) {
                    $urlTampImage= "img\\".$picture;
                    ?>
                    <img src="<?php echo $urlTampImage;?>" width="100" height="100"/><?php
                }
            }

        ?>
    </div>

        <div class="column">
        <?php
            $picturesSrc= __DIR__.'\output\\';

            $pictures= scandir($picturesSrc);
            $clear_array_once= array_shift($pictures);
            //$clear_array_once= array_shift($pictures);

            foreach ($pictures as $key => $picture);

            if ($key != 0) {
                $i = $i+1;
                $clear_array_once= array_shift($pictures);
                echo "<h2>Available images in Output folder:</h2><br>";

                foreach ($pictures as $picture) {
                    $urlTampImage= "output\\".$picture;
                    ?>
                    <img src="<?php echo $urlTampImage;?>" width="100" height="100"/><?php
                }
        }
        ?>
    </div>
    
    <div class="column">
        <?php
            $picturesSrc= __DIR__.'\Store\back-up\\';

            $pictures= scandir($picturesSrc);
            $clear_array_once= array_shift($pictures);
            //$clear_array_once= array_shift($pictures);

            foreach ($pictures as $key => $picture);

            if ($key != 0) {
                $i = $i+1;
                $clear_array_once= array_shift($pictures);
                echo "<h2>Available images in Store:</h2><br>";

                foreach ($pictures as $picture) {
                    $urlTampImage= "Store\back-up\\".$picture;
                
                    ?><img src="<?php echo $urlTampImage;?>" width="100" height="100"/><?php
                }
        }
        ?>
    </div>

    <div class="column">
        <?php
            $picturesSrc= __DIR__.'\Store\\';

            $pictures= scandir($picturesSrc);

            $clear_array_once= array_shift($pictures);
            //$clear_array_once= array_shift($pictures);
            //$clear_array_once= array_shift($pictures);

            foreach ($pictures as $key => $picture);

            if ($key != 0) {
                $i = $i+1;
                $clear_array_once= array_shift($pictures);

                echo "<h2>All converted Image:</h2><br>";

                foreach ($pictures as $picture) {

                    $fileName = explode('.',$picture); //separate extention

                    $fileExtName = strtolower(end($fileName));; //images name without extention
                    
                    $urlTampImage= "Store\\".$picture;

                    if ($fileExtName == 'webp') { 
                        ?>
                        <img src="<?php echo $urlTampImage;?>" width="100" height="100"/><?php
                    }
                    
                }
            }

        ?>
    </div>
</div>

<?php 
//echo $i;
$width = array(0, 0, 50, 33, 25);


?>

<style>
    .column {
        /* float: left; */
        width: <?php echo $width[$i]; ?>%
    }

</style>

</body>
</html>