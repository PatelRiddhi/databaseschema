 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
$conn = mysqli_connect("localhost","root","") or die('not connected');
$query="use property_selling";
if(mysqli_query($conn,$query))
{
	$tablenames='show tables';
	if($res= mysqli_query($conn,$tablenames))
	{
		while ($ans=mysqli_fetch_array($res)) 
		{
			
			echo "<table border=1 class='table table-hover'>";
			echo '<caption><h2>'.$ans[0].'</h2></caption>';
			echo '<tr>';
			echo '<th>Field</th>';
			echo '<th>DataType</th>';
			echo '<th>Null</th>';
			echo '<th>Key</th>';
			echo '<th>Default</th>';
			echo '<th>Extra</th>';
			echo '</tr>';
			
			$q = mysqli_query($conn,'DESCRIBE '.$ans[0]);
			while($row = mysqli_fetch_array($q)) 
			{
				?>
				<tr>
					<td><?php echo $row[0] ?></td>
					<td><?php echo $row[1] ?></td>
					<td><?php echo $row[2] ?></td>
					<td><?php echo $row[3] ?></td>
					<td><?php echo $row[4] ?></td>
					<td><?php echo $row[5] ?></td>
				</tr>
				<?php
			}
			echo '</table>';
			echo '<br>';
		}
	}
}
?>