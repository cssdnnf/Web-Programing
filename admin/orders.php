<?php if($users['level'] == "user") {?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- MENU -->
                    <div class="container mt-4">
                        <h2>Orders List</h2>
                        <br>
                        <table class="table table-striped table-responsive-lg">

                        <?php
                        $id = $users['id'];
						$query = mysqli_query($db, "SELECT * FROM orders where user_id= '$id'");
						if (mysqli_num_rows($query) > 0) {
							//while ($order = mysqli_fetch_assoc($query)) {
					    ?>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Nama Pesanan</th>
                                <th>Harga</th>
                                <th>Total Pesanan</th>
                                <th>Total Harga</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($order = mysqli_fetch_assoc($query)){
                            $menu_query = $db->prepare("SELECT * FROM menu WHERE menu.id = ?");
                            if (!$menu_query) {
                                //die('Error preparing statement: ' . mysqli_error($db));
                            }
                            $menu_query->bind_param('i', $order['menu_id']);
                            if (!$menu_query->execute()) {
                               // die('Error executing statement: ' . mysqli_error($db));
                            }
                            $result = $menu_query->get_result();
                            if (!$result) {
                                //die('Error getting result: ' . mysqli_error($db));
                            }
                            $menu = $result->fetch_assoc();

                            ?>
                            <tr>
                            <td><?php echo $order['id'];?></td>
                            <td><img src="../assets/images/menu/<?php echo $menu['gambar'];?>" style="max-width: 100px;"></td>
                            <td><?php echo $menu['judul'];?></td>
                            <td><?php echo $menu['harga'];?></td>
                            <td><?php echo $order['t_barang'];?></td>
                            <td><?php echo $order['t_harga'];?></td>
                            <!-- <td><?php //echo number_format($order['t_harga'], 3, ',', '.'); ?></td> -->

                            <td>
                                <!-- Kurang -->
                                <form action="update_order.php" method="post" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" name="update_quantity" class="btn btn-warning btn-sm me-2">
                                        <i class="bi bi-minus"></i> Kurang
                                    </button>
                                </form>
                                <!-- Tambah -->
                                <form action="update_order.php" method="post" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" name="update_quantity" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-plus"></i> Tambah
                                    </button>
                                </form>
                                <!-- Delete -->
                                <form action="delete_order.php" method="post" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" name="delete_order" class="btn btn-danger btn-sm me-2" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                            </tr>
                        </tbody>
                        <?php
						} 
						} else {
							//echo "No orders found.";
						}
					    ?>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <?php } else if($users['level'] == "admin") {?>
                    <h1>404 ERROR!</h1>
                <?php } ?>
