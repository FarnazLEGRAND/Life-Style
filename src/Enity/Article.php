<?php

namespace App\Enity;
use DateTime;

class Article
{
    private ?int $id;
    private string $titre;
	private  string $picname;
    private string $contenu;
    private string $author;
    private ?DateTime $datepub;
	

    public function __construct(string $titre,string $picname,string $contenuu, string $author, ?int $id = null, ?DateTime $datepub =null)
    {
        $this->id = $id;
        $this->titre = $titre;
		$this->picname=$picname;
        $this->contenu = $contenuu;
        $this->author = $author;
        $this->datepub = $datepub;

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
	public function getTitre(): string {
		return $this->titre;
	}
	
	
	/**
	 * @param string $titre 
	 * @return self
	 */
	public function setTitre(string $titre): self {
		$this->titre = $titre;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getContenu(): string {
		return $this->contenu;
	}
	
	/**
	 * @param string $contenu 
	 * @return self
	 */
	public function setContenu(string $contenu): self {
		$this->contenu = $contenu;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getAuthor(): string {
		return $this->author;
	}
	
	/**
	 * @param string $author 
	 * @return self
	 */
	public function setAuthor(string $author): self {
		$this->author = $author;
		return $this;
	}
	
	/**
	 * @return DateTime
	 */
	public function getDatepub(): ?DateTime {
		return $this->datepub;
	}
	
	/**
	 * @param DateTime $datepub 
	 * @return self
	 */
	public function setDatepub(?DateTime $datepub): self {
		$this->datepub = $datepub;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPicname(): string {
		return $this->picname;
	}
	
	/**
	 * @param string $picname 
	 * @return self
	 */
	public function setPicname(string $picname): self {
		$this->picname = $picname;
		return $this;
	}
}