/* var btn = document.getElementById("btnShowModal");
btn.onclick = initialForms(); */
var questionNo = 1;
initialForms();

function initialForms() {
  createForm();
}

function createForm() {
  //div row
  var row = document.createElement("div");
  row.id = "question" + questionNo + "container";
  row.className += "row mb-3";

  //create left col first(the type)
  //div left col-4
  var leftCol = document.createElement("div");
  leftCol.className += "col-4";

  //input select in left col
  var leftInputContainer = document.createElement("div");
  leftInputContainer.className += "form-floating";

  //create question type <select>
  var questionType = document.createElement("select");
  questionType.id = "question" + questionNo;
  questionType.name = "question[]";
  questionType.className += "form-select";

  //create list of options for question type
  var optionText = document.createElement("option");
  optionText.innerHTML = "Text";
  var optionRadio = document.createElement("option");
  optionRadio.innerHTML = "Radio";
  //optionRadio.value = "2";
  var optionCheckbox = document.createElement("option");
  optionCheckbox.innerHTML = "Checkbox";

  //create label for select
  var label = document.createElement("label");
  label.innerHTML = "Type Pertanyaan";
  label.htmlFor = "question" + questionNo;

  //append all to question type
  questionType.append(optionText);
  questionType.append(optionRadio);
  questionType.append(optionCheckbox);

  //append question type to container
  leftInputContainer.append(questionType);
  leftInputContainer.append(label);

  //append input container to left col
  leftCol.append(leftInputContainer);
  //end of left col

  //create right col (the question)
  //div right col-8
  var rightCol = document.createElement("div");
  rightCol.className += "col-8";

  //right input container
  var rightInputContainer = document.createElement("div");
  rightInputContainer.className += "form-floating";

  //create input of type text
  var inputQuestion = document.createElement("input");
  inputQuestion.id = "question" + questionNo + "inputQuestion";
  inputQuestion.name = "inputQuestion[]";
  inputQuestion.className += "form-control";

  //label
  var inputQuestionLabel = document.createElement("label");
  inputQuestionLabel.innerHTML = "Pertanyaan";
  inputQuestionLabel.for = "inputQuestion" + questionNo;

  //append input to container
  rightInputContainer.append(inputQuestion);
  rightInputContainer.append(inputQuestionLabel);

  //append container to right col
  rightCol.append(rightInputContainer);

  //append col to row
  row.append(leftCol);
  row.append(rightCol);

  //multi option container
  var multiOptionContainer = document.createElement("div");
  multiOptionContainer.className += "form-floating";

  //row for multi option
  var rowOption = document.createElement("div");
  rowOption.id = "question" + questionNo + "multiContainer";
  rowOption.className += "row mb-3";

  //multi option text
  var multiOptionText = document.createElement("input");
  multiOptionText.id = "question" + questionNo + "multiOptText";
  multiOptionText.name = "multiOptText[]";
  multiOptionText.className += "form-control";
  multiOptionText.value = "0";

  var labelMultiOptionText = document.createElement("label");
  labelMultiOptionText.htmlFor = "question" + questionNo + "multiOptText";
  labelMultiOptionText.innerHTML = "Multi options (dipisah dengan koma)";

  multiOptionContainer.append(multiOptionText);
  multiOptionContainer.append(labelMultiOptionText);

  rowOption.append(multiOptionContainer);

  //hide
  rowOption.style.display = "none";

  //form container
  var form = document.getElementById("formContainer");
  form.append(row);
  form.append(rowOption);

  //check if question less than
  /* var submitBtn = document.getElementById("btnSubmit");
  submitBtn.className = "";
  if (questionNo <= 3) {
    submitBtn.className += "btn btn-primary disabled";
  } else {
    submitBtn.className += "btn btn-primary";
  } */

  questionType.onchange = multiValueChange;

  questionNo++;
}

function multiValueChange() {
  console.log(this.value);
  var row = document.getElementById(this.id + "multiContainer");
  var multiOpt = document.getElementById(this.id + "multiOptText");
  if (this.value == "Checkbox") {
    multiOpt.value = "pilihan 1, pilihan 2, pilihan 3";
    row.style.display = "block";
  } else if (this.value == "Radio") {
    multiOpt.value = "pilihan 1, pilihan 2, pilihan 3";
    row.style.display = "block";
  } else {
    multiOpt.value = "type text";
    row.style.display = "none";
  }
}
