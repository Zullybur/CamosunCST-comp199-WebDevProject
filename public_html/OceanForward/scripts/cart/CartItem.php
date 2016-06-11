<?php
class CartItem {
	private $customerID;
	private $brandName;
	private $customerName;
	private $modelNumber;
	private $modelName;
	private $price;
	private $quantity;
	
	public function __construct($customerID = "no custID", $brandName = "no brand",
								$customerName = "no custName", $modelNumber = "no modelNum",
								$modelName = "no modelName", $price = "no price",
								$quantity = "no quantity")
	{
		$this->$customerID = $customerID;
		$this->brandName = $brandName;
		$this->$customerName = $customerName;
		$this->$modelNumber = $modelNumber;
		$this->$modelName = $modelName;
		$this->$price = $price;
		$this->$quantity = $quantity;
	}
	
	public function __toString() {
		return "[customerID=\"$this->$customerID\", ".
			   "brandName=\"$this->$brandName\", ".
			   "customerName=\"$this->$customerName\", ".
			   "modelNumber=\"$this->$modelNumber\", ".
			   "modelName=\"$this->modelName\", ".
			   "price=\"$this->price\", ".
			   "quantity=\"$this->quantity\"]";
	}
	
	public function getCustomerID() {
		return $this->customerID;
	}

	public function setCustomerID($customerID) {
		$this->customerID = $customerID;
		return true;
	}

	public function getBrandName() {
		return $this->brandName;
	}

	public function setBrandName($brandName) {
		$this->brandName = $brandName;
		return true;
	}

	public function getCustomerName() {
		return $this->customerName;
	}

	public function setCustomerName($customerName) {
		$this->customerName = $customerName;
		return true;
	}

	public function getModelNumber() {
		return $this->modelNumber;
	}

	public function setModelNumber($modelNumber) {
		$this->modelNumber = $modelNumber;
		return true;
	}

	public function getModelName() {
		return $this->modelName;
	}
	
	public function setModelName($modelName) {
		$this->modelName = $modelName;
		return true;
	}
	
	public function getPrice() {
		return $this->price;
	}
	
	public function setPrice($price) {
		$this->price = $price;
		return true;
	}
	
	public function getQuantity() {
		return $this->quantity;
	}
	
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return true;
	}
}