<?php

class Database
{
	private $con;
	private $dbhost = "sql204.epizy.com";
	private $dbuser = "epiz_28453302";
	private $dbpass = "rpMy827Aux";
	private $dbname = "epiz_28453302_taller";


	function __construct()
	{
		$this->connect_db();
	}
	public function connect_db()
	{
		$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if (mysqli_connect_error()) {
			die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
		}
	}


	public function sanitize($var)
	{
		$return = mysqli_real_escape_string($this->con, $var);
		return $return;
	}




	public function create($nombre, $direccion, $telefono, $dui, $licencia, $anio, $Placa2, $Marca, $Modelo, $NumeroDeChasis, $Placa, $Color, $TipoDeVehiculo)
	{


		$sql = "SELECT EXISTS (SELECT * FROM clientes );";
		$res = mysqli_query($this->con, $sql);
		$row = mysqli_fetch_row($res);

		/* $num=1;
		$num = sprintf("%04s",$num);
		$resultado = $nombre[0].$nombre[1].$num.$anio; */



		if ($row[0] == "1") {

			$IdClienteCreado1 =  $this->createID2($nombre, $anio);
			$sql = "INSERT INTO `clientes` (id, nombre, direccion, telefono, dui, licencia) VALUES ('$IdClienteCreado1','$nombre', '$direccion', '$telefono', '$dui', '$licencia')";
			$sql2 = "INSERT INTO `vehiculos` (IdVehiculo, Marca, Modelo, NumeroDeChasis, Placa, Color, TipoDeVehiculo, IdCliente) VALUES ('$Placa2', '$Marca', '$Modelo', '$NumeroDeChasis', '$Placa', '$Color', '$TipoDeVehiculo','$IdClienteCreado1')";
			$res = mysqli_query($this->con, $sql2);
			$res = mysqli_query($this->con, $sql);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			//Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos

			$IdClienteCreado2 =  $this->CrearID($nombre, $anio);
            
			$sql = "INSERT INTO `clientes` (id, nombre, direccion, telefono, dui, licencia) VALUES ('$IdClienteCreado2','$nombre', '$direccion', '$telefono', '$dui', '$licencia')";
			$sql2 = "INSERT INTO `vehiculos` (IdVehiculo, Marca, Modelo, NumeroDeChasis, Placa, Color, TipoDeVehiculo, IdCliente) VALUES ('$Placa2', '$Marca', '$Modelo', '$NumeroDeChasis', '$Placa', '$Color', '$TipoDeVehiculo','$IdClienteCreado2')";


			$res = mysqli_query($this->con, $sql2);
			$res = mysqli_query($this->con, $sql);
			if ($res) {
				return true;
			} else {
				return false;
			}
		}
	}

	function CrearID($nombre, $anio)
	{
		$num = 1;
		$num = sprintf("%04s", $num);
		$resultado = $nombre[0] . $nombre[1] . $num . $anio;
		return $resultado;
	}

	public function createID2($nombre, $anio)
	{
		$sql = "select count(*) from clientes";
		$resulta = mysqli_query($this->con, $sql);
		$row2 = mysqli_fetch_assoc($resulta);
		$nuevoID = implode($row2);
		$nuevoID2 = $nuevoID + 1;
		$numeroID1 = sprintf("%04s", $nuevoID2);
		//$resultado2;
		$resultado2 = $nombre[0] . $nombre[1] . $numeroID1 . $_REQUEST['anio'];
		return $resultado2;
	}

    public function respuestaiD($nombre, $anio)
	{
		$sql = "select count(*) from clientes";
		$resulta = mysqli_query($this->con, $sql);
		$row2 = mysqli_fetch_assoc($resulta);
		$nuevoID = implode($row2);
		$nuevoID2 = $nuevoID;
		$numeroID1 = sprintf("%04s", $nuevoID2);
		//$resultado2;
		$resultado2 = $nombre[0] . $nombre[1] . $numeroID1 . $_REQUEST['anio'];
		return $resultado2;
	}







