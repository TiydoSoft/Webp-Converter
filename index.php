<?php require_once "header.php"; ?>

    <form  action="rename.php" method="POST">
        <button name="run">Rename Images</button>
    </form>
    <form  action="store.php" method="POST">
        <button name="store">Move Images to Store</button>
    </form>
    <form method="POST">
        <button name="clean">Clean Output folder</button>
    </form>
    <br><br>    

    
<?php
if (isset($_POST['clean'])){
    $folder= __DIR__."/output/";

    $images= scandir($folder);
    $clear_array= array_shift($images);
    $clear_array= array_shift($images);

    foreach ($images as $image) {
        $fileExt = explode('.',$image); //separate extention
        $fileNamePrefix = $fileExt[0]; //images name without extention
        $fileActualExt = strtolower(end($fileExt));

        $imageLocatin = __DIR__."/output/".$image;

        $newName = $fileNamePrefix.'.'.$fileActualExt;


        $destination =__DIR__.'/Store/'.$newName;

        echo rename($imageLocatin, $destination) ? "{$image} => {$newName} (Rename Complete).<br>" : "ERROR";
    };
};

require_once "footer.php";
?>