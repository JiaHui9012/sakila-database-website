
<!DOCTYPE html>

<html>
	<head>
		<title>Sakila Database</title>
		<style>
			h1 {
				margin-left: 250px;
				font-size: 50px;
				margin-bottom: 5px;
			}
            
            h2 {
                margin-left: 250px;
                font-size: 35px;
			}

			h3 {
                margin-bottom: 5px;
				font-size: 20px;
			}
			
			table{
				margin-left: 250px;
				margin-bottom: 50px;
			}
			
			th{
				background-color: grey;
				color: white;
			}

			tr:nth-child(even){
				background-color: #f2f2f2;
			}
            
			.sidebar {
				padding: 0px 8px;
				height: 100%;
				width: 190px;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: grey;
				overflow-x: hidden;
				overflow-y: hidden;
				padding-top: 20px;
			}

			.sidebar a.title {
				padding: 6px 10px 6px 30px;
				text-decoration: none;
				font-size: 23px;
				color: rgb(252, 252, 252);
				display: block;
			}

			.sidebar a:hover {
				color: black;
  				background-color: white;
			}

			.selection{
				margin-left: 250px;
			}

			.alert{
				margin-left: 250px;
				padding-bottom: 20px;
				font-weight: bold;
				font-size: 27px;
				color:rgb(167, 0, 0);
			}

			div.insert{
				margin-left: 250px;
				padding-bottom: 20px;
				
			}
			
			.in-group{
				padding-bottom: 10px;
			}

			button{
				border: none;
				border-radius: 5px;
    			background: #ddd;
				padding: 5px 20px 5px 20px;
			}

			a{
				text-decoration: none;
				color: black;
			}

		</style>
	</head>
	<body>
        <h1>Sakila Database</h1>
        <h2>Customer</h2>
		<nav>
			<div class="sidebar">
				<a href="index.php" class="title">HOME</a>
				<a href="actor.php" class="title">actor</a>
				<a href="address.php" class="title">address</a>
				<a href="category.php" class="title">category</a>
				<a href="city.php" class="title">city</a>
				<a href="country.php" class="title">country</a>
				<a href="customer.php" class="title">customer</a>
				<a href="film.php" class="title">film</a>
				<a href="film_actor.php" class="title">film_actor</a>
				<a href="film_category.php" class="title">film_category</a>
				<a href="film_text.php" class="title">film_text</a>
				<a href="inventory.php" class="title">inventory</a>
				<a href="language.php" class="title">language</a>
				<a href="payment.php" class="title">payment</a>
				<a href="rental.php" class="title">rental</a>
				<a href="staff.php" class="title">staff</a>
				<a href="store.php" class="title">store</a>
			</div>
        </nav>

		<?php require_once 'customerprocess.php';	?>

		<div class="selection">
		<form action="" method="POST">
			<h3>Select the fields</h3>
			<input type="checkbox" name="select[]" value="customer_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("customer_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>customer_id</label>
            <input type="checkbox" name="select[]" value="store_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("store_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>store_id</label>
            <input type="checkbox" name="select[]" value="first_name" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("first_name",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>first_name</label>
			<input type="checkbox" name="select[]" value="last_name" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("last_name",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>last_name</label>
            <input type="checkbox" name="select[]" value="email" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("email",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>email</label>
            <input type="checkbox" name="select[]" value="address_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("address_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>address_id</label>
            <input type="checkbox" name="select[]" value="active" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("active",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>active</label>
            <input type="checkbox" name="select[]" value="create_date" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("create_date",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>create_date</label>
            <input type="checkbox" name="select[]" value="last_update" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("last_update",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>last_update</label>
			<button type="submit" class="select-submit" name="select-button">Select</button>
		</form>
		</div>

		<div class="insert">
		<form action="customerprocess.php" method="POST">
			<h3>Enter Information</h3>
			<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
			<div class="in-group">
				<label>customer_id</label><br/>
				<input type="number" name="customer_id" class="in-input" value="<?php echo $customer_id; ?>" placeholder="Enter customer id" required>
			</div>
            <div class="in-group">
				<label>store_id</label><br/>
				<input type="number" name="store_id" class="in-input" value="<?php echo $store_id; ?>" placeholder="Enter store id" required>
			</div>
            <div class="in-group">
				<label>first_name</label><br/>
				<input type="text" name="first_name" class="in-input" value="<?php echo $first_name; ?>" placeholder="Enter first name" required>
			</div>
			<div class="in-group">
				<label>last_name</label><br/>
				<input type="text" name="last_name" class="in-input" value="<?php echo $last_name; ?>" placeholder="Enter last name" required>
			</div>
            <div class="in-group">
				<label>email</label><br/>
				<input type="email" name="email" class="in-input" value="<?php echo $email; ?>" placeholder="Enter email">
			</div>
            <div class="in-group">
				<label>address_id</label><br/>
				<input type="number" name="address_id" class="in-input" value="<?php echo $address_id; ?>" placeholder="Enter address id" required>
			</div>
			<div class="in-group">
				<label>active</label><br/>
				<input type="number" name="active" class="in-input" value="<?php echo $active; ?>" placeholder="Enter active" >
			</div>
            <div class="in-group">
				<label>create_date</label><br/>
				<input type="text" name="create_date" class="in-input" value="<?php echo $create_date=date('Y-m-d h:i:s'); ?>" placeholder="Enter create_date" required>
			</div>
			<div>
			<?php
			if ($update == true):
			?>
				<button type="submit" class="insert-submit" name="update">Update</button>
			<?php else: ?>
				<button type="submit" class="insert-submit" name="insert">Insert</button>
			<?php endif; ?>
			</div>
		</form>
		</div>
		
		<?php
			if (isset($_SESSION['message'])){
		?>
			<div class="alert">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
			</div>
		<?php
			}
		?>

        <form>
			<?php
			$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM customer") or die($mysqli->error);
			
			if (isset($_POST['select-button'])){
			?>
				<table align="left" border="1px" style="width: 81%; line-height: 40px;">
					<tr>
						<?php if (!empty($_POST['select'])&&in_array("customer_id",$_POST['select'])){ ?>
							<th>customer_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">customer_id</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("store_id",$_POST['select'])){ ?>
							<th>store_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">store_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("first_name",$_POST['select'])){ ?>
							<th>first_name</th>
						<?php }
						else{ ?>
							<th style="display:none;">first_name</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("last_name",$_POST['select'])){ ?>
							<th>last_name</th>
						<?php }
						else{ ?>
							<th style="display:none;">last_name</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("email",$_POST['select'])){ ?>
							<th>email</th>
						<?php }
						else{ ?>
							<th style="display:none;">email</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("address_id",$_POST['select'])){ ?>
							<th>address_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">address_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("active",$_POST['select'])){ ?>
							<th>active</th>
						<?php }
						else{ ?>
							<th style="display:none;">active</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("create_date",$_POST['select'])){ ?>
							<th>create_date</th>
						<?php }
						else{ ?>
							<th style="display:none;">create_date</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
							<th>last_update</th>
						<?php }
						else{ ?>
							<th style="display:none;">last_update</th>
						<?php } ?>
						<th>Action</th>
					</tr>
					<?php while ($rows = $result -> fetch_assoc()){ ?>
						<tr align="center">
							<?php if (!empty($_POST['select'])&&in_array("customer_id",$_POST['select'])){ ?>
								<td><?php echo $rows['customer_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['customer_id']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("store_id",$_POST['select'])){ ?>
								<td><?php echo $rows['store_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['store_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("first_name",$_POST['select'])){ ?>
								<td><?php echo $rows['first_name']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['first_name']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("last_name",$_POST['select'])){ ?>
								<td><?php echo $rows['last_name']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['last_name']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("email",$_POST['select'])){ ?>
								<td><?php echo $rows['email']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['email']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("address_id",$_POST['select'])){ ?>
								<td><?php echo $rows['address_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['address_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("active",$_POST['select'])){ ?>
								<td><?php echo $rows['active']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['active']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("create_date",$_POST['select'])){ ?>
								<td><?php echo $rows['create_date']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['create_date']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
								<td><?php echo $rows['last_update']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['last_update']; ?></td>
							<?php } ?>
							<td><button type="submit" name="update"><a href="customer.php?update=<?php echo $rows['customer_id']; ?>">Update</a></button>
								<button type="submit" name="delete"><a href="customerprocess.php?delete=<?php echo $rows['customer_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
							</td>
						</tr>
					<?php } ?>
				</table>	
			<?php		
			}
			else{
			?>
				<table align="left" border="1px" style="width: 81%; line-height: 40px;">
					<tr>
                        <th>customer_id</th>
						<th>store_id</th>
                        <th>first_name</th>
						<th>last_name</th>
						<th>email</th>
                        <th>address_id</th>
						<th>active</th>
						<th>create_date</th>
						<th>last_update</th>
						<th>Action</th>
					</tr>
				<?php while ($rows = $result -> fetch_assoc()){ ?>
					<tr align="center">
						<td><?php echo $rows['customer_id']; ?></td>
                        <td><?php echo $rows['store_id']; ?></td>
                        <td><?php echo $rows['first_name']; ?></td>
						<td><?php echo $rows['last_name']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['address_id']; ?></td>
                        <td><?php echo $rows['active']; ?></td>
                        <td><?php echo $rows['create_date']; ?></td>
						<td><?php echo $rows['last_update']; ?></td>
						<td><button type="submit" name="update"><a href="customer.php?update=<?php echo $rows['customer_id']; ?>">Update</a></button>
							<button type="submit" name="delete"><a href="customerprocess.php?delete=<?php echo $rows['customer_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
						</td>
					</tr>
				<?php } ?>
				</table>
			<?php } ?>
        </form>
	</body>
</html>