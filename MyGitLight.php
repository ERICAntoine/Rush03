<?php

    $help = "démarrer une zone de travail : \n
    init       Créer un dépôt Git vide ou réinitialiser un existant";
    function myGitLight()
    {
        global $argc, $argv, $help;
        $file_name = "MyGitLight";
        $argv[1] = NULL;

        $content = file_get_contents($argv[0]);

        if($argv[1] == "init")
        {
            if($argv[0] == "MyGitLight.php")
            {
                file_put_contents($file_name, $content);
                echo "Depot GitLight initialisé !";
            }
        }
        else
        {
            echo $help;
            return 0;
        }
        $directory = mkdir(".MyGitLight");
        rename($file_name, ".MyGitLight/".$file_name);
    }

    myGitLight();
?>