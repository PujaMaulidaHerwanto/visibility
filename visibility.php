<?php


class makanan {

    public $nama,
            $jenis,
            $rasa;

    protected $diskon = 0;

    private $harga;

    public function getLabel(){
        return " $this->jenis, $this->rasa ";
    }
    public function __construct($nama = "Tiramisu" , $jenis = "Kue" , $rasa = "Kopi" , $harga = 25000){
        $this->nama = $nama; 
        $this->jenis = $jenis;
        $this->rasa = $rasa;
        $this->harga = $harga;
    }

    public function getInfoProduk(){

        $str = " {$this->nama} | {$this->getLabel()}, Rp. {$this->harga}";
        return $str;
        
    }
     public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }


} 

class Food extends makanan{
    public $slc;

    public function __construct( $nama = "Tiramisu" , $jenis = "Kue" , $rasa = "Kopi" , $harga = 25000, $slc = 0 ){

        parent :: __construct($nama , $jenis , $rasa , $harga );
        $this->slc = $slc;

    }

    public function getInfoProduk(){
        $str = "Food : " . parent::getInfoproduk() . " - {$this->slc} Slice.";
        return $str;
    }
}

class Beverage extends makanan {
    public $cup;

    public function __construct( $nama = "Tiramisu" , $jenis = "Kue" , $rasa = "Kopi" , $harga = 25000, $cup = 0 ){
        
        parent :: __construct($nama , $jenis , $rasa , $harga);
        $this->cup = $cup;
    }

    public function setDiskon( $diskon ){
        $this->diskon = $diskon;
    }

    public function getInfoProduk(){
       $str = "Beverage : " . parent::getInfoProduk() . " - {$this->cup} Cup.";
        return $str;
    }
}



class info {
    public function infoproduk( makanan $makanan ){
        $str = "{$makanan->nama} | {$makanan->getLabel()}, Rp. {$makanan->harga}";
        return $str;
    }

}

$produk1 = new Food("Black Choco Almond","Donut","Chocolate",5000, 50);
$produk2 = new Beverage("Iced Americano","Coffee","Coffee",30000, 100);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();

?>
