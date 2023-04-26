const toggle = document.querySelector("#toggle");


toggle.addEventListener("click",()=>{
    if(document.body.classList.contains("light")){
        document.body.classList.replace("light","dark");
    }else{
        document.body.classList.replace("dark","light");
    }
})
const agendamentosLink = document.getElementById("agendamentos-link");
const carrosLink = document.getElementById("carros-link");
const agendamentosContainer = document.getElementById("agendamentos-container");
const carrosContainer = document.getElementById("carros-container");

agendamentosContainer.innerHTML = "";
// Define a ação do link de agendamentos
agendamentosLink.addEventListener("click", (event) => {
  event.preventDefault(); // previne o comportamento padrão do link
  agendamentosLink.classList.add("active");
  carrosLink.classList.remove("active");
  // Faz a requisição para o script PHP e atualiza a div de agendamentos
  fetch("get_agendamentos.php")
    .then((response) => response.text())
    .then((result) => {
      carrosContainer.style.display = "none";
      agendamentosContainer.style.display = "block";
      agendamentosContainer.innerHTML = result;
    })
    .catch((error) => console.error(error));
});


// 1


carrosContainer.innerHTML = "";
// Define a ação do link de agendamentos
carrosLink.addEventListener("click", (event) => {
  event.preventDefault(); // previne o comportamento padrão do link
  carrosLink.classList.add("active");
  agendamentosLink.classList.remove("active");
  // Faz a requisição para o script PHP e atualiza a div de agendamentos
  fetch("get_carros.php")
    .then((response) => response.text())
    .then((result) => {
      agendamentosContainer.style.display = "none";
      carrosContainer.style.display = "block";
      
      carrosContainer.innerHTML = result;
    })
    .catch((error) => console.error(error));
});




