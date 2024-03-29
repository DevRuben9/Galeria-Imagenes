const btnModal = document.querySelector('.btnModal');
const modal = document.querySelector('.modalOverlay');
const btnClose = document.querySelector('.closeModalBtn');

function openModal() {
    modal.classList.remove("hide");
}

function closeModal(e, clickedOutside) {
    if (clickedOutside) {
        if (e.target.classList.contains("modalOverlay"))
            modal.classList.add("hide");
    } else{ modal.classList.add("hide"); }
}

btnModal.addEventListener("click", openModal);
modal.addEventListener("click", (e) => closeModal(e, true));
btnClose.addEventListener("click", closeModal);
