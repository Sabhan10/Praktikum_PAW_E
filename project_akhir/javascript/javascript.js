<script>
 	/*function untuk delete method, dijalankan ketika button delete diclick, maka akan menampilkan javascript confirm(),
 	maka akan menuju file 'deleteCustomer.php' dan membawa nilai dari id customer dan username admin*/
 	function deleteMethod(idCustomer, username_admin){
 		if(confirm("Yakin ingin menghapus akun customer?")){
 			window.location.href='deleteCustomer.php?id_customer='+idCustomer+'&username_admin='+username_admin;
 			return true;
 		}
 	}
</script>
