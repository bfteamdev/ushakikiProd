
function debounce(callback, delay){
  let timer;
  return function(){
      let args = arguments;
      let context = this;
      clearTimeout(timer);
      timer = setTimeout(function(){
          callback.apply(context, args);
      }, delay)
  }
}
class SelectedCategory {
  constructor($select, $load) {
    this.$select = $select;
    this.$loading = $load;
    this.$thisClass = this;
    this.onChange = debounce(this.onChange.bind(this),900);
    this.loadNewForm = this.loadNewForm.bind(this);
    this.$select.addEventListener('change', this.onChange);
  }
  loadNewForm(data, event) {
    let parentNodes = this.$select.parentNode.parentNode.parentNode;
    let parentNodesXL = this.$select.parentNode.parentNode.parentNode.parentNode.parentElement.parentNode;
    let selectForms = `<div class="col-md-4 fieldCreate">
                        <div class="field">
                          <label for="nom" class="field-label">Selection la category</label>
                          <select id="my-select" class="field-input select-${event.target.value} allInputs" name="type_id" data-feature="${event.target.value}">
                          </select>
                        </div>
                      </div>`;
    if (data.subCategory.length !== 0) {
      this.$select.removeAttribute("name")
      parentNodes.insertAdjacentHTML("beforeend", selectForms)
    } else {
      this.$select.setAttribute("name", "category_id");
    }
    //Ajout des champs obligatoire sur le premier card du content
    parentNodesXL.insertAdjacentHTML("beforeend",
      `<div class="card mb-4 deleteAll" style="border: 1px solid #5a5a5a;">
      <div class="card-header" style="background-color: #5a5a5a;color: white;display: flex;align-items: center;justify-content: space-between;">
        <span>Title de l'annonce</span><span class="displayOrder" style="font-size: 14px;font-weight: 100;color: #ffd44a">Champs obligatoire *</span>
      </div>
      <div class="card-body">
        <div class="row cl1ss">
          <div class="col-md-8">
            <div class="field">
              <label for="nom" class="field-label">Title</label>
              <input type="text" class="field-input allInputs" name="title" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="field">
              <label for="nom" class="field-label">Price</label>
              <input type="number" class="field-input allInputs" name="price" autocomplete="off">
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <label for="nom" class="field-label">Commune</label>
              <input type="text" list="communes"class="field-input allInputs" name="commune" autocomplete="off">
              <datalist id="communes">
              </datalist>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <label for="nom" class="field-label">zone</label>
              <input type="text" class="field-input allInputs" name="zone" autocomplete="off">
            </div>
          </div>
        </div>
      </div>
    </div>
    `);
    //change du hauteur du content qui contier les step pour qu'il agrandisse automatiquement 
    document.querySelector(".tabAutoGrow").style.height = "auto"
    if (data.commune.length !== 0) {
      data.commune.forEach((element) => {
        document.querySelector("#communes")
          .insertAdjacentHTML("beforeend", `<option value="${element.name}">`);
      });
    }
    if (data.subCategory.length !== 0) {
      data.subCategory.forEach((element) => {
        document.querySelector(".select-" + event.target.value)
          .insertAdjacentHTML("beforeend", `<option value="${element.id}">${element.name}</option>`);
      });
    }
    data.feature.forEach(async (elms) => {
      // Ajout des card avec les title qui correspond au feature
      await parentNodesXL.insertAdjacentHTML("beforeend",
        `<div class="card mb-4 deleteAll" style="border: 1px solid #5a5a5a;">
          <div class="card-header" style="background-color: #5a5a5a;color: white;">
              <span class="displayOrder">${elms.displayOrder} .</span>${elms.title}
          </div>
          <div class="card-body">
              <div class="row cl1ss" data-featureID="${elms.id}">
              </div>
          </div>
      </div>
      `
      );
      //Ajout des champs qui correspond au feature
      await elms.field.forEach(async (field) => {
        let allRows = document.querySelectorAll(".cl1ss");
        allRows.forEach(function (row) {
          if (field.feature_id === parseInt(row.dataset.featureid)) {
            let fieldFeatureEqual = field.feature_id === parseInt(row.dataset.featureid);
            if (field.type !== "radio" && field.type !== "checkbox" && field.type !== "textarea") {
              // debugger;
              row.insertAdjacentHTML("beforeend",
                `<div class="col-md-6">
                <div class="field">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id : ''}">
                  <input type="${field.type}" class="field-input allInputs" id="${field.name}" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][value][${field.id}]" autocomplete="off">
                </div>
              </div>`
              );
            } else if (field.type === "radio" || field.type === "checkbox") {
              row.insertAdjacentHTML("beforeend",
                `<div class="col-md-3">
                <div class="" style="height: 39px;display: flex;align-items: center;margin-top: 24px;margin-bottom: 0;">
                  <label for="nom" class="mr-3" style="font-size: 20px;">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id : ''}">
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][value][${field.id}]" value="0">
                  <input type="${field.type}" class="allInputs" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][value][${field.id}]" value="1">
                </div>
              </div>`
              );
            } else if (field.type === "textarea") {
              row.insertAdjacentHTML("beforeend",
                `<div class="col-md-12">
                <div class="field">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id : ''}">
                  <textarea id="my-textarea" class="field-input allInputs" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][value][${field.id}]" rows="3"></textarea>
                </div>
              </div>`
              );
            } else if (field.type === "date") {
              row.insertAdjacentHTML("beforeend",
                `<div class="col-md-4">
                <div id="field" class="field has-label">
                  <label for="nom" class="field-label">${field.name}</label>
                  <input type="hidden" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][feature_id]${field.feature_id}" value="${fieldFeatureEqual ? field.feature_id : ''}">
                  <input id="my-select" type="date" class="field-input" name="feature[${fieldFeatureEqual ? field.feature_id : ''}][value][${field.id}]">
                </div>
              </div>`
              );
            }
          }
        });
      });
      this.$loading.style.display = "none"
      //field input HTML JQUERY
      $(document).ready(function () {
        $('.field-input').focus(function () {
          $(this).parent().addClass('is-focused has-label');
        });
        $('.field-input').blur(function () {
          if ($(this).val() == '') {
            $(this).parent().removeClass('has-label');
          }
          $(this).parent().removeClass('is-focused');
        });
        $('.field-input').each(function () {
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
    parentNodesXL.insertAdjacentHTML("beforeend",
      `<div class="card mb-4 deleteAll" style="border: 1px solid #5a5a5a;">
      <div class="card-header" style="background-color: #5a5a5a;color: white;display: flex;align-items: center;justify-content: space-between;">
        <span>Description de l'annonce</span><span class="displayOrder" style="font-size: 14px;font-weight: 100;color: #ffd44a">Champs obligatoire *</span>
      </div>
      <div class="card-body">
        <div class="row cl1ss">
          <div class="col-md-12">
              <textarea id="summernote" class="allInputs" name="description"></textarea>
              <style>
                .note-toolbar {
                    border-bottom: 1px solid #d6d6d6 !important;
                }
              </style>
            </div>
          </div>
        </div>
      </div>  `
    );
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      // height: 350, // set editor height
      // width: 350, // set editor width
      minHeight: 100, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      dialogsFade: true, // set fade on dialog
      prettifyHtml: false,
      toolbar: [
        // ['style', ['style']],
        ['font', ['bold', 'italic', 'underline']],
        // ['fontname', ['fontname']],
        // ['color', ['color']],
        ['para', ['ul', 'ol']],
        // ['height', ['height']],
        // ['table', ['table']],
        // ['insert', ['hr']],
        // ['view', ['fullscreen', 'codeview']],
        // ['help', ['help']]
      ]
    });
  }

  onChange(event) {
    this.$loading.style.display = "flex";
    let valuesExist = event.target.value === "" ? true : false;
    let alreadyCreate = document.querySelector(".fieldCreate");
    let allCards = document.querySelectorAll(".deleteAll");
    if (allCards.length !== 0) {
      if (alreadyCreate !== null) {
        //if selected another category delete the select created
        this.$select.parentNode.parentNode.parentNode.removeChild(alreadyCreate);
      }
      //if selected another category delete All Cards created before
      let allCards = document.querySelectorAll(".deleteAll");
      allCards.forEach(async function (deleteCard) {
        let tabPane = deleteCard.parentNode;
        tabPane.removeChild(deleteCard);
      });
    }
    if (valuesExist === false) {
      let request = fetch("http://localhost:8000/createAd/sub-category/" + event.target.value);
      request.then(res => {
        if (res.ok && res.status === 200) {
          res.json()
            .then(data => {
              if (data.feature.length !== 0) {
                this.loadNewForm(data, event);
              } else {
                this.$loading.style.display = "none"
              }
            });
        } else {
          console.log("Erroor");
        }
      })
    } else {
      this.$loading.style.display = "none"
    }
  }
}
let $selects = document.querySelector(".selectCategory");
let $load = document.querySelector("#loading");
new SelectedCategory($selects, $load);