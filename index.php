<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        require __DIR__ . '/vendor/autoload.php';
        
        $appId = "e20f7331-41ab-40fc-8feb-e4ae7b70c71f";
        $okres_id = 23506;

        $skautis = \Skautis\Skautis::getInstance($appId, $isTestMode = TRUE);
        $okres = $skautis->org->UnitDetail(array("ID" => $okres_id));
        $strediska = $skautis->org->UnitAll(array("ID_UnitParent" => $okres_id));
        
        echo "<h1>" . $okres->FullDisplayName . "</h1>";
            $okresDetail = $skautis->org->UnitDetailRegistry(array("ID" => $okres->ID));
            echo "Sídlo okresu: " . $okresDetail->Street . ", " . $okresDetail->Postcode . " " . $okresDetail->City . "<br />";
            echo "Předseda okresu:" . $okresDetail->LogoContent . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
            echo "Předseda okresu:" . "" . "<br />";
        
        foreach ($strediska as $stredisko) {
            $unitDetail = $skautis->org->UnitDetailRegistry(array("ID" => $stredisko->ID));
            echo "<h2>" . $unitDetail->DisplayName . "</h2>";
            echo "Ulice: " . $unitDetail->Street . "<br />";
            echo "Mesto: " . $unitDetail->City . "<br />";
            echo "PSČ: " . $unitDetail->Postcode . "<br />";
            
            $oddily = $skautis->org->UnitAll(array("ID_UnitParent" => $stredisko->ID));
            foreach ($oddily as $oddil) {
                echo "<h3>" . $oddil->DisplayName . "</h3>";
            }
            echo "<hr />";
        }
        ?>
    </body>
</html>
