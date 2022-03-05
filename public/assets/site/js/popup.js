// Preloder

// Protofile light box
const popup = document.querySelector(".popup-all"),
closeLightbox = popup.querySelector(".lightbox-close"),
buttonShowPopup = document.querySelector("add-project-button")
;
let itemIndex = 0;

// buttonShowPopup.addEventListener("click",function() {
//     toggleLightbox();

//   })
    
function toggleLightbox(){
    popup.classList.toggle("open");

    
}
// close lightbox
popup.addEventListener("click" , function(event) {
    if (event.target === closeLightbox ||event.target === popup ) {
        toggleLightbox();
        
    }
    

})


// JotForm.init(function(){
//     /*INIT-START*/
// if (window.JotForm && JotForm.accessible) $('input_6').setAttribute('tabindex',0);
//     JotForm.newDefaultTheme = true;
//     JotForm.extendsNewTheme = false;
//     JotForm.newPaymentUIForNewCreatedForms = true;
//     JotForm.newPaymentUI = true;
//       JotForm.alterTexts(undefined);
//     JotForm.clearFieldOnHide="disable";
//       setTimeout(function() {
//           JotForm.initMultipleUploads();
//       }, 2);
//     JotForm.submitError="jumpToFirstError";
//     /*INIT-END*/
//     });

//    JotForm.prepareCalculationsOnTheFly([null,{"name":"onlineVideo","qid":"1","text":"Online Video Upload Form","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"name":"input3","qid":"3","type":"control_fileupload"},{"name":"name","qid":"4","text":"Name","type":"control_fullname"},{"name":"email","qid":"5","subLabel":"example@example.com","text":"Email","type":"control_email"},{"name":"additionalNotes","qid":"6","text":"Additional Notes","type":"control_textarea"}]);
//    setTimeout(function() {
// JotForm.paymentExtrasOnTheFly([null,{"name":"onlineVideo","qid":"1","text":"Online Video Upload Form","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"name":"input3","qid":"3","type":"control_fileupload"},{"name":"name","qid":"4","text":"Name","type":"control_fullname"},{"name":"email","qid":"5","subLabel":"example@example.com","text":"Email","type":"control_email"},{"name":"additionalNotes","qid":"6","text":"Additional Notes","type":"control_textarea"}]);}, 20); 
