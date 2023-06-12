<?php

namespace App\Enity;
class Category{
    private ?int $id;
    private string $lable;

    public function __construct(string $lable ,?int $id = null){
        $this->id = $id;
        $this->lable = $lable;
    }
    


	/**
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param int|null $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getLable(): string {
		return $this->lable;
	}
	
	/**
	 * @param string $lable 
	 * @return self
	 */
	public function setLable(string $lable): self {
		$this->lable = $lable;
		return $this;
	}
}