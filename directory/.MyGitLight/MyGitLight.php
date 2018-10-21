<?php

    $help = "démarrer une zone de travail :
    init       Créer un dépôt Git vide ou réinitialiser un existant";
    function myGitLight()
    {
        function init()
        {
            global $argc, $argv, $help;
            $file_name = "MyGitLight.php";
            $dir_name = ".MyGitLight";
            $content = file_get_contents($argv[0]);
            $create_dir = mkdir(".MyGitLight");

            if(trim($argv[1]) == "init")
            {       
                if(empty($argv[2]))
                {   
                    file_put_contents($file_name, $content);
                    copy($file_name, ".MyGitLight/".$file_name);
                    echo "Depot GitLight initialisé !";
                    return true;
                }
                if(is_dir($argv[2]))
                { 
                    if(is_writable($argv[2]))
                    {
                        file_put_contents($file_name, $content);
                        copy($file_name, ".MyGitLight/".$file_name);
                        $argv[2] = realpath($argv[2]);
                        rename($dir_name, $argv[2] . "/" .$dir_name);
                        echo $argv[2] . "/" .$dir_name;
                        echo "Depot GitLight initialisé dans le dossier $argv[2]!"; 
                    }
                    else
                    {
                        echo "Vous n'avez pas les droits sur ce dossier !";
                    }
                }
                else
                {
                    echo "Le dossier n'existe pas !";
                    return false;
                }
            }
            elseif(trim($argv[1]) != "init")
            {
                echo $help;
                return 0;
            }
            
            if(trim($argv[2]) == "add")
            {
                
            }

        }
        init();
    }
    myGitLight();
?>