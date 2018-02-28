<?php
class ShopProduct{
    //定义私有的属性
    private $title;
    private $producterMainName;
    private $producterFirstName;
    private $price;
    private $$discount=0;

    //定义构造函数
    public function __construct($title,$firstName,$mainName,$price){
        $this->title=$title;
        $this->producterFirstName=$firstName;
        $this->producterMainName=$mainName;
        $this->price=$price;
    }

    //定义对私有属性进行访问的方法
    public function getProducterFirstName(){
        return $this->producterFirstName;
    }
    public function getProducterMainName(){
        return $this->producterMainName;
    }
    public function getDiscount(){
        return $this->discount;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getPrice(){
        return ($this->price-$this->discount);
    }

    //定义对私有属性进行操作的方法
    public function setDiscount($num){
        $this->discount=$num;
    }

    //定义类中的一般方法
    public function getProducer(){
        return "{$this->producterFirstName}"."{$this->producterMainName}";
    }
    public function getSummaryLine(){
        $base="{$this->title}({$this->producterMainName},";
        $base.="{$this->producterFirstName})";
        return $base;
    }
}
?>
<?php
require_once("phpClassShopProduct.php");
class BookProduct extends ShopProduct{
    //定义子类特有的私有属性
    private $numPages=0;

    //定义构造函数
    public function __construct($title,$firstName,$mainName,$price,$numPages){
        parent::__construct($title,$firstName,$mainName,$price);
        $this->numPages=$numPages;
    }

    //定义子类的特有方法
    public function getNumOfPages(){
        return $this->numPages;
    }
    public function getPrice(){
        return $this->price;
    }

    //覆写父类已有的方法
    public function getSummaryLine(){
        $base=parent::getSummaryLine();
        $base.=":page count-{$this->numPages}";
        return $base;
    }
}
?>
