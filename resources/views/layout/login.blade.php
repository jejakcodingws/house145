
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

   


     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css/')}}">

  <!-- bootstrap 5.0 -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-5.0/css/bootstrap.css/')}}">


  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
  <!-- asset-tambahan -->
  <link rel="stylesheet" href="{{asset('asset-tambahan/login-style.css')}}">

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .field-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <style>
	h1,h2,p,a{
		font-family:Georgia, 'Times New Roman', Times, serif;
		font-weight: normal;
	}
 
	.jam-digital-malasngoding {
		overflow: hidden;
		width: 250px;
		margin: 10px auto;
		border: 5px solid #efefef;
        border-radius: 10px;
        display: flex;
        justify-content: center;
     
	}
	.kotak{
		float: right;
		width: 80px;
		height: 40px;
        align-items: center;
        text-align: center;
		background-color:black;
        display: flex;
        justify-content: center;
	}
	.jam-digital-malasngoding p {
		color: #fff;
		font-size: 36px;
		text-align: center;
		margin-top: 10px;
        padding: 10px;
	}



  /* style lain */

  #timer {
            font-size: 2em;
        }
  #timer1 {
            font-size: 2em;
        }
  
 
 
</style>


    
  </head>
  <body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">LOGIN</h1>
                <form class="form-input-login" action="{{route('enter-login')}}" method="post">
                  @csrf
                {{$errors->first('email')}}
                    <input type="text" name="email" placeholder="EMAIL" />
                    <input type="password" name="password" placeholder="PASSWORD" />
                    <button class="opacity">SIGN IN</button>
                </form>

      <div class="col marq-title">
                                        <div class="jam-digital-malasngoding">
                                            <div class="kotak">
                                                <p id="jam"></p><span id="timer1">:</span>
                                            </div>
                                            <div class="kotak">
                                                <p id="menit"></p><span id="timer">:</span>
                                            </div>
                                            <div class="kotak">
                                                <p id="detik"></p>
                                            </div>
                                        </div>
        </div>
      </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>


  <script>
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector(this.getAttribute('toggle'));
            const fieldType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', fieldType);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
      <script>
        window.setTimeout("waktu()", 1000);
      
        function waktu() {
          var waktu = new Date();
          setTimeout("waktu()", 1000);
          document.getElementById("jam").innerHTML = waktu.getHours();
          document.getElementById("menit").innerHTML = waktu.getMinutes();
          document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
      </script>

<script>
        // Function to toggle the visibility of the colon
        function toggleColon() {
            const timerElement = document.getElementById('timer');
            // Toggle visibility based on current visibility state
            if (timerElement.style.visibility === 'hidden') {
                timerElement.style.visibility = 'visible';
            } else {
                timerElement.style.visibility = 'hidden';
            }
        }

        // Set interval to call the toggleColon function every second
        setInterval(toggleColon, 1000);
    </script>

<script>
        // Function to toggle the visibility of the colon
        function toggleColon() {
            const timerElement = document.getElementById('timer1');
            // Toggle visibility based on current visibility state
            if (timerElement.style.visibility === 'hidden') {
                timerElement.style.visibility = 'visible';
            } else {
                timerElement.style.visibility = 'hidden';
            }
        }

        // Set interval to call the toggleColon function every second
        setInterval(toggleColon, 1000);
    </script>

<script>
  const themes = [
    {
        background: "#1A1A2E",
        color: "#FFFFFF",
        primaryColor: "#0F3460"
    },
    {
        background: "#461220",
        color: "#FFFFFF",
        primaryColor: "#E94560"
    },
    {
        background: "#192A51",
        color: "#FFFFFF",
        primaryColor: "#967AA1"
    },
    {
        background: "#F7B267",
        color: "#000000",
        primaryColor: "#F4845F"
    },
    {
        background: "#F25F5C",
        color: "#000000",
        primaryColor: "#642B36"
    },
    {
        background: "#231F20",
        color: "#FFF",
        primaryColor: "#BB4430"
    }
];

const setTheme = (theme) => {
    const root = document.querySelector(":root");
    root.style.setProperty("--background", theme.background);
    root.style.setProperty("--color", theme.color);
    root.style.setProperty("--primary-color", theme.primaryColor);
    root.style.setProperty("--glass-color", theme.glassColor);
};

const displayThemeButtons = () => {
    const btnContainer = document.querySelector(".theme-btn-container");
    themes.forEach((theme) => {
        const div = document.createElement("div");
        div.className = "theme-btn";
        div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
        btnContainer.appendChild(div);
        div.addEventListener("click", () => setTheme(theme));
    });
};

displayThemeButtons();

</script>
</html>
