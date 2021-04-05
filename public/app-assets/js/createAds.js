
class SelectedCategory {
  constructor($select) {
    this.$select = $select;
    this.$thisClass = this;
    this.onChange = this.onChange.bind(this);
    this.$select.addEventListener('change', this.onChange);
  }
  onChange(e) {
    function loadNewForm (data,selcted,forms) {
      let parentNodes = selcted.parentNode.parentNode.parentNode
      let parentNodesXL = selcted.parentNode.parentNode.parentNode.parentNode.parentElement.parentNode
      
      if(data.subCategory.length !== 0){
        selcted.removeAttribute("name")
      parentNodes.insertAdjacentHTML("beforeend", forms)
      }else{
        selcted.setAttribute("name","type_id");
      }
      document.querySelector(".tabAutoGrow").style.height = "auto"
      // field();
      if(data.subCategory.length !== 0){
      data.subCategory.forEach((element) => {
        document.querySelector(".select-" + e.target.value)
          .insertAdjacentHTML("beforeend",`<option value="${element.id}">${element.name}</option>`);
        });
      }
      data.feature.forEach(async(elms) =>{
        await parentNodesXL.insertAdjacentHTML("beforeend",
        `<div class="card mb-4 deleteAll" style="border: 1px solid #5a5a5a;">
            <div class="card-header" style="background-color: #5a5a5a;color: white;padding: .8rem 1rem;">
                <span class="displayOrder">${elms.displayOrder}</span>${elms.title}
            </div>
            <div class="card-body">
                <div class="row cl1ss" data-featureID="${elms.id}">
                </div>
            </div>
        </div>`
        );
        await elms.field.forEach(async(field) =>{
          let allRows = document.querySelectorAll(".cl1ss");
          allRows.forEach(function(row){
            if(field.feature_id === parseInt(row.dataset.featureid)){
              if(field.type !== "radio" && field.type !== "checkbox" &&field.type !== "textarea"){
                row.insertAdjacentHTML("beforeend",
                `<div class="col-md-6">
                  <div class="field">
                    <label for="nom" class="field-label">${field.name}</label>
                    <input type="${field.type}" class="field-input allInputs"id=" ${field.name}" name="value[]" autocomplete="off">
                  </div>
                </div>`
                );
              }else if(field.type === "radio" || field.type === "checkbox"){
                row.insertAdjacentHTML("beforeend",
                `<div class="col-md-3">
                  <div class="" style="height: 39px;display: flex;align-items: center;margin-top: 24px;margin-bottom: 0;">
                    <label for="nom" class="mr-3" style="font-weight: bold; font-size: 18px;">${field.name}</label>
                    <input type="${field.type}" class="allInputs" name="value[]" value="1">
                    <input type="hidden" name="value[]" value="0">
                  </div>
                </div>`
                );
              }else if(field.type === "textarea"){
                row.insertAdjacentHTML("beforeend",
                `<div class="col-md-12">
                  <div class="field">
                    <label for="nom" class="field-label">${field.name}</label>
                    <textarea id="my-textarea" class="field-input allInputs" name="value[]" rows="3"></textarea>
                  </div>
                </div>`
                );
              }else if(field.type === "date"){
                row.insertAdjacentHTML("beforeend",
                `<div class="col-md-4">
                  <div id="field" class="field has-label">
                    <label for="nom" class="field-label">${field.name}</label>
                    <input id="my-select" type="date" class="field-input" name="value[]">
                  </div>
                </div>`
                );
              }
            }
          });
        });
        //field input HTML
        $(document).ready(function() {
          $('.field-input').focus(function() {
              $(this).parent().addClass('is-focused has-label');
          });
          $('.field-input').blur(function() {
              if ($(this).val() == '') {
                $(this).parent().removeClass('has-label');
              }
              $(this).parent().removeClass('is-focused');
          });
          $('.field-input').each(function() {
              if ($(this).val() != '') {
                  $(this).parent().addClass('has-label');
              }
          });
          
          $('.allInputs').keyup(function () {
            if ($(this).val() == "") {
                $(this).parent().addClass('is-error-focused error');
            } else {
                $(this).parent().removeClass('is-error-focused error');
            }
          });
        });
      });
    }
    let alreadyCreate = document.querySelector(".fieldCreate");
    if (alreadyCreate === null) {
        let forms = `<div class="col-md-4 fieldCreate">
                        <div class="field">
                          <label for="nom" class="field-label">Selection la category</label>
                          <select id="my-select" class="field-input select-${e.target.value} controles" name="type_id" data-feature="${e.target.value}">
                          </select>
                        </div>
                    </div>`;
        let request = fetch("http://localhost:8000/createAd/sub-category/" + e.target.value);
        request.then(res => {
            if (res.ok && res.status === 200) {
                res.json()
                    .then(data => {
                      loadNewForm(data,this.$select,forms);
                    });
            } else {
                console.log("Erroor");
            }
        })
    } else {
      //if selected another category delete the select created
      this.$select.parentNode.parentNode.parentNode.removeChild(alreadyCreate);
      //if selected another category delete All Cards created
      let allCards = document.querySelectorAll(".deleteAll");
      allCards.forEach(async function(deleteCard){
          let tabPane =  deleteCard.parentNode
          tabPane.removeChild(deleteCard)
      });
      //ajax
      let forms = `<div class="col-md-4 fieldCreate">
                      <div class="field">
                        <label for="nom" class="field-label">Selection la category</label>
                        <select id="my-select" class="field-input select-${e.target.value} controles" name="" data-feature="${e.target.value}">
                          <option value=""></option>
                        </select>
                      </div>
                  </div>`;
      let request = fetch("http://localhost:8000/createAd/sub-category/" + e.target.value);
      request.then(res => {
          if (res.ok && res.status === 200) {
              res.json()
                  .then(data => {
                    loadNewForm(data,this.$select,forms);
                  })
          } else {
              console.log("Erroor");
          }
      })
    }
  }
}
let $selects = document.querySelector(".selectCategory");
new SelectedCategory($selects);