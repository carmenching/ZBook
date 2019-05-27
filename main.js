$('#envoi').click(function(e){
  e.preventDefault(); 

  var pseudo = encodeURIComponent( $('#pseudo').val() ); // sécurisation
  var message = encodeURIComponent( $('#message').val() );

  if(pseudo != "" && message != ""){ 
      $.ajax({
          url : "messagerie.php", // on donne l'URL du fichier de traitement
          type : "POST", // la requête est de type POST
          data : "pseudo=" + pseudo + "&message=" + message // et on envoie nos données
      });

     $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); 
  }
});
function charger(){

  setTimeout( function(){

      var premierID = $('#messages p:first').attr('id'); 

      $.ajax({
          url : "charger.php?id=" + premierID, 
          type : GET,
          success : function(html){ //envoi du message 
              $('#messages').prepend(html);
          }
      });

      charger();

  }, 5000);

}

charger();

