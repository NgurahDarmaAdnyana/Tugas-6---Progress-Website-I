<?php
$con->auth();
$conn=$con-> koneksi();
switch(@$_GET['page']){
	case'add':
		$sql="select*from tb_daftar_pegawai";
		$jasa=$conn->query($sql);
		$content="views/joki/tambah.php";
		include_once 'views/template.php';
	break;
	
	case'save':
		if($_SERVER['REQUEST_METHOD']=="POST"){
			if(empty($_POST['id'])){
                $err['id']="Id wajib diisi";
            }
			if(empty($_POST['nama'])){
                $err['nama']="Nama wajib diisi";
            }
			if(empty($_POST['jasa'])){
                $err['jasa']="Jasa wajib diisi";
            }
		if(!isset($err)){
				$id=$_SESSION['login']['id'];
					
					if(isset($_POST['edit'])){
					$id=$_POST['id'];
					$nama=$_POST['nama'];
					$jasa=$_POST['jasa'];

					// update user data
					$sql = "UPDATE tb_daftar_pegawai SET nama='$_POST[nama]', jasa='$_POST[jasa]' WHERE md5(id)='$_POST[id]'";

					}else{
						//save 
						$sql ="INSERT INTO tb_daftar_pegawai (id,nama,jasa) VALUES('$_POST[id]','$_POST[nama]','$_POST[jasa]')";
					}
					if($conn->query($sql)==TRUE){
						header('Location:'.$con->site_url().'/admin/index.php?mod=joki');
					}else{
					$err['msg']="Error: " . $sql . "<br>" . $conn->error;
					}
		}
		}else{
			$err['msg']="tidak diijinkan";
		}
		if(isset($err)){
			$sql="select*from tb_daftar_pegawai";
			$jasa=$conn->query($sql);
			$content="views/joki/tambah.php";
			include_once 'views/template.php';
		}
		break;
		
		case'edit':
			$sql="select*from tb_daftar_pegawai where md5(id)='$_GET[id]'";
			$jasa=$conn->query($sql);
			$_POST=$jasa->fetch_assoc();
			
			$content="views/joki/tambah.php";
			include_once 'views/template.php';
		break;
			
		case'delete':
			$sql="delete from tb_daftar_pegawai where md5(id)='$_GET[id]'";
			$jasa=$conn->query($sql);
			header('Location:'.$con->site_url().'/admin/index.php?mod=joki');
		break;
	default:
		$daftar_pegawai="select * from tb_daftar_pegawai";
		$daftar_pegawai=$conn->query($daftar_pegawai);
		$conn->close();
		$content="views/joki/tampil.php";
		include_once 'views/template.php';

}
?>	