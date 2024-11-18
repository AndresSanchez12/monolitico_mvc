const modalTarea = document.getElementById("modalEliminarTarea");
const closeBtnModalTarea = modalTarea.querySelector(".closeBtn");
const notBtnModalTarea = modalTarea.querySelector(".notBtn");


const tareaForm = document.forms["tareaForm"];


const onDeleteTarea = (id) => {
  const codInput = tareaForm["cod"];
  codInput.value = id;
  modalTarea.classList.remove("ocultarModal");
};


const closeModalTarea = () => {
  modalTarea.classList.add("ocultarModal");
};


closeBtnModalTarea.addEventListener("click", closeModalTarea);
notBtnModalTarea.addEventListener("click", closeModalTarea);


const onfiltrar= (start_date, end_date) => {
  const startDate = document.getElementById('start-date').value;
  const endDate = document.getElementById('end-date').value;

  console.log(`Buscando entre ${startDate} y ${endDate}`);
}

