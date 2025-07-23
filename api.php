<?php
    header('Content-Type: application/json');
    $arquivoJson = "./movies.json";

    if(!file_exists($arquivoJson)){
        echo json_encode(array("status" =>"404"));
    }else{
        $dadosfilmes = json_decode(file_get_contents($arquivoJson),true);
    
        $nome= "";
        $generos=[];
        if(isset($_GET["nome"])){
            $nome = $_GET["nome"];
        }

        if(isset($_GET["generos"])){
            $generos = $_GET["generos"];
        }

        $filmesFiltrados = [];
        if($nome != "" || $generos){

            if($nome !=""){
                for($i=0;$i<count($dadosfilmes);$i++){
                    if(stripos($dadosfilmes[$i]["name"],$nome) !==false){
                        $filmesFiltrados[]= $dadosfilmes[$i];
                    }
                }
            }
            
            if($generos){
                for($i=0;$i<count($dadosfilmes);$i++){
                    for($j=0;$j<count($generos);$j++){
                        if(in_array($generos[$j],$dadosfilmes[$i]["genres"])){
                            if(in_array($dadosfilmes[$i],$filmesFiltrados) == false){
                                $filmesFiltrados[]= $dadosfilmes[$i];
                            }
                        }
                    }
                }
            }
            
            echo json_encode($filmesFiltrados);
            
        }else{
            echo json_encode($dadosfilmes);
        }
    }

    
        
    
