const editBtn = document.querySelectorAll(".editBtn");
const editTitle = document.getElementById("editTitle");
const editBody = document.getElementById("editBody");
const hiddenInput = document.getElementById("hiddenInput");

const search = document.getElementById("searchInput");
const cardBody = document.querySelectorAll(".card-body");

editBtn.forEach(element => {
    element.addEventListener('click', ()=>{
        const toEditNoteTitle = element.parentElement.children[0].innerText
        const toEditNoteBody = element.parentElement.children[1].innerText

        editTitle.value = toEditNoteTitle
        editBody.value = toEditNoteBody

        hiddenInput.value = element.id
        console.log(hiddenInput.value)
    })
});

search.addEventListener("input", ()=>{
    const searchValue = search.value.toLowerCase()
    
    cardBody.forEach(element => {
        const titleText = element.children[0].innerText.toLowerCase();
        const noteText = element.children[1].innerText.toLowerCase();
        if (titleText.includes(searchValue) || noteText.includes(searchValue)) {
            element.parentElement.classList.add("card");
            element.parentElement.classList.add("m-3");
        } else {
            element.parentElement.style.display = "none";
        }
    });
})
