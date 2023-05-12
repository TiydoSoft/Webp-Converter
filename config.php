<?php require_once "header.php"; ?>

<form action="index.php">
    <button>Convert More</button>
</form>
<form  action="store.php" method="POST">
    <button name="store">Move Images to Store</button>
</form>
<form action="Store.php">
    <button>View Store</button>
</form>

<?php
if (isset($_POST['go'])){
    $srcs= __DIR__."/img/";

    $imgs= scandir($srcs);
    $clear_array_one= array_shift($imgs);
    $clear_array_one= array_shift($imgs);

    foreach ($imgs as $img) {
        $fileName = explode('.',$img); //separate extention
        $filePrefix = $fileName[0]; //images name without extention
        $fileActualExtName = strtolower(end($fileName));
    
        $inputNamr = $filePrefix.'.'.$fileActualExtName;
        $outputName = $filePrefix.'-(TiydoShop).webp';

        $input = __DIR__.'/img/'. $inputNamr;
        $output = __DIR__.'/output/'. $outputName;

        exec(__DIR__."/cwebp -q 60 {$input} -o {$output}");
        echo"{$inputNamr} => {$outputName} (Convert Complete).<br>";

    };

    $folder1= __DIR__."/img/";
    
    $images1= scandir($folder1);
    $clear_array= array_shift($images1);
    $clear_array= array_shift($images1);

    foreach ($images1 as $image1) {
        $fileExt1 = explode('.',$image1); //separate extention
    
        //$fileNamePrefix1 = $fileExt1[0]; //images name without extention
        $fileNamePrefixNew1 = $fileExt1[0]; //simplify images name without extention
    
        $fileActualExt1 = strtolower(end($fileExt1));

        $imageLocatin1 = __DIR__."/img/".$image1;

        $newName1 = $fileNamePrefixNew1.'.'.$fileActualExt1;


        $destination1 =__DIR__.'/Store/back-up/'.$newName1;

        echo rename($imageLocatin1, $destination1) ? "{$image1} => {$newName1} (Move Complete).<br>" : "ERROR";
    };

};
require_once "footer.php";
?>

