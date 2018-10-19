<?php
    function myGitLight()
    {
        global $argc, $argv;
        $directory = mkdir(".MyGitLight");
        $file_name = "MyGitLight";

        $content = file_get_contents($argv[0]);

        if($argv[0] == "MyGitLight.php")
        {
            file_put_contents($file_name, $content);
        }
        rename("MyGitLight", "/.MyGitLight");
    }

    myGitLight();
?>