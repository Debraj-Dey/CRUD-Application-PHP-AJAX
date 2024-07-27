<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6a7a14b13.js" crossorigin="anonymous"></script>
    <title>CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <nav class="navbar sticky-top bg-body-tertiary bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 class="fw-bold text-center">PHP & AJAX CRUD Application</h2>
            </a>

            <div class="d-flex">
                <a href="https://github.com/Debraj-Dey" target="_blank"><i class="fa-brands fa-github fa-xl p-2"
                        style="color: #ffffff; " onmouseover="this.style.color='#a7a7a7'"
                        onmouseout="this.style.color='#ffffff'"></i></a>
                <a href="https://www.linkedin.com/in/debraj-dey/" target="_blank"><i
                        class="fa-brands fa-linkedin fa-xl p-2" style="color: #ffffff;"
                        onmouseover="this.style.color='#0080ff'" onmouseout="this.style.color='#ffffff'"></i></a>
            </div>
        </div>
    </nav>


    <div class="container my-3">
        <button type="button" class="my-3" data-bs-toggle="modal" data-bs-target="#addUserModal" id="newUserButton"><i
                class="fa-solid fa-user-plus" style="color: #00000;"></i> New users</button>

        <table class="table table-light table-borderless table-striped table-responsive align-middle">
            <thead class="table-dark fw-bold">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Address</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>

            <tbody class="table-group-divider" id="tbody">

            </tbody>
        </table>

        <div id="message">
            <p>
                <!--To display the message -->
            </p>
        </div>

        <!-- Modal -->
        <form action="" method="post" id="myform" autocomplete="off" class="needs-validation" novalidate>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h1 class="modal-title fs-5" id="addUserModalLabel">Add new users</h1>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label"><b>Name</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" required>
                                    <div class="invalid-feedback">
                                        Please enter you name
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="usergender" class="col-sm-2 col-form-label"><b>Gender</b></label>
                                <div class="col-sm-10">
                                    <select name="usergender" class="form-select form-control" id="usergender" required>
                                        <!-- <option value="none" selected disabled hidden>Select your gender</option> -->
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="useremail" class="col-sm-2 col-form-label"><b>Email</b></label>
                                <div class="col-sm-10">
                                    <input name="useremail" type="email" class="form-control" id="useremail" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="usernumber" class="col-sm-2 col-form-label"><b>Mobile</b></label>
                                <div class="col-sm-10">
                                    <input name="usernumber" type="tel" class="form-control" id="usernumber"
                                        minlength="10" maxlength="10" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid mobible no
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="useraddress" class="col-sm-2 col-form-label"><b>Address</b></label>
                                <div class="col-sm-10">
                                    <textarea name="useraddress" class="form-control" id="useraddress" required
                                        style="height: 100px"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter you address
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button name="addBtn" id="addChangesButton" type="submit"
                                class="btn btn-outline-primary">Add changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>



        <form action="" method="post" id="myeditform" autocomplete="off" class="needs-validation" novalidate>
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h1 class="modal-title fs-5" id="editUserModalLabel">Edit users</h1>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label"><b>Name</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" required>
                                    <div class="invalid-feedback">
                                        Please enter you name
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="usergender" class="col-sm-2 col-form-label"><b>Gender</b></label>
                                <div class="col-sm-10">
                                    <select name="usergender" class="form-select form-control" id="usergender" required>
                                        <!-- <option>Select your gender</option> -->
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="useremail" class="col-sm-2 col-form-label"><b>Email</b></label>
                                <div class="col-sm-10">
                                    <input name="useremail" type="email" class="form-control" id="useremail" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="usernumber" class="col-sm-2 col-form-label"><b>Mobile</b></label>
                                <div class="col-sm-10">
                                    <input name="usernumber" type="tel" class="form-control" id="usernumber"
                                        minlength="10" maxlength="10" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid mobible no
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="useraddress" class="col-sm-2 col-form-label"><b>Address</b></label>
                                <div class="col-sm-10">
                                    <textarea name="useraddress" class="form-control" id="useraddress" required
                                        style="height: 100px"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter you address
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button name="updateBtn" id="updateChangesButton" type="submit"
                                class="btn btn-outline-primary">Update changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>