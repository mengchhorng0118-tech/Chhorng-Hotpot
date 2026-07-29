

document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("btnHello");
  const output = document.getElementById("output");
  const timeBox = document.getElementById("timeBox");

  // Show time
  const now = new Date();
  timeBox.textContent = "ពេលវេលា (Local): " + now.toLocaleString();

  // Button click
  btn.addEventListener("click", () => {
    output.textContent = "សួស្តី! នេះជា JavaScript ដំណើរការជោគជ័យ";
    output.classList.remove("muted");
  });
});


