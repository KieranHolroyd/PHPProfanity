<?php

// PHPProfanity Filter
// Authors: Kieran Holroyd, DevChad

class PHPProfanity {
    private $filtered_words = [];

    public function __construct() {
        $this->buildFilter();
    }

    private function buildFilter() {
        $words = file_get_contents("./words.txt");
        if(trim($words) != "") {
            $this->filtered_words = explode("\n", trim($words));
        } else {
            throw new Exception("words.txt file is empty, follow documentation");
        }
    }

    public function detect($string) {
        $string = strtolower($string);
        $string = str_replace(' ','',$string);
        foreach($this->filtered_words as $check) {
            if(strpos($string, $check) !== false) {
                return true;
            }
        }
        return false;
    }

    public function censor($string) {
        $string = strtolower($string);
        foreach($this->filtered_words as $check) {
            $strlen = strlen($check);
            $string = str_replace($check, $this->generateCensorString($strlen), $string);
        }
        return $string;
    }

    public function generateCensorString($length) {
        $string = "";
        for($i = 0; $i < $length; $i++) {
            $string .= "*";
        }
        return $string;
    }
}
