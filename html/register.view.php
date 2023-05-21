<div class="container text-center mt-3">
    <h1>REGISTER</h1>
    <div align="center">
        <form action="register_process.php" method="post" style="max-width:300px">
            <div class="my-1" align="left">
                <label for="username">Username</label>
                <div class="my-1">
                    <input class="form-control" id="username" type="text" name="username" placeholder="Username" autocomplete="off" />
                </div>
            </div>
            <div class="my-1" align="left">
                <label for="password">Password</label>
                <div class="my-1">
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" autocomplete="off" />
                </div>
            </div>
            <div class="my-1" align="left">
                <label for="confirm_password">Confirm Password</label>
                <div class="my-1">
                    <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="off" />
                </div>
            </div>
            <div class="my-2">
                <button class="btn btn-success" type="submit">Register</button>
                <a href="./" class="mx-2">Login</a>
            </div>
        </form>
    </div>
</div>