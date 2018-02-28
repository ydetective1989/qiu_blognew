<?php
class ShopProduct{
    //定义私有的属性
    private $title;
    private $producterMainName;
    private $producterFirstName;
    private $price;
    private $discount=0;

    //定义构造函数
    public function __construct($title,$firstName,$mainName,$price,$discount){
        $this->title=$title;
        $this->producterFirstName=$firstName;
        $this->producterMainName=$mainName;
        $this->price=$price;
        $this->discount=$discount;
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
if($_POST){
  $title=$_POST['title'];
  $firstName=$_POST['firstName'];
  $mainName=$_POST['mainName'];
  $price=$_POST['price'];
  $discount=$_POST['discount'];

  $ShopProduct = new ShopProduct($title,$firstName,$mainName,$price,$discount);
  $name=$ShopProduct->getPrice();
  echo $name;
}else{
?>
<form action="" method="post" >
<input type="text" name="title">
<input type="text" name="firstName">
<input type="text" name="mainName">
<input type="text" name="price">
<input type="text" name="discount">
<input type="submit" value="发送" >
</form>
<?php
}?>
