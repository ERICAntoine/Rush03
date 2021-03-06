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

            if(trim($argv[1]) == "init")
            {      
                $create_dir = mkdir(".MyGitLight");

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
                        $dir_exist = $argv[2] . "/" .$dir_name;
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
            elseif(trim($argv[1]) != "init" || trim($argv[1]) != "add")
            {
                echo $help;
                //return 0;
            }
            
            if(trim($argv[1]) == "add")
            {
                if(is_dir($dir_name))
                {
                    $current_dir = getcwd();
                    $dir_array = scandir($current_dir);

                    for($i = 5; $i < count($dir_array); $i++)
                    {
                        /*if(is_dir($dir_array[$i]))
                        {
                            $open_dir = opendir($dir_array[$i]);
                            $dir_copy = mkdir($dir_array[$i]);
                            add()
                            //copy($dir_array[$i], ".MyGitLight/".$dir_array[$i]);
                        }*/
                        copy($dir_array[$i], ".MyGitLight/". $dir_array[$i]);
                        echo "\n".$dir_array[$i];
                    }
                }
                
            }
        }

        /*function add($dir,$dir_copy)
        {
            $handle = opendir($dir);
             
            while($file= readdir($handle))
            {
                if($file != "." && $file != "..")
                {
                    if ( is_dir($dir . '/' . $file) ) { 
                        recurse_copy($dir . '/' . $file,$dst . '/' . $file); 
                    } 
                    else { 
                        copy($dir . '/' . $file,$dst . '/' . $file); 
                    } 
                }    
           }
        }*/
        init();
    }
    myGitLight();
?>