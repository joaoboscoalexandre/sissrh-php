<?php

    class Painel {

		public static function loadJS($files, $page){
			$url = explode('/',@$_GET['url'])[0];
			if($page == $url){
				foreach($files as $key => $value){
					echo '<script src="'.INCLUDE_PATH.'assets/js/'.$value.'"></script>';
				}
			}
		}


		public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

		
		public static function loggout(){
			setcookie('lembrar','true',time()-1,'/');
			session_destroy();
			header('Location: '.INCLUDE_PATH);
		}


		public static function updateUsiarioOnline(){

			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = PgSql::conectar()->prepare("UPDATE sissrh.tbadmin_online SET ultimo_acesso = ? WHERE token = ? ");
				$sql->execute(array($horarioAtual,$token));
			} else {
				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbadmin_online (ip,ultimo_acesso,token) VALUES (?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}			
		}


		public static function listarUsuariosOnLine(){
			self::limparUsuariosOnLine();
			$sql = PgSql::conectar()->prepare("SELEC * FROM sissrh.tbadmin_online");
			$sql->execute();
			return $sql->fetchAll();
		}

		
		public static function limparUsuariosOnLine(){
			$date = date('Y-m-d H:i:s');
			$sql = PgSql::conectar()->prepare("DELETE FROM sissrh.tbadmin_online WHERE ultimo_acesso < '$date' ");

		}


		public static function alert($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <nav class="d-flex justify-content-center">'.$mensagem.'</nav>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              	</div>';
			} elseif ($tipo == 'erro'){
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <nav class="d-flex justify-content-center">'.$mensagem.'</nav>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              	</div>';
			}
		}


		public static function imagemValida($imagem){
			if($imagem['type'] == 'imagem/jpeg' || $imagem['type'] == 'imagem/jpg' || $imagem['type'] == 'imagem/png'){
				$tamanho = intval($imagem['size']/1024);
				if($tamanho < 300) return true;
				else return false;
			}else {
				return false;
			}
		}


		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],INCLUDE_PATH.'uploads/'.$imagemNome))
			return $imagemNome;
			else
			return false;
		}


		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}


		public static function carregarPagina(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists($url[0].'.php')){
					include($url[0].'.php');
				} else {
					//Página não existe!
					header('Location: '.INCLUDE_PATH);
					die();
				}
			} else {
				include('principal.php');
			}
	    }

		// $arr = ['nome_genero'=>$nomeGenero,'data_cadastro_genero'=>date('Y-m-d'),'slug'=>$slug,'nome_tabela'=>'tb_biblioteca_genero'];
		public static function insert($arr){
			$certo = true;
			$nome_tabela = $arr['nome_tabela'];
			$query = "INSERT INTO $nome_tabela VALUES (";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				$query.="?,";
				$parametros[] = $value;
			}
			$query.=")";
			if($certo == true){
				$sql = PgSql::conectar()->prepare($query);
				$sql->execute($parametros);
			}
			return $certo;
		}

		//Selecionar somente um registro
		public static function select($table,$query = '',$arr = ''){
			if($query != false){
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			} else {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` ");
				$sql->execute();
			}
			return $sql->fetch();
		}

		//funçao genérica para selecionar vários registros
		public static function selectAll($table,$start = null,$end = null){
			if($start == null && $end == null){
				$sql = PgSql::conectar()->prepare("SELECT * FROM `$table`");
			} else {
				$sql = PgSql::conectar()->prepare("SELECT * FROM `$table` LIMIT $start, $end");
			}
			$sql->execute();
			return $sql->fetchAll();
		}

		//Função genérica para update
		public static function update($arr,$single = false){
			$certo = true;
			$first = false;
			$nome_tabela = $arr['nome_tabela'];

			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				
				if($first == false){
					$first = true;
					$query.="$nome=?";
				}
				else{
					$query.=",$nome=?";
				}

				$parametros[] = $value;
			}

			if($certo == true){
				if($single == false){
					$parametros[] = $arr['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE id=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}

		public static function deletar($tabela,$id=false){
			if($id == false){
				$sql = PgSql::conectar()->prepare("DELET FROM '$tabela' ");
			} else {
				$sql = PgSql::conectar()->prepare("DELET FROM '$tabela' WHERE id = $id");
			}
			$sql->execute();
		}


		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}


		public static function usuarioOnLine() {
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$dataHora = date('Y-m-d H:i:s');
				$check = PgSql::conectar()->prepare(" SELECT cod_online FROM sissrh.tbadmin_online WHERE token = ? ");
				$check->execute(array($_SESSION['online']));
				
				if($check->rowCount() == 1){
					$sql = PgSql::conectar()->prepare(" UPDATE sissrh.tbadmin_online SET ultimo_acesso = ? WHERE token = ?");
					$sql->execute(array($dataHora,$token));
				}else {
					$ip = $_SERVER['REMOTE_ADDR'];
					$token = $_SESSION['online'];
					$dataHora = date('Y-m-d H:i:s');
					$sql = PgSql::conectar()->prepare(" INSERT INTO sissrh.tbadmin_online VALUES (?,?,?) ");
					$sql->execute(array($ip,$dataHora,$token));	
				}
			} else {
				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$dataHora = date('Y-m-d H:i:s');
				$sql = PgSql::conectar()->prepare(" INSERT INTO sissrh.tbadmin_online VALUES (?,?,?) ");
				$sql->execute(array($ip,$dataHora,$token));	

			}
		}

}

?>