	public function createv($IdVehiculo, $Marca, $Modelo, $NumeroDeChasis, $Placa, $Color, $TipoDeVehiculo, $IdCliente)
	{
		$sql = "INSERT INTO `vehiculos` (IdVehiculo, Marca, Modelo, NumeroDeChasis, Placa, Color, TipoDeVehiculo, IdCliente) VALUES ('$IdVehiculo', '$Marca', '$Modelo', '$NumeroDeChasis', '$Placa', '$Color', '$TipoDeVehiculo', '$IdCliente')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	//Funcion que envia los datos de la aseguradora a la BD

	public function createaseguradora($nombre, $direccion, $telefono, $asesor)
	{
		$idASES = $this->IDASE($nombre, $asesor);
		$sql = "INSERT INTO `aseguradoras` (idAseguradora, nombre, direccion, telefono, asesor) VALUES ('$idASES','$nombre', '$direccion', '$telefono', '$asesor')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function IDASE($nombre, $asesor)
	{
		$sql = "select count(*) from aseguradoras";
		$resulta = mysqli_query($this->con, $sql);
		$row2 = mysqli_fetch_assoc($resulta);
		$nuevoID = implode($row2);
		$nuevoID2 = $nuevoID + 1;
		$numeroID1 = sprintf("%04s", $nuevoID2);
		//$resultado2;
		$resultado2 = $nombre[0] . $asesor[0] . $numeroID1 . date("Y");
		return $resultado2;
	}


   



	//Mostrar registros index
	public function read()
	{
		$sql = "SELECT * FROM clientes";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function readEstado($nombre)
	{
		$respuesta = strval($nombre);
		$sql = "SELECT * FROM clientes where id = '$respuesta'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}


	public function createempleados($nombre, $telefono, $nit, $dui, $competencias)
	{
		$idmecanico = $this->CrearIDMECA($nombre, $competencias);
		$sql = "INSERT INTO `empleados`(`idempleados`, `nombre`, `telefono`, `nit`, `dui`, `competencias`) VALUES ('$idmecanico','$nombre', '$telefono', '$nit', '$dui', '$competencias')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function single_record($id)
	{
		$sql = "SELECT * FROM clientes where id='$id'";

		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function update($nombre, $direccion, $telefono, $dui, $licencia, $id)
	{

		$sql = "UPDATE clientes SET nombre='$nombre', direccion='$direccion', telefono='$telefono', dui='$dui', licencia='$licencia' WHERE id='$id'";

		$res = mysqli_query($this->con, $sql);

		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function readvehiculo()
	{
		$sql = "SELECT * FROM vehiculos";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function single_recordvehiculo($id)
	{
		$sql = "SELECT * FROM vehiculos where IdCliente='$id'";

		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function updatevehiculo($marca, $modelo, $chasis, $placa, $color, $tipovehiculo, $id)
	{

		$sql = "UPDATE vehiculos SET Marca='$marca', Modelo='$modelo', NumeroDeChasis='$chasis', Placa='$placa', Color='$color', TipoDeVehiculo='$tipovehiculo' WHERE IdCliente='$id'";

		$res = mysqli_query($this->con, $sql);

		if ($res) {
			return true;
		} else {
			return false;
		}
	}




	public function CrearIDDIAG2($IdVehiculo, $IdMecanico)
	{
		$sql = "select count(*) from diagnostico";
		$resulta = mysqli_query($this->con, $sql);
		$row2 = mysqli_fetch_assoc($resulta);
		$nuevoID = implode($row2);
		$nuevoID2 = $nuevoID + 1;
		$numeroID1 = sprintf("%04s", $nuevoID2);
		//$resultado2;
		$resultado2 = $IdVehiculo[0] . $IdMecanico[0] . $numeroID1 . date("Y");
		return $resultado2;
	}
    
	public function CrearIDMECA($IdVehiculo, $IdMecanico)
	{
		$sql = "select count(*) from empleados";
		$resulta = mysqli_query($this->con, $sql);
		$row2 = mysqli_fetch_assoc($resulta);
		$nuevoID = implode($row2);
		$nuevoID2 = $nuevoID + 1;
		$numeroID1 = sprintf("%04s", $nuevoID2);
		//$resultado2;
		$resultado2 = $IdVehiculo[0] . $IdMecanico[0] . $numeroID1 . date("Y");
		return $resultado2;
	}

	public function insertDiagnostico($IdVehiculo, $IdMecanico, $Falla)
	{

		$idDiagnostico = $this->CrearIDDIAG2($IdVehiculo, $IdMecanico);

		$sql = "INSERT INTO `diagnostico`(`idDiagonostico`,`idVehiculo`, `idMecanico`, `Falla`) VALUES ('$idDiagnostico','$IdVehiculo', '$IdMecanico', '$Falla')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function readmecanicos()
	{
		$sql = "SELECT * FROM empleados";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}


	public function eliminaVehiculo(){
		if ($_REQUEST['delete']) {
			
			$pid = $_REQUEST['delete'];
			$query = "DELETE FROM pagos_pagina WHERE id=:pid";
			mysqli_query($this->con, $query);
			header("Location: listadovehiculo.php");
			
		}
	}

	
public function readaseguradora(){
	$sql = "SELECT * FROM aseguradoras";
	$res = mysqli_query($this->con, $sql);
	return $res;
	}

public function single_recordaseguradora($id){
		$sql = "SELECT * FROM aseguradoras where idAseguradora='$id'";
		
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return ;
		}
		
public function updateaseguradora($id, $nombre, $direccion, $telefono,$asesor){
			
		$sql = "UPDATE aseguradoras SET nombre='$nombre', direccion='$direccion', telefono='$telefono', asesor='$asesor' WHERE idAseguradora ='$id'";
					
		$res = mysqli_query($this->con, $sql);
		
		if($res){
			return true;
			}else{
		return false;
	}

				}	


}
?>