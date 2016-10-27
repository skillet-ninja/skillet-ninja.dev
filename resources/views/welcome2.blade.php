<!DOCTYPE html>
<html>
    <head>
        <title>Skillet Ninja</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/assets/css/video.css" rel="stylesheet" type="text/css">

    </head>
    <body class="site">
        <main class="site-content">
            <div class="container">
                <video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
					  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
					<source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
					<source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
				</video>
			<div id="polina">
			<h1>Skillet Ninja</h1>
			<p>a voice assisted cooking partner
			<p><a href="">Browse Recipes</a>
			<p>Browse our community recipes or use one of your own. Once you've chosen you'll be taken
				to a narrated step by step cooking assistant. Use voice commands to work your way through the recipe.
			</p>
			<p><a href="">Sign in • Sign Up</a>
			<p>Sign in or sign up to start using Skillet Ninja</p>
			{{-- <button>Pause</button> --}}
			</div>
                
            </div>
            
        </main>



        {{-- jQuery --}}
       <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        {{-- javascript --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<script>
			var vid = document.getElementById("bgvid");
			var pauseButton = document.querySelector("#polina button");

			function vidFade() {
			  vid.classList.add("stopfade");
			}

			vid.addEventListener('ended', function()
			{
			// only functional if "loop" is removed 
			vid.pause();
			// to capture IE10
			vidFade();
			}); 


			pauseButton.addEventListener("click", function() {
			  vid.classList.toggle("stopfade");
			  if (vid.paused) {
			    vid.play();
			    pauseButton.innerHTML = "Pause";
			  } else {
			    vid.pause();
			    pauseButton.innerHTML = "Paused";
			  }
			})
		</script>





    </body>
</html>

