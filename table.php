<?php
	$connect=mysqli_connect('us-cdbr-iron-east-01.cleardb.net', 'b6b56d1720fc8e', '6788b937', 'heroku_d28bba37fb42476');
	$query = "SELECT * FROM clients";
            $result1 = mysqli_query($connect, $query);

	
	
	
	

	
?>
<?php
		
        
		

		if(isset($_POST['block']))
		{
			$checkbox = $_POST['checkbox'];
			$id = $_GET['id'];
			
			for($i=0;$i<count($checkbox);$i++){
            $del_id = $checkbox[$i];
            $sql = "UPDATE clients SET Status= 'Blocked' WHERE ID='$del_id'";
				
				$result2 = mysqli_query($connect, $sql);
				if($id === $del_id)
				{
					header("Location: index.php");
					
					exit();
				}
				
				
				
}
			
		} ?>
<!doctype html>
<html>
<head>
	
	


	
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src ="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" ></script>
        <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
        </script>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>

<body>
	
	<form name="form1" method="post" action="">
		<menu type="toolbar">
        <button type="submit" name="block" value="123" >
			
			<img src="icon12.png" >
			
  
</button>
	<button type="submit" name="unblock" value="123">
  <img src="unblock.png" >
</button>
	
<button type="submit" name="delete" value="Delete">
	
	<img src="delete.png" >
  
</button>
		</menu>
		
	
	
  <input type="checkbox"> Check all

	
	
	
	    <table id="example" class="display" cellspacing="0" width="100%"> 
        <thead> 
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Password</th>
				<th>Time of registration</th>
				<th>Last online</th>
				<th>Status</th>
            </tr>
        </thead>
        <tbody><?php while($row1 = mysqli_fetch_array($result1)):;?>
			
            <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo $row1['ID'];?>" >
					<?php echo $row1['ID'];?></td>
                <td><?php echo $row1['Name'];?></td>
                <td><?php echo $row1['Mail'];?></td>
                <td><?php echo $row1['Password'];?></td>
				<td><?php echo $row1['Registration'];?></td>
				<td><?php echo $row1['Online'];?></td>
				<td><?php echo $row1['Status'];?></td>
            </tr>
            <?php endwhile;?>
        </tbody>
		
        </table><?php
			
			if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM clients WHERE ID='$del_id'";
$result1 = mysqli_query($connect, $sql);
	
}
				
				
			}
			?><?php
		

		
	   
		?>
		<?php
		
		if(isset($_POST['unblock']))
		{
			$checkbox = $_POST['checkbox'];
			
			for($i=0;$i<count($checkbox);$i++){
            $del_id = $checkbox[$i];
            $sql = "UPDATE clients SET Status= 'Unblocked' WHERE ID='$del_id'";
            $result1 = mysqli_query($connect, $sql);
	
}
			
		}

		?>
		
	
	</form>
</body>

	
	<script>
var main = document.querySelector('[type="checkbox"]'),
    all = document.querySelectorAll('[type="checkbox"]');

for(var i=0; i<all.length; i++) {  // 1 и 2 пункт задачи
    all[i].onclick = function() {
        var allChecked = document.querySelectorAll('[type="checkbox"]:checked').length;
        main.checked = allChecked == all.length;
        main.indeterminate = allChecked > 0 && allChecked < all.length;
    }
}

main.onclick = function() {  // 3
    for(var i=0; i<all.length; i++) {
        all[i].checked = this.checked;
    }
}

</script>
</html>

