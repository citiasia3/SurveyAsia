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
  inputQuestion.id = "inputQuestion" + questionNo;
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
  multiOptionText.id = "multiOptText" + questionNo;
  multiOptionText.className += "form-control";
  multiOptionText.value = "op1,op2,op3";

  var labelMultiOptionText = document.createElement("label");
  labelMultiOptionText.htmlFor = "multiOptText" + questionNo;
  labelMultiOptionText.innerHTML = "Multi options (dipisah dengan koma)";

  multiOptionContainer.append(multiOptionText);
  multiOptionContainer.append(labelMultiOptionText);

  rowOption.append(multiOptionContainer);

  //hide
  rowOption.style.display = "none";

  questionNo += 1;

  //form container
  document.getElementById("formContainer").append(row);
  document.getElementById("formContainer").append(rowOption);

  questionType.onchange = setOnChange(questionType.id);
}

function setOnChange(id) {
  var select = document.getElementById(id);
  select.onchange = multiValueChange();
}

function multiValueChange() {
  if (this.value == "Checkbox") {
    console.log(select.value);
    var row = document.getElementById(id + "multiContainer");
    row.style.display = "block";
  }
}
