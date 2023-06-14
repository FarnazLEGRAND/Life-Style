<?php

namespace App\Enity;

use DateTime;

class Comment
{
	private ?int $id;
	private int $note;
	private string $description;
	private ?DateTime $date;

	public function __construct(int $note, string $description, ?int $id = null, ?DateTime $date = null)
	{
		$this->id = $id;
		$this->note = $note;
		$this->description = $description;
		$this->date = $date;
	}



	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param int|null $id 
	 * @return self
	 */
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNote(): int
	{
		return $this->note;
	}

	/**
	 * @param int $note 
	 * @return self
	 */
	public function setNote(int $note): self
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDate(): ?DateTime
	{
		return $this->date;
	}

	/**
	 * @param DateTime $date 
	 * @return self
	 */
	public function setDate(?DateTime $date): self
	{
		$this->date = $date;
		return $this;
	}
}