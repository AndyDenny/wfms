<?php

class File{
    public $fp;
    public $file;
    
    public function __construct($file){
        $this->file = $file;
        if(!is_writable($this->file)){
            echo 'file {$this->file} not available for record';
        }

        $this->fp = fopen($this->file, 'a');
    }

    public function __destruct(){
        fclose($this->fp);
    }

    public function write($string){
            if(fwrite($this->fp, $string . PHP_EOL) === FALSE){
                echo 'File {$this->fp} not writable';
                exit(); 
            }
    }

}