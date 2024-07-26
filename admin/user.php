    <div class="container mt-5">
        <h2>User List</h2>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary mb-3" id="tambahUser">Tambah User</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <!-- <th>Password</th> -->
                    <th>Level</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($db, "SELECT id, username, password, level, name FROM users");

                if (mysqli_num_rows($query) > 0) {
                    // Output data dari setiap baris
                    while($users = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>" . $users["id"] . "</td>";
                        echo "<td>" . $users["username"] . "</td>";
                        //echo "<td>" . $users["password"] . "</td>";
                        echo "<td>" . $users["level"] . "</td>";
                        echo "<td>" . $users["name"] . "</td>";
                        echo '<td>
                                <a href="index.php?halaman=user&edit='. $users["id"] .'" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</a>
                                
                                <form id="deleteForm" action="delete_user.php" method="post" style="display: inline;">
                                    <input type="hidden" name="user_id" value="'.$users["id"].'">
                                    <button type="submit" name="delete_user" class="btn btn-danger btn-sm me-2" onclick="return confirm(\'Apakah Anda yakin ingin menghapus user ini?\');">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form> 

                              </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>


        <!-- Tambah User -->
        <div class="container mt-5">
            <div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="tambahUserLabel">Tambah User Baru</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="add_user.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level: </label>
                                    <select class="form-select" id="level" name="level">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Tambah User</button>
                                    <a href="./index.php?halaman=user" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Tambah User -->

        <!-- Edit User -->
        <div class="container mt-5">
        <?php
            $query = mysqli_query($db, "SELECT id, username, password, level, name FROM users");
            if (mysqli_num_rows($query) > 0) {
                while ($users = mysqli_fetch_assoc($query)) {
                    $edit_id = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
                    if ($edit_id == $users['id']) {
                        ?>
                <h2 class="modal-title" id="editUserLabel">Edit User</h2>
                <form action="edit_user.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text"  class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($users["username"]); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php //echo htmlspecialchars($users["password"]); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level: </label>
                        <select class="form-select" id="level" name="level">
                            <option <?php if ($users['level'] == 'admin') echo 'selected'; ?> value="admin">Admin</option>
                            <option <?php if ($users['level'] == 'user') echo 'selected'; ?> value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($users['name']); ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Edit User</button>
                        <a href="./index.php?halaman=user" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            <?php
                    }
                }
            } else {
                echo "No menu items found.";
            }
            ?>
        </div><!-- End Edit User -->



    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tambahMenuButton = document.getElementById('tambahUser');
            tambahMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                $('#tambahUserModal').modal('show');
            });
            
        });
    </script>