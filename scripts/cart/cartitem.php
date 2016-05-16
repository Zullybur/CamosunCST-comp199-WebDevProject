<?php

class CartItem {
	private $customerID;
	private $customerName;
	private $modelNumber;
	private $modelName;
	private $price;
	private $quantity;
	
	public function __construct($customerID = "no custID", $customerName = "no custName",
		$modelNumber = "no modelNum", $modelName = "no modelName",
		$price = "no price", $quantity = "no quantity")
	{
		$this->$customerID = $customerID;
		$this->$customerName = $customerName;
		$this->$modelNumber = $modelNumber;
		$this->$modelName = $modelName;
		$this->$price = $price;
		$this->$quantity = $quantity;
	}
	
	public function __toString() {
		return "[customerID=\"$this->$customerID\", customerName=\"$this->$customerName\", modelNumber=\"$this->$modelNumber\", modelName=\"$this->modelName\", price=\"$this->price\", quantity=\"$this->quantity\"]";
	}
	
	public function getCustomerID() {
		return $this->model;
	}

	public function setCustomerID($model) {
		$this->model = $model;
		return true;
	}

	public function getCustomerName() {
		return $this->model;
	}

	public function setCustomerName($model) {
		$this->model = $model;
		return true;
	}

	public function getModelNumber() {
		return $this->model;
	}

	public function setModelNumber($model) {
		$this->model = $model;
		return true;
	}

	public function getModelName() {
		return $this->model;
	}
	
	public function setModelName($model) {
		$this->model = $model;
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