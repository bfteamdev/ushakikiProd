
class SelectedCategory {
  constructor($select,$load) {
    this.$select = $select;
    this.$loading = $load;
    this.$thisClass = this;
    this.onChange = this.onChange.bind(this);
    this.loadNewForm = this.loadNewForm.bind(this);
    this.$select.addEventListener('change', this.onChange);
  }

  loadNewForm (data,event) {
    let parentNodes = this.$select.parentNode.parentNode.parentNode;
    let parentNodesXL = this.$select.parentNode.parentNode.parentNode.parentNode.parentElement.parentNode;
    let selectForms = `<div class="col-md-4 fieldCreate">
                        <div class="field">
                          <label for="nom" class="field-label">Selection la category</label>
                          <select id="my-select" class="field-input select-${event.target.value} controles" name="type_id" data-feature="${event.target.value}">
                          </select>
                        </div>
                      </div>`;
    if(data.subCategory.length !== 0){
      this.$select.removeAttribute("name")
    parentNodes.insertAdjacentHTML("beforeend", selectForms)
    }else{
      this.$select.setAttribute("name","type_id");
    }
    document.querySelector(".tabAutoGrow").style.height = "auto"
    // field();
    if(data.subCategory.length !== 0){
    data.subCategory.forEach((element) => {
      document.querySelector(".select-" + event.target.value)
        .insertAdjacentHTML("beforeend",`<option value="${element.id}">${element.name}</option>`);
      });
    }
    data.feature.forEach(async(elms) =>{
      await parentNodesXL.insertAdjacentHTML("beforeend",
      `<div class="card mb-4 deleteAll" style="border: 1px solid #5a5a5a;">
          <div class="card-header" style="background-color: #5a5a5a;color: white;padding: .8rem 1rem;">
              <span class="displayOrder">${elms.displayOrder} .</span>${elms.title}
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
            let fieldFeatureEqual = field.feature_id === parseInt(row.dataset.featureid);
            if(field.type !== "radio" && field.type !== "checkbox" &&field.type !== "textarea"){
              // debugger;
              row.insertAdjacentHTML("beforeend",
              `<div class="col-md-6">
                <div class="field">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id:''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id:''}">
                  <input type="${field.type}" class="field-input allInputs" id="${field.name}" name="feature[${fieldFeatureEqual ? field.feature_id:''}][value][]" autocomplete="off">
                </div>
              </div>`
              );
            }else if(field.type === "radio" || field.type === "checkbox"){
              row.insertAdjacentHTML("beforeend",
              `<div class="col-md-3">
                <div class="" style="height: 39px;display: flex;align-items: center;margin-top: 24px;margin-bottom: 0;">
                  <label for="nom" class="mr-3" style="font-size: 20px;">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id:''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id:''}">
                  <input type="${field.type}" class="allInputs" name="feature[${fieldFeatureEqual ? field.feature_id:''}][value][]" value="1">
                </div>
              </div>`
              );
            }else if(field.type === "textarea"){
              row.insertAdjacentHTML("beforeend",
              `<div class="col-md-12">
                <div class="field">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id:''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id:''}">
                  <textarea id="my-textarea" class="field-input allInputs" name="feature[${fieldFeatureEqual ? field.feature_id:''}][value][]" rows="3"></textarea>
                </div>
              </div>`
              );
            }else if(field.type === "date"){
              row.insertAdjacentHTML("beforeend",
              `<div class="col-md-4">
                <div id="field" class="field has-label">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id:''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id:''}">
                  <input id="my-select" type="date" class="field-input" name="feature[${fieldFeatureEqual ? field.feature_id:''}][value][]">
                </div>
              </div>`
              );
            }
          }
        });
      });
      
    this.$loading.style.display = "none"
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

  onChange(event) {
    this.$loading.style.display = "flex"
    let alreadyCreate = document.querySelector(".fieldCreate");
    if (alreadyCreate === null) {
        let request = fetch("http://localhost:8000/createAd/sub-category/" + event.target.value);
        request.then(res => {
            if (res.ok && res.status === 200) {
                res.json()
                    .then(data => {
                      if(data.feature.length !== 0){
                        this.loadNewForm(data,event);
                      }else{
                        this.$loading.style.display = "none"
                      }
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
      let request = fetch("http://localhost:8000/createAd/sub-category/" + event.target.value);
      request.then(res => {
          if (res.ok && res.status === 200) {
              res.json()
                  .then(data => {
                    this.$loading.style.display = "flex"
                    this.loadNewForm(data,event);
                  })
          } else {
              console.log("Erroor");
          }
      })
    }
  }
}
let $selects = document.querySelector(".selectCategory");
let $load = document.querySelector("#loading");
new SelectedCategory($selects,$load);