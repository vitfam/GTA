
 <?php

    echo '
                <div class="modal fade" id="editUserModal' . $row['user_id'] . '" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit the user details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action"' . $_SERVER['PHP_SELF'] . '" method="POST">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="' . $row['name'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="' . $row['email'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" value="' . $row['pass'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="' . $row['mobile'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="stars" class="form-label">Stars</label>
                                        <input type="text" class="form-control" id="stars" name="stars" value="' . $row['stars'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" value="' . $row['amount'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_type" class="form-label">User Type</label>
                                        <input type="text" class="form-control" id="user_type" name="user_type" value="' . $row['user_type'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" value="' . $link . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="login" class="form-label">LoggedIn</label>
                                        <input type="text" class="form-control" id="login" name="login" value="' . $row['loggedin'] . '" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" style="position: absolute; left:10px;" value="' . $row['user_id'] . '" name="edit">Save Changes</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            ';
    ?>