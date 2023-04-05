<?php
class modelo{

	public $CNX;

	public $usuario;	//tblusuario
	public $clave;		//tblusuario
	public $idtipo;		//tblusuario y tblpersona 
	/////////////////////////////////
	
	public $apaterno;	//tblpaciente--
	public $amaterno;	//tblpaciente--
	public $nombres;	//tblpaciente--
	public $edad;	//tblpaciente--
	////////////////////////////////////
	public $trasplante; //tbltrasplante

	public function __construct(){
		try {
			$this->CNX = config::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function validarUser($data){
		try {
			$query="SELECT count(*) conta FROM tblusuario WHERE usuario=?";
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->usuario));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function validarPass($data){
		try {
			$query="SELECT count(*) conta FROM tblusuario WHERE clave=?";
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->clave));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function validarUsuario($data){
		try {
			$query="SELECT count(*) conta FROM tblusuario WHERE usuario=? and clave=?";
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->usuario,$data->clave));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarUsuario($data){
		try {
			$query="SELECT u.idusuario,u.usuario,u.clave,p.nombres,p.apaterno,p.amaterno,t.tipo 
					from tblusuario u 
					INNER JOIN tblpersona p on u.idpersona=p.idpersona 
					INNER JOIN tbltipo t on u.idtipo = t.idtipo 
					WHERE u.usuario = ? and u.clave=?";
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->usuario,$data->clave));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarTipo(){ //para USUARIO
		try {
			$query="SELECT * FROM tbltipo"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	//////////////////////////////////////////////////////////////////////////////

	public function listarPaciente(){
		try {
			$query="SELECT pa.idpaciente,t.trasplante,h.historia,pe.apaterno,pe.amaterno,pe.nombres,pe.edad,pr.origen 
            FROM tblpaciente pa 
			LEFT JOIN tblpersona pe ON pa.idpersona = pe.idpersona
            LEFT JOIN tbltrasplante t ON t.idtrasplante = pa.idpaciente  
			LEFT JOIN tblhistoria h ON h.idhistoria = pa.idpaciente
            LEFT JOIN tblprocedencia pr ON pr.idorigen = pa.idorigen";
			
			$stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

			
	public function cargarSexo(){
		try {
			$query="SELECT * FROM tblsexo"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarOrigen(){
		try {
			$query="SELECT * FROM tblprocedencia"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarGrfactor(){
		try {
			$query="SELECT * FROM tblgrfactor"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarTrasplante(){
		try {
			$query="SELECT * FROM tbltrasplante"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarDonante($id){
		try {
			$query="SELECT d.iddonante,td.idtipodonante,d.idgrfactor,d.hla  
			FROM tbldonante d 
			LEFT JOIN tbltipodonante td ON td.idtipodonante=d.idtipodonante 
			LEFT JOIN tblgrfactor g ON g.idgrfactor = d.idgrfactor
			WHERE d.iddonante =?";
           $stmt=$this->CNX->prepare($query);
		   $stmt->execute(array($id));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function cargarTipodonante(){ //para combobox
		try {
			$query="SELECT * FROM tbltipodonante"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function eliminarPaciente($id){
		try {
			$query="DELETE FROM tblpaciente WHERE idpaciente=?"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function registrar(modelo $data){ //Registrar Paciente
		try {

			$query="INSERT INTO tblpersona (apaterno,amaterno,nombres,edad,idsexo) values (?,?,?,?,?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->apaterno,$data->amaterno,$data->nombres,$data->edad,$data->idsexo));
			$last_idpersona = $this->CNX->lastInsertId(); //obtiene el ultimo idpaciente
			
			$query="INSERT INTO tblpaciente (idpersona,idorigen) values (?,?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_idpersona,$data->idorigen));
			$last_id = $this->CNX->lastInsertId(); //obtiene el ultimo idpaciente
			
			$query="INSERT INTO tbltrasplante (idtrasplante) values (?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_id));

			$query="INSERT INTO tblhistoria (idhistoria) values (?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_id));

			$query="INSERT INTO tblhospitalizacion (idpaciente) values (?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_id));

			$query="INSERT INTO tbltratamiento (idpaciente) values (?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_id));
			
			$query="INSERT INTO tbldonante (iddonante) values (?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($last_id));
			
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function validarTrasplante($data){
		try {
			$query="SELECT count(*) conta FROM tblusuario WHERE usuario=?";
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->idpaciente));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function registrarTrasplante(modelo $data){
		try {
			$query="INSERT INTO tbltrasplante (idtrasplante,trasplante) values (?,?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->idpaciente,$data->trasplante));
						
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}
	

	public function cargarPaciente($id){ //ficha formulario
		try {
			$query="SELECT pa.idpaciente,pe.idpersona,pe.apaterno,pe.amaterno,pe.nombres,pe.edad,pe.idsexo,pa.idorigen,
							tr.fechatrasplante,tr.trasplante,og.idorgano,og.organo,hi.historia,hi.antecedentes,hi.diagnostico,
							hi.isquemia,ho.dias,pa.hla,pa.idgrfactor,tto.idtratamiento,tto.medicacion,tto.tratamiento,ev.idevolucion,
							ev.fecha,ev.evolucion,ev.idevotto,co.idcomptto,co.intraoperatorio,co.postoperatorio 
			FROM tblpaciente pa 
			LEFT JOIN tblpersona pe ON pa.idpersona = pe.idpersona 
			LEFT OUTER JOIN tbltrasplante tr ON pa.idpaciente=tr.idtrasplante 
			LEFT JOIN tblorgano og ON tr.idorgano = og.idorgano 
			LEFT OUTER JOIN tblhistoria hi ON pa.idpaciente=hi.idhistoria 
			LEFT JOIN tblhospitalizacion ho ON pa.idpaciente=ho.idpaciente 
			LEFT JOIN tbltratamiento tto ON pa.idpaciente=tto.idpaciente 
			LEFT JOIN tblcomplicaciones co ON tto.idtratamiento=co.idcomptto 
			LEFT JOIN tblevolucion ev ON tto.idtratamiento=ev.idevotto 
			where pa.idpaciente=?"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function listarEvolucion($id){ //ficha formulario tab evolucion
		try {
			$query="SELECT ev.idevolucion,ev.fecha,ev.evolucion,tto.idtratamiento 
			FROM tblevolucion ev 
			LEFT JOIN tbltratamiento tto ON ev.idevotto = tto.idtratamiento 
			where ev.idevotto=?"; 
            $stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
			return $stmt->fetchAll(PDO::FETCH_OBJ);
			//echo json_encode($listarevolucion);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	
	public function actualizarPaciente($data){
		try {
			$query="UPDATE tblpersona SET apaterno=?,amaterno=?,nombres=?,edad=?,idsexo=? 
											WHERE idpersona=?"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->apaterno,$data->amaterno,$data->nombres,$data->edad,$data->idsexo,
									$data->idpersona));
								 
			$query="UPDATE tblpaciente SET idorigen=?,idgrfactor=?,hla=? WHERE idpaciente=?"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->idorigen,$data->idgrfactor,$data->hla,$data->idpaciente));

			if($data->idorgano >0){ // si existe datos en el campo idorgano de la tbltrasplante se actualiza
				$query="UPDATE tblorgano SET organo=? where idorgano=?"; 
				$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->caracteristicas,$data->idorgano));

				$query="UPDATE tbltrasplante SET trasplante=?,fechatrasplante=?,idorgano=? WHERE idtrasplante=?"; 
				$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->trasplante,$data->ftrasplante,$data->idorgano,$data->idpaciente));
				
			}else{ // si esta vacio el campo idorgano en tbltrasplante se inserta el registro 
				$query="INSERT INTO tblorgano (organo) values (?)"; 
          		$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->caracteristicas));
				$last_idorgano = $this->CNX->lastInsertId(); //obtiene el ultimo idorgano

				$query="UPDATE tbltrasplante SET trasplante=?,fechatrasplante=?,idorgano=? WHERE idtrasplante=?"; 
				$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->trasplante,$data->ftrasplante,$last_idorgano,$data->idpaciente));
			}

			$query="UPDATE tblhistoria SET historia=?,antecedentes=?,diagnostico=?,isquemia=? WHERE idhistoria=?"; 
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->historia,$data->antecedentes,$data->diagnostico,$data->isquemia,$data->idpaciente));

			$query="UPDATE tblhospitalizacion SET dias=? WHERE idpaciente=?"; 
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->diashospitalizado,$data->idpaciente));

			$query="UPDATE tbltratamiento SET medicacion=?,tratamiento=? WHERE idpaciente=?"; 
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->medicacion,$data->tratamiento,$data->idpaciente));

			$query="UPDATE tbldonante SET idtipodonante=?,idgrfactor=?,hla=? WHERE iddonante=?"; 
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->idtipodonanted,$data->idgrfactord,$data->hlad,$data->idpaciente));

			if($data->idcomptto >0){ // si existe datos en el campo idcomptto de la tblcomplicaciones se actualiza
				$query="UPDATE tblcomplicaciones SET intraoperatorio=?,postoperatorio=? where idcomptto=?"; 
				$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->intraoperatorio,$data->postoperatorio,$data->idcomptto));
			}else{ // si esta vacio el campo idorgano en tbltrasplante se inserta el registro 
				$query="INSERT INTO tblcomplicaciones (intraoperatorio,postoperatorio,idcomptto) values (?,?,?)"; 
          		$stmt=$this->CNX->prepare($query);
				$stmt->execute(array($data->intraoperatorio,$data->postoperatorio,$data->idtratamiento));
			}
		
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}


	/* public function cargarEvolucion($id){ //para formulario registroevolucion
		try {
			$query="SELECT ev.idevolucion,ev.fecha,ev.evolucion,ev.idevotto,tr.idtratamiento 
			FROM tblevolucion ev 
			INNER JOIN tbltratamiento tr ON ev.idevotto=tr.idtratamiento 
			WHERE ev.idevolucion =?";
           	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	} */

	public function cargarEvolucion($id){ //para formulario registroevolucion
		try {
			$query="SELECT ev.idevolucion,ev.fecha,ev.evolucion,ev.idevotto,tr.idtratamiento,tr.idpaciente 
			FROM tbltratamiento tr 
			INNER JOIN tblevolucion ev ON tr.idtratamiento=ev.idevotto 
			WHERE ev.idevolucion =?";
           	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	/* public function cargarEvolucion($id){ //para formulario registroevolucion
		try {
			$query="SELECT * FROM tblevolucion WHERE idevolucion =?";
           	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($id));
			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	} */


	public function registrarEv(modelo $data){ //Registrar en tblevolucion
		try {

			$query="INSERT INTO tblevolucion (fecha,evolucion,idevotto) values (?,?,?)"; 
          	$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->fechaevolucion,$data->evolucion,$data->idtratamiento));
			
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}

	public function actualizarEv($data){ //Actualizar en tblevolucion
		try {

			$query="UPDATE tblevolucion SET fecha=?,evolucion=?,idevotto=? where idevolucion=?"; 
			$stmt=$this->CNX->prepare($query);
			$stmt->execute(array($data->fechaevolucion,$data->evolucion,$data->idtratamiento,$data->idevolucion));
			
		} catch (Exception $e) {
		   die( $e->getMessage());
		}
	}
	
}

?>