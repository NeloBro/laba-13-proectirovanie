<?php 

interface iProduct 
{
	function displayName();
	function displayPrice();
	function displayRating();
}

interface iUser 
{
	function displayLogin();
	function displayPassword();
}

class product implements iProduct 
{
	public $name;
	public $price;
	public $rating;

	function __construct($name,$price,$rating) {
		$this->name = $name;
		$this->price = $price;
		$this->rating = $rating;
	}

	function displayName() {
		echo "Имя: ".$this->name."<br>";
	}

	function displayPrice() {
		echo "Цена: ".$this->price."<br>";
	}

	function displayRating() {
		echo "Имя: ".$this->rating."<br>";
	}
}

class cpu extends product implements iProduct 
{
	public $coreAmount;

	function __construct($name,$price,$rating,$coreAmount) {
		parent::__construct($name,$price,$rating);
		$this->coreAmount = $coreAmount;
	}

	function displayCoreAmount() {
		echo "Количество ядер: ".$this->coreAmount."<br>";
	}

}

class gpu extends product implements iProduct 
{
	public $vram;

	function __construct($name,$price,$rating,$vram) {
		parent::__construct($name,$price,$rating);
		$this->vram = $vram;
	}

	function displayVram() {
		echo "Количество VRAM: ".$this->vram."<br>";
	}

}

class smartphone extends product implements iProduct 
{
	public $memory;

	function __construct($name,$price,$rating,$memory) {
		parent::__construct($name,$price,$rating);
		$this->memory = $memory;
	}

	function displayMemory() {
		echo "Количество  памяти: ".$this->memory."<br>";
	}

}

class user implements iUser 
{
	public $login;
	public $password;

	function __construct($login,$password) {
		$this->login = $login;
		$this->password = $password;
	}

	function displayLogin() {
		echo "Логин: ".$this->login."<br>";  
	}

	function displayPassword() {
		echo "Пароль: ".$this->password."<br>";  
	}
}

class unregisteredUser extends user implements iUser 
{
	public $sessionTime;

	function __construct($login,$password,$sessionTime) {
		parent::__construct($login,$password);
		$this->sessionTime = $sessionTime;
	}

	function displaySessionTime() {
		echo "Время сессии: ".$this->sessionTime."<br>";
	}

}

class registeredUser extends user implements iUser 
{
	public $rang;

	function __construct($login,$password,$rang) {
		parent::__construct($login,$password);
		$this->rang = $rang;
	}

	function displayRang() {
		echo "Ранг: ".$this->rang."<br>";
	}

}

class admin extends user implements iUser 
{
	public $createdPagesAmount;

	function __construct($login,$password,$createdPagesAmount) {
		parent::__construct($login,$password);
		$this->createdPagesAmount = $createdPagesAmount;
	}

	function displayCreatedPagesAmount() {
		echo "Количество созданных страниц: ".$this->createdPagesAmount."<br>";
	}

}

class order implements iProduct,iUser 
{
	public $login;
	public $password;
	public $name;
	public $price;
	public $rating;

	function __construct($login,$password,$name,$price,$rating) {
		$this->login = $login;
		$this->password = $password;
		$this->name = $name;
		$this->price = $price;
		$this->rating = $rating;
	}

	function displayLogin() {
		echo "Логин: ".$this->login."<br>";  
	}

	function displayPassword() {
		echo "Логин: ".$this->password."<br>";  
	}

	function displayName() {
		echo "Имя: ".$this->name."<br>";
	}

	function displayPrice() {
		echo "Цена: ".$this->price."<br>";
	}

	function displayRating() {
		echo "Имя: ".$this->rating."<br>";
	}

	function displayOrder() {
		echo "Пользователь с логином ".$this->login." и паролем ".$this->password." заказал ".$this->name." с рейтингом ".$this->rating." по цене ".$this->price;
	}
}

echo "Товар 1 <br>";
$cpu = new cpu($_POST['cpuName'],$_POST['cpuPrice'],$_POST['cpuRating'],$_POST['coreAmount']);
$cpu->displayName();
$cpu->displayPrice();
$cpu->displayRating();
$cpu->displayCoreAmount();
echo "<br>";

echo "Товар 2 <br>";
$gpu = new gpu($_POST['gpuName'],$_POST['gpuPrice'],$_POST['gpuRating'],$_POST['vram']);
$gpu->displayName();
$gpu->displayPrice();
$gpu->displayRating();
$gpu->displayVram();
echo "<br>";

echo "Товар 3 <br>";
$smartphone = new smartphone($_POST['pName'],$_POST['pPrice'],$_POST['pRating'],$_POST['memory']);
$smartphone->displayName();
$smartphone->displayPrice();
$smartphone->displayRating();
$smartphone->displayMemory();
echo "<br><br>";

echo "Пользователь 1 <br>";
$unregUser = new unregisteredUser($_POST['unregLogin'],$_POST['unregPassword'],$_POST['sessionTime']);
$unregUser->displayLogin();
$unregUser->displayPassword();
$unregUser->displaySessionTime();
echo "<br>";

echo "Пользователь 2 <br>";
$regUser = new registeredUser($_POST['regLogin'],$_POST['regPassword'],$_POST['rang']);
$regUser->displayLogin();
$regUser->displayPassword();
$regUser->displayRang();
echo "<br>";

echo "Пользователь 3 <br>";
$admin = new admin($_POST['adminLogin'],$_POST['adminPassword'],$_POST['createdPagesAmount']);
$admin->displayLogin();
$admin->displayPassword();
$admin->displayCreatedPagesAmount();
echo "<br><br>";

echo "Заказ <br>";
$order = new order($_POST['oLogin'],$_POST['oPassword'],$_POST['oName'],$_POST['oPrice'],$_POST['oRating']);
$order->displayOrder();

?>