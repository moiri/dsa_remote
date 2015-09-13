<!-- login form box -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <b class="caret"></b></a>
    <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
        <li><div class="row"><div class="col-md-12">
            <form method="post" action="index.php" name="registerform">

                <!-- the user name input field uses a HTML5 pattern check -->
                <div class="form-group">
                    <label class="sr-only" for="login_input_username">Username</label>
                    <input id="login_input_username" class="login_input" type="text" placeholder="Username" name="user_name" pattern="[a-zA-Z0-9]{2,64}" required />
                </div>

                <!-- the email input field uses a HTML5 email type check -->
                <div class="form-group">
                    <label class="sr-only" for="login_input_email">Email</label>
                    <input id="login_input_email" class="login_input" type="email" name="user_email"i placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="login_input_password_new">Password (min. 6 chars)</label>
                    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" placeholder="Password (min. 6 chars)" required autocomplete="off" />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="login_input_password_repeat">Repeat password</label>
                    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" placeholder="Repeat password" required autocomplete="off" />
                </div>
                <button type="submit" class="btn btn-success btn-block" name="register">Register</button>
            </form>
        </div></div></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
    <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
        <li><div class="row"><div class="col-md-12">
            <form method="post" action="index.php" name="loginform">
                <div class="form-group">
                    <label class="sr-only" for="login_input_username">Username</label>
                    <input id="login_input_username" class="login_input" type="text" placeholder="Username" name="user_name" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="login_input_password">Password</label>
                    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" placeholder="Password" required />
                </div>
                <button type="submit" class="btn btn-success btn-block" name="login">Sign In</button>
            </form>
        </div></div></li>
    </ul>
</li>
