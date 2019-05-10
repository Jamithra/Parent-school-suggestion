<!DOCTYPE html>
<html>
<head>
  <title>Voice assistant</title>
  <style>
  .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; display: inline-block; height: 30px;}
  .speech img {float: right; width: 40px }
</style>
</head>
<body>

<!-- Search Form -->
<form id="labnol" method="POST" >
  <div class="speech">
    <input type="text" name="spoken" id="transcript" placeholder="Speak" />
    <img onclick="startDictation()" src="mic.png" />
    
  </div>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="search">Search</button>
</form>

<!-- HTML5 Speech Recognition API -->
<script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>


</body>
</html>

<?php 
IF(isset($_POST['search']))

{
  $spk=$_POST['spoken'];
  if($spk=='select location'){

 //echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='t.php';</script>";
  header('location:set_location.php');
}

elseif ($spk=='home') {
  header('location:parent_menu.php');
}

elseif ($spk=='schools') {
  header('location:schools.php');
}

elseif ($spk=='leaderboard') {
  header('location:leaderboard.php');
}

elseif ($spk=='about my child') {
  header('location:my_child.php');
}

elseif ($spk=='my interests') {
  header('location:interested_subs.php');
}

else
{

 echo "<script language=\"javascript\">alert(\"please search correctly \");document.location.href='voc.php';</script>";
}
}


?>