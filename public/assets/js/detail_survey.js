// var exampleModal = document.getElementById('modalEditPertanyaan')
// exampleModal.addEventListener('show.bs.modal', function (event) {
//     var id_container = document.getElementById('idContainer')
//     var id_pertanyaan = document.getElementById('idPertanyaan')
//     //var label = document.getElementById('labelContainer')

//     // Button that triggered the modal
//     var button = event.relatedTarget
//     // Extract info from data-bs-* attributes
//     var id_survey_pertanyaan = button.getAttribute('data-bs-whatever')
//     var dataPertanyaan = ''
//     // If necessary, you could initiate an AJAX request here
//     // and then do the updating in a callback.
//     //
//     $.getJSON('http://localhost:8080/survey/detailpertanyaan/1', function (data) {
//         dataPertanyaan = data

//         console.log(dataPertanyaan)
//     })

//     // Update the modal's content.
//     var modalTitle = exampleModal.querySelector('.modal-title')
//     // var modalBodyInput = exampleModal.querySelector('.modal-body input')

//     //modalTitle.textContent = 'New message to ' + recipient
//     // modalBodyInput.value = id_survey_pertanyaan
//     id_container.textContent = id_survey_pertanyaan
//     id_pertanyaan.textContent = id_survey_pertanyaan
//     //label.text = id_survey_pertanyaan
// })

var exampleModal = document.getElementById('modalEditPertanyaan')
exampleModal.addEventListener('show.bs.modal', function (event) {
    // get dta pertanyaan
    var button = event.relatedTarget
    var id_survey_pertanyaan = button.getAttribute('data-bs-whatever')
    var pertanyaan = button.getAttribute('data-pertanyaan')
    // isi value
    var inputId = document.getElementById('idPertanyaan')
    var inputPertanyaan = document.getElementById('pertanyaan')

    inputId.value = id_survey_pertanyaan
    inputPertanyaan.value = pertanyaan
    // const idPertanyaan = document.getAttribute('data-id')
    // console.log(pertanyaan)
    // console.log(id_survey_pertanyaan)
})





