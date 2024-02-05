<?php get_header();?>

<div style="margin-top:200px; padding:100px 25px;">

<h1> Pobieranie danych z API </h1>


<?php
$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, 'https://api.punkapi.com/v2/beers/');
curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

$jsonData = json_decode(curl_exec($curlSession));
curl_close($curlSession);
//print_r($jsonData[0]->ingredients);
$i = 0;

$beer = $jsonData;

    do{
    ?>
    <div class="beer-item" id="beer-item-<?php echo $i;?>">
    <strong> Nazwa: </strong> <?php echo $beer[$i]->name; ?>
    <strong> Zdjęcie: </strong> <img src="<?php echo $beer[$i]->image_url; ?>">
    <strong> Opis: </strong> <?php echo $beer[$i]->description; ?>

    </div>
<?php
    $i++;

}while($i<7);

?>


</div>

<?php get_footer();?>