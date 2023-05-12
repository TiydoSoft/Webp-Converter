<?php require_once "header.php"; ?>

<form action="config.php" method="POST">
    <button name="go">Convart Image</button>
</form><br>


<?php
if (isset($_POST['run'])){
    $folder= __DIR__."/input/";

    $images= scandir($folder);
    $clear_array= array_shift($images);
    $clear_array= array_shift($images);

    foreach ($images as $image) {
        $fileExt = explode('.',$image); //separate extention
    
        $fileNamePrefix = $fileExt[0]; //images name without extention
        $fileNamePrefixNew = str_replace(" ", "-", $fileExt[0]); //simplify images name without extention
    
        $fileActualExt = strtolower(end($fileExt));

        $imageLocatin = __DIR__."/input/".$image;

        $newName = $fileNamePrefixNew.'.'.$fileActualExt;


        $destination =__DIR__.'/img/'.$newName;

        echo rename($imageLocatin, $destination) ? "{$image} => {$newName} (Rename Complete).<br>" : "ERROR";
    };



};
require_once "footer.php";
?>

