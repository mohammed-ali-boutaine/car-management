document.addEventListener("DOMContentLoaded", () => {

     // section toggele
     const buttons = document.querySelectorAll(".toggle-btn");
     const sections = document.querySelectorAll(".data-holder");

     buttons.forEach(button => {
       button.addEventListener("click", () => {
         // Remove "d-block" and "active" from all sections and buttons
         buttons.forEach(btn => btn.classList.remove("active", "btn-primary"));
         sections.forEach(section => section.classList.remove("d-block"));

         // Add "d-block" and "active" to the clicked button's section
         document.querySelector(`.${button.id}`).classList.add("d-block");
         button.classList.add("active", "btn-primary");
       });
     });
     
   });