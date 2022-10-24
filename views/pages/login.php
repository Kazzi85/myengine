<div class="conitainer">
    <div class="row">
        <div class="col-lg-4 m-auto mt-5">

            <form method="post" action="/Core/users.php">
                <div class="row mb-3">
                    <label for="inputLogin" class="col-sm-3 col-form-label">Login</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputLogin" name="login">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="remember_me">
                            <label class="form-check-label" for="gridCheck">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login_user">Log in</button>
            </form>

        </div>
    </div>
</div>