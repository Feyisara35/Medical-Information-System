<?php 
        // function getConnection()
        // {
        //     // include 'dbconn.php';
        //     include "../classes/dbh.classes.php";
        // }

        function startMain(){
            return "<main>\n";
        }

        function endMain(){
            return "</main>\n";
        }
    

        function makePageStart($pageTitle){
            $pageStartContent = <<<PAGESTART
                <!doctype html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <title>$pageTitle</title>
                <link href="design.css" rel="stylesheet" type="text/css">
                <script src="script.js"></script>
                </head>
                <body>
                <div id="grid-Container">
PAGESTART;
                $pageStartContent .="\n";
                return $pageStartContent;
            }
        
        function makeHeader($headContent){
            $headContent = <<<HEAD
            <div class = "logo"><a href="">ZT</a></div>
             

HEAD;
                $headContent .="\n";
                return $headContent;
        }

        function makeNavMenu($menuLinks){

            $navMenuContent = <<<NAVMENU
        
            <nav id = "navigation">
                <ul>

NAVMENU;
       
           foreach($menuLinks as $key => $value){
               $navMenuContent .= "<li><a href = '$key'>$value</a></li>"; 
           }
                $navMenuContent .= "</ul></nav>\n";
                return $navMenuContent;
        }

        function makeFooter($footContent){
                $footContent = <<<FOOT
                <footer id = "reportBug">
                    <h4><a href="adminLogin.php">Report a Bug?</a></h4>                  
FOOT;

                $footContent .="</footer>\n";
                return $footContent;
                 }

                    function makePageEnd() {
                        return "</div>\n</body>\n</html>";
                    }
                   
?>