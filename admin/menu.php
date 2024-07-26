<?php if($users['level'] == "admin") {?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- MENU -->
                    <div class="container mt-4">
                        <h2>Menu List</h2>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mb-3" id="tambahMenu"><i class="bi bi-pencil"></i> Tambah Menu Baru</a>
                        </div>
                        <br>
                        <table class="table table-striped table-responsive-lg">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Category</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
						$query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar, category FROM menu");
						if (mysqli_num_rows($query) > 0) {
							while ($menu = mysqli_fetch_assoc($query)) {
					    ?>
                        <tbody>
                            <tr>
                            <td><?php echo $menu['id'];?></td>
                            <td><?php echo $menu['judul'];?></td>
                            <td><?php echo $menu['deskripsi'];?></td>
                            <td>Rp <?php echo $menu['harga'];?>,00</td>
                            <td><img src="../assets/images/menu/<?php echo $menu['gambar'];?>" style="max-width: 100px;"></td>
                            <td><?php echo $menu['category'];?></td>
                            <td>
                                <a href="index.php?halaman=menu&edit=<?php echo $menu['id'];?>" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</a>
                                <form id="deleteForm" action="delete_menu.php" method="post" style="display: inline;">
                                    <input type="hidden" name="menu_id" value="<?php echo $menu['id'];?>">
                                    <button type="submit" name="delete_menu" class="btn btn-danger btn-sm me-2" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                                <a href="../index.php" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a>
                            </td>
                            </tr>
                        </tbody>
                        <?php
						} 
						} else {
							echo "No menu items found.";
						}
					    ?>
                        </table>
                    </div>

                    <!-- Tambah MENU -->
                    <div class="container mt-5">
                        <div class="modal fade" id="tambahMenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="tambahMenuModalLabel">Tambah Menu Baru</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add_menu.php" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="judul" class="form-label">Judul:</label>
                                                <input type="text" class="form-control" id="judul" name="judul" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi:</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga:</label>
                                                <input type="number" class="form-control" id="harga" name="harga" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">Gambar: </label>
                                                <input type="file" class="form-control" id="gambar" name="gambar">
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category: </label>
                                                <select class="form-select" id="category" name="category">
                                                    <option value="burgers">Burgers</option>
                                                    <option value="sides">Fries & Sides</option>
                                                    <option value="drinks">Drinks</option>
                                                    <option value="desserts">Desserts</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Tambah Menu</button>
                                                <a href="./index.php?halaman=menu" class="btn btn-secondary">Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Tambah MENU -->

                    <!-- EDIT MENU -->
                    <div class="container mt-5">
                        <?php
                        $query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar, category FROM menu");
                        if (mysqli_num_rows($query) > 0) {
                            while ($menu = mysqli_fetch_assoc($query)) {
                                $edit_id = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
                                if ($edit_id == $menu['id']) {
                                    ?>
                                    <h2 class="modal-title" id="editModalLabel">Edit Menu</h2>
                                    
                                    <form action="edit_menu.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="edit" value="<?php echo $menu['id']; ?>">
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo htmlspecialchars($menu['judul']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo htmlspecialchars($menu['deskripsi']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $menu['harga']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label">Gambar: </label>
                                            <br><br><img src="../assets/images/menu/<?php echo $menu['gambar']; ?>" style="max-width: 100px;">
                                            <br><br>
                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category: </label>
                                            <select class="form-select" id="category" name="category">
                                                <option <?php if ($menu['category'] == 'burgers') echo 'selected'; ?> value="burgers">Burgers</option>
                                                <option <?php if ($menu['category'] == 'sides') echo 'selected'; ?> value="sides">Fries & Sides</option>
                                                <option <?php if ($menu['category'] == 'drinks') echo 'selected'; ?> value="drinks">Drinks</option>
                                                <option <?php if ($menu['category'] == 'desserts') echo 'selected'; ?> value="desserts">Desserts</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            <a href="./index.php?halaman=menu" class="btn btn-secondary">Batal</a>
                                        </div>
                                    </form>
                        <?php
                                }
                            }
                        } else {
                            echo "No menu items found.";
                        }
                        ?>
                    </div><!-- End EDIT MENU -->

                </div>
                <!-- /.container-fluid -->



                <?php } else if($users['level'] == "user") {?>
                    <h1>Ini adalah tampilan user</h1>
                <?php } ?>


                
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var tambahMenuButton = document.getElementById('tambahMenu');
                        tambahMenuButton.addEventListener('click', function(e) {
                            e.preventDefault();
                            $('#tambahMenuModal').modal('show'); // Show the modal with id tambahMenuModal
                        });
                        
                    });
                </script>