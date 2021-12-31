import $ from "jquery";
import 'parsleyjs';


export const form = {
  init: function () {


    const $formtrue = document.querySelector('.formtrue');
    const $formfalse = document.querySelector('.formfalse');
    const $contact = document.querySelector('.contact');


    $('#form').parsley();


    //al click sul bottone del form
    $("#form").submit(function (e) {
      e.preventDefault();
      //associo variabili
      var mail = $("#form-email").val();
      var messaggio = $("#form-message").val();


      $('#button').attr('disabled', 'disabled').addClass(
        'opacity-50 cursor-not-allowed'
      );

      //chiamata ajax
      $.ajax({

        //imposto il tipo di invio dati (GET O POST)
        type: "POST",

        //Dove devo inviare i dati recuperati dal form?
        url: "Form.php",

        //Quali dati devo inviare?
        data: {
          email     : mail,
          message: messaggio,
        },




        //Inizio visualizzazione errori
        success: function (msg) {
          console.log('msg');
          console.log(msg);
          console.log(typeof msg);

          $('#button').attr('disabled', false).removeClass(
            'opacity-50 cursor-not-allowed'
          );

          if (msg === true ) {
            // nascondo form
            $contact.classList.remove("block");
            $contact.classList.add("hidden");

            // mostro testo
            $formtrue.classList.remove("hidden");
          }
          else{
            // mostro errore sotto form

            $formfalse.classList.remove("hidden");
            $formfalse.classList.add("block");

            $('#button').attr('disabled', false).removeClass(
              'opacity-50 cursor-not-allowed'
            );

          }
        },
        error  : function (error) {
          console.log('error');
          console.log(error);


          // mostro errore sotto form
          $('#button').attr('disabled', false).removeClass(
            'opacity-50 cursor-not-allowed'
          );
          // $formfalse.classList.remove("hidden");
          // $formfalse.classList.add("block");
        }
      });
    });


  }
};
