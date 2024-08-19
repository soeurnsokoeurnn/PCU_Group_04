<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add Students</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3 form-group">
                                        <div class="col-md">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name">
                                        </div>
                                        <div class="col-md">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name">
                                        </div>
                                    </div>
                                    <div class="row g-3 form-group">
                                        <div class="col-md">
                                            <label>Gender</label>
                                            <select class="form-select" name="gender">
                                                <option value="" selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md">
                                            <label>DOB</label>
                                            <input type="text" class="form-control" name="dob">
                                        </div>
                                    </div>
                                    <div class="row g-3 form-group">
                                        <div class="col-md">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                        <div class="col-md">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body ">
                                    <h4>Picture</h4>    
                                    <img src="./assets/icon/admin-0999.jfif" alt="" class="w-50 rounded mx-auto d-block">
                                    <input type="file" class="form-control my-4 w-50 mx-auto d-block" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary my-2 px-4 rounded" name="btn_submit">Submit</button>
                        </div>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
</div>
</div>
</main>
</body>

</html>