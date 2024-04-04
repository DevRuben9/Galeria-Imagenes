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
		return $galaria;
	}

	public static function createFromArray($arr):Galeria{
		$imagen = new Galeria($arr['name'], $arr['detalles'], $arr['location']);
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

	public function setName($avlue){
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