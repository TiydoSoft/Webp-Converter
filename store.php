<?php require_once "header.php"; ?>

<form action="index.php">
    <button>Convert More</button>
</form>
<form  action="store.php" method="POST">
    <button name="store">Clear renamed folder</button>
</form>
<?php

    if (isset($_POST['store'])){
        $folder= __DIR__."/img/";
    
        $images= scandir($folder);
        $clear_array= array_shift($images);
        $clear_array= array_shift($images);
    
        foreach ($images as $image) {
            $fileExt = explode('.',$image); //separate extention
        
            $fileNamePrefix = $fileExt[0]; //images name without extention
            $fileNamePrefixNew = str_replace(" ", "-", $fileExt[0]); //simplify images name without extention
        
            $fileActualExt = strtolower(end($fileExt));
    
            $imageLocatin = __DIR__."/img/".$image;
    
            $newName = $fileNamePrefixNew.'.'.$fileActualExt;
    
    
            $destination =__DIR__.'/Store/back-up/'.$newName;
    
            echo rename($imageLocatin, $destination) ? "{$image} => {$newName} (Rename Complete).<br>" : "ERROR";
        };
    };
    require_once "footer.php";
?>
