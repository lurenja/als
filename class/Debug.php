<?php
class Debug{
    private $debug_dir = "debug.txt";
    function logTxt($txt){
        $myfile = fopen($this->debug_dir, "a");
        fwrite($myfile, date('Y-m-d H:i:s')."\t");
        fwrite($myfile, $txt."\n");
        fclose($myfile);
    }
    function logArray($array){
        $myfile = fopen($this->debug_dir, "a");
        fwrite($myfile, date('Y-m-d H:i:s')."\t");
        foreach($array as $key=>$value){
            if(is_array($value)){
                fwrite($myfile, $key." => ");
                $this->logArray($value);
            }else{
                fwrite($myfile, $key." => ".$value.",");
            }
        }
        fwrite($myfile, "\n");
        fclose($myfile);
    }

    function logKeyValue($array){
        $myfile = fopen($this->debug_dir, "a");
        fwrite($myfile, date('Y-m-d H:i:s')."\t");
        if(count($array) > 0){
            foreach($array as $key=>$value){
                fwrite($myfile, $key."=>".$value.",");
            }
        }
        fwrite($myfile, "\n");
        fclose($myfile);
    }
}
?>