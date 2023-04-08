<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Seer</title>
    <link rel="stylesheet" href="welcome.css">


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>


</head>
<body>
    <div class="top">
        <div class="layout">
            <div></div>
        </div>
        <div class="mid">
            <div class="welcome">
                <h1 class="welcome1">
                    Welcome to<span class="spanw"><st>Seer</st></span> 
                </h1>
            </div>
            <div class="signin">
                <form action="login.php" method="POST" enctype="multipart/form-data">
                    <div class="fields">
                        <div class="field">
                          <input class="inup" type="number" placeholder="User-ID" name="id">
                        </div>
                        <span></span>
                        <div class="field">
                          <input class="inup" type="password" placeholder="Password" name="pass">
                        </div>

                        <span></span>
                        
                        <div class="ui segment" id="buttondiv" cellpadding="0" cellspacing="0">
                            <button class="ui secondary button huge" id="buttonbox" type="submit" name="submit">Sign In</button>

                            <span></span>
                            <a class="ui orange button huge" name="signup" id="buttonbox" onclick="window.location.href = 'signup.php';">Sign Up</a>
                        </div>
                        
                    </div> 
                </form>
                
            </div>
        </div>
        <footer class="footer">
            <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span> | 2022 | <span id="fspan1">All Rights Reserved</span>
        </footer>
    </div>
</body>
</html>