<?php

namespace Ruben\Imagenes\models;

use Ruben\Imagenes\db\Database;
use PDO;

class Galeria extends Database {

	private string $uuid;
    
	function __construct(private string $name, private string $details, private string $location){
		parent::__construct();

		$this->uuid = uniqid();
	}

	public function save(){
		$query = $this->conn()->prepare("INSERT INTO imagenes(uuid, name, details, location, updated) VALUES (:uuid, :name, :details, :location, NOW())");
		$query->execute(['name' => $this->name, 'uuid' => $this->uuid, 'details' => $this->details, 'location' => $this->location]);
	}

	public static function getAll(){
		$galeria = [];
		$db = new Database();
		$query = $db->conn()->query('SELECT * FROM imagenes');
		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
		    $imagen = Galeria::createFromArray($res);
		    array_push($galeria, $imagen);
		}
		return $galeria;
	}

	public static function get($uuid) {
		$db = new Database();
		$query = $db->conn()->prepare("SELECT * FROM imagenes WHERE uuid = :uuid");
		$query->execute(['uuid' => $uuid]);

		$galeria = Galeria::createFromArray($query->fetch(PDO::FETCH_ASSOC));

		return $galeria;
	}

	public function update(){
		$query = $this->conn()->prepare('UPDATE imagenes SET name = :name, details = :details, location = :location, updated = NOW() WHERE uuid = :uuid');
		$query->execute(['uuid' => $this->uuid,'name' => $this->name, 'details' => $this->details, 'location' => $this->location]);
	}

	public static function createFromArray($arr):Galeria{
		$imagen = new Galeria($arr['name'], $arr['details'], $arr['location']);
		$imagen->setUUID($arr['uuid']);
		return $imagen;
	}

	public function getUUID() :string{
		return $this->uuid;
	}
	public function setUUID($value){
		$this->uuid = $value;
	}

	public function getName() :string{
		return $this->name;
	}

	public function setName($value){
		$this->name = $value;
	}

	public function getDetails() :string{
		return $this->details;
	}

	public function setDetails($value){
		$this->details = $value;
	}

	public function getLocation() :string{
		return $this->location;
	}

	public function setLocation($value){
		$this->location = $value;
	}
}

?>