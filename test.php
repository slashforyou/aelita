<html>
  <head>
    <link rel="stylesheet" href='test_style.css'/>
    <script type="text/javascript" src="beta_script.js"></script>
  </head>
  <body>
    <div class='txt_screen'></div>
    <div class='rec_console' id='console'></div>

    <div class='talk_circle'></div>
    <div class='talk_circle_bis'></div>
    <div class='talk_circle_ter' onclick="ecoute_moi()"></div>

    <div class='question_zone'>
      <input class='question_input' type='text' placeholder='notez votre phrase'></input>
      <div class='question_button' onclick="word_detect(document.querySelector('.question_input').value)">Valider</div>
    </div>
  </body>
</html>
