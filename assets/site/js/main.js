// (function($) {

// 	"use strict";

// 	$('[data-toggle="tooltip"]').tooltip()

// })(jQuery);


(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })


    /*==================================================================
    [ Validate after type ]*/
    $('.validate-input .input100').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                $(this).parent().addClass('true-validate');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    




    
})(jQuery);

function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle('active');
    
    };


    const themeSwitchers = document.querySelectorAll('span');

    
    const handleThemeUpdate = (cssVars) => {
        const root = document.querySelector(':root');
        const keys = Object.keys(cssVars);
        keys.forEach(key => {
            root.style.setProperty(key, cssVars[key]);
        });
    }
    
    themeSwitchers.forEach((item) => {
        item.addEventListener('click', (e) => {
            handleThemeUpdate({
                '--primary-bg-color': e.target.getAttribute('data-bg-color'),
                '--primary-color': e.target.getAttribute('data-color')
            });
        });
    });
    
 
    
    $(function(){
        $('i.fa-heart').on('click', function() {  
          $('i.fr').removeClass('fr');
          $(this).addClass('fa'); 
        });
      
      });

 

      function incrementValue()
      {
          var value = document.getElementById('number-of-product').value;
          value++;
          document.getElementById('number-of-product').value = value;
      }
      function decrementValue()
      {
          var value = document.getElementById('number-of-product').value;
          value = value <= 0 ? 0 : value ;
          value--;
          document.getElementById('number-of-product').value = value;
      }
      function Total()
      {
          var value = document.getElementById('number-of-product').value;
          value = value <= 0 ? 0 : value ;
          value--;
          document.getElementById('number-of-product').value = value;
      }

