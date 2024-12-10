document.addEventListener("DOMContentLoaded", () => {

  // section toggle
  const buttons = document.querySelectorAll(".toggle-btn");
  const sections = document.querySelectorAll(".data-holder");

  // Retrieve the last selected section from localStorage
  const lastSelectedButtonId = localStorage.getItem("lastSelectedSection");

  // If a section was previously selected, display it
  if (lastSelectedButtonId) {
      const lastButton = document.getElementById(lastSelectedButtonId);
      if (lastButton) {
          buttons.forEach(button => button.classList.remove("active", "btn-primary"));
          sections.forEach(section => section.classList.remove("d-block"));

          document.querySelector(`.${lastButton.id}`).classList.add("d-block");
          lastButton.classList.add("active", "btn-primary");
      }
  } else {
      // If no section was selected before, show the first section by default
      buttons[0].classList.add("active", "btn-primary");
      sections[0].classList.add("d-block");
  }

  // Add event listeners to buttons
  buttons.forEach(button => {
      button.addEventListener("click", () => {

          // Remove active class and hide all sections
          buttons.forEach(btn => btn.classList.remove("active", "btn-primary"));
          sections.forEach(section => section.classList.remove("d-block"));

          // Add active class and show the selected section
          document.querySelector(`.${button.id}`).classList.add("d-block");
          button.classList.add("active", "btn-primary");

          // Save the selected section in localStorage
          localStorage.setItem("lastSelectedSection", button.id);
      });
  });



  // toggle create account form
  const createAccountForm = document.querySelector(".create-account-form")
  const toggleBtn = document.getElementById("create-account-toggle")

  createAccountForm.addEventListener("submit",function(){
    createAccountForm.classList.add("d-none")

  })
  toggleBtn.addEventListener("click",function(){

    createAccountForm.classList.toggle("d-none")

  })

  
});
