<?php

// Uključivanje Composer autoloadera
require 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Definisanje klase
class Car {
    // Definisanje svojstava (properties)
    public $brand;
    public $model;
    public $year;

    // Konstruktor klase
    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    // Metod za prikaz informacija o automobilu
    public function getInfo() {
        return "Brand: " . $this->brand . "\n" .
               "Model: " . $this->model . "\n" .
               "Year: " . $this->year . "\n";
    }
}

// Kreiranje instance objekta klase Car
$car1 = new Car("Toyota", "Laguna", 2018);

// Kreiranje instance PhpWord
$phpWord = new PhpWord();

// Dodavanje teksta u dokument
$section = $phpWord->addSection();
$section->addText($car1->getInfo());

// Čuvanje Word dokumenta
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('car_info.docx');

echo "Word dokument je uspešno kreiran!";

