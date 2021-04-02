@extends('layout.app')

@section('content')
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />

    <div class="container my-3">
        <div class="container choiseCategory px-0">
            <h2>Déposer une annonce </h2>
        </div>
        <div class="container postCard">
            <div class="row choiseCategory">
                <div id="smartwizard" class="sw sw-justified sw-theme-dots">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link inactive active" href="#step-1">
                                <strong>Step 1</strong> <br>This is step description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive done" href="#step-2">
                                <strong>Step 2</strong> <br>This is step description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive done" href="#step-3">
                                <strong>Step 3</strong> <br>This is step description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive" href="#step-4">
                                <strong>Step 4</strong> <br>This is step description
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabAutoGrow">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1"
                            style="position: static; left: auto; display: block;">
                            <div class="card mb-4" style="border: 1px solid #0086fb;">
                                <div class="card-header"  style="background-color: #0086fb;color: white;">
                                    Chosir la category
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="field" class="field">
                                                <label for="nom" class="field-label">Selection la category</label>
                                                <select id="my-select" class="field-input selectCategory" name="">
                                                    <option value=""></option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @foreach ($feature as $item)
                                <div class="card mb-4" style="border: 1px solid #0086fb;">
                                    <div class="card-header" style="background-color: #0086fb;color: white;"><span
                                            class="badge badge-danger">{{ $item->displayOrder }}</span> {{ $item->title }}
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($item->field as $fields)
                                                <div class="col-md-6">
                                                    <div id="field" class="field">
                                                        <label for="nom" class="field-label">{{ $fields->name }}</label>
                                                        <input type="{{ $fields->type }}" class="field-input" id=""
                                                            name="nom" autocomplete="off">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach --}}
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2" style="display: none;">
                            <h3>Step 2 Content</h3>
                            <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has survived
                                not
                                only five centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages,
                                and more recently with desktop publishing software like Aldus PageMaker including versions
                                of Lorem
                                Ipsum. </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3" style="display: none;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the

                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4" style="display: none;">
                            <h3>Step 4 Content</h3>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the

                        </div>
                    </div>
                    <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: center;">
                        {{-- <button class="btn sw-btn-prev disabled" type="button">Previous</button> --}}
                        <button class="btn sw-btn-next " disabled type="button">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection

@section('script')
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        $('#smartwizard').smartWizard({
            selected: 0, // Initial selected step, 0 = first step
            theme: 'dots', // theme for the wizard, related css need to include for other than default theme
            justified: true, // Nav menu justification. true/false
            darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
            autoAdjustHeight: true, // Automatically adjust content height
            cycleSteps: false, // Allows to cycle the navigation of steps
            backButtonSupport: true, // Enable the back button support
            enableURLhash: false, // Enable selection of the step based on url hash
            transition: {
                animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right, center
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: false, // Activates all anchors clickable all times
                markDoneStep: true, // Add done state on navigation
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
            keyboardSettings: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },
            lang: { // Language variables for button
                next: 'Next',
                previous: 'Previous'
            },
            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Highlight step with errors
            hiddenSteps: [] // Hidden steps
        });
        ///wizard
        $(document).ready(function() {
            $('.field-input').focus(function() {
                $(this).parent().addClass('is-focused has-label');
            });

            // à la perte du focus
            $('.field-input').blur(function() {
                $parent = $(this).parent();
                if ($(this).val() == '') {
                    $parent.removeClass('has-label');
                }
                $parent.removeClass('is-focused');
            });

            // si un champs est rempli on rajoute directement la class has-label
            $('.field-input').each(function() {
                if ($(this).val() != '') {
                    $(this).parent().addClass('has-label');
                }
            });
        });

        class SelectedCategory {
            constructor($select) {
                this.$select = $select;
                this.onChange = this.onChange.bind(this);
                this.$select.addEventListener('change', this.onChange);
            }
            onChange(e) {
                let alreadyCreate = document.querySelector(".fieldCreate");
                if (alreadyCreate === null) {
                    let forms = ` <div class="col-md-4 fieldCreate">
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
                            let parentNodes = this.$select.parentNode.parentNode.parentNode
                            let parentNodesXL = this.$select.parentNode.parentNode.parentNode.parentNode.parentElement.parentNodetryu8iu
                            parentNodes.insertAdjacentHTML("beforeend", forms)
                            document.querySelector(".tabAutoGrow").style.height = "auto"
                            this.field();
                            res.json()
                                .then(data => {
                                    data.subCategory.forEach(function(element) {
                                        document.querySelector(".select-" + e.target.value)
                                        .insertAdjacentHTML("beforeend",`<option value="${element.id}">${element.name}</option>`);
                                    });
                                    data.feature.forEach(async function(elms){
                                        await parentNodesXL.insertAdjacentHTML("beforeend",
                                        `<div class="card mb-4" style="border: 1px solid #0086fb;">
                                            <div class="card-header" style="background-color: #0086fb;color: white;">
                                                <span class="badge badge-danger">${elms.displayOrder}</span>${elms.title}
                                            </div>
                                            <div class="card-body">
                                                <div class="row cl1ss" data-featureID="${elms.id}">
                                                </div>
                                            </div>
                                        </div>`
                                        );
                                        await elms.field.forEach(async function(field){
                                            let allRows = document.querySelectorAll(".cl1ss");
                                            allRows.forEach(function(row){
                                                if(field.feature_id === parseInt(row.dataset.featureid)){
                                                row.insertAdjacentHTML("beforeend",
                                                `<div class="col-md-6">
                                                <div class="field">
                                                    <label for="nom" class="field-label">${field.name}</label>
                                                    <input type="${field.type}" class="field-input" id="" name="nom" autocomplete="off">
                                                </div>
                                            </div>`
                                                )}
                                            });
                                        });
                                    });
                                })
                        } else {
                            console.log("Erroor");
                        }
                    })
                } else {
                    this.$select.parentNode.parentNode.parentNode.removeChild(alreadyCreate);
                    let inputs = `<div class="field">
                                <label for="nom" class="field-label">Selection la category</label>
                                <select id="my-select" class="field-input controles" name="">
                                    <option value=""></option>
                                </select>
                            </div>`;
                    let cards = `<div class="card mb-4" style="border: 1px solid #0086fb;">
                                    <div class="card-header" style="background-color: #0086fb;color: white;">
                                        <span class="badge badge-danger">{{ $item->displayOrder }}</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row cl1ss">
                                        </div>
                                    </div>
                                </div>`;
                    let forms = ` <div class="col-md-4 fieldCreate">
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
                            let parentNodes = this.$select.parentNode.parentNode.parentNode
                            let parentNodesXL = this.$select.parentNode.parentNode.parentNode.parentNode.parentElement.parentNode
 
                            parentNodes.insertAdjacentHTML("beforeend", forms)
                            document.querySelector(".tabAutoGrow").style.height = "auto"
                            this.field();
                            res.json()
                                .then(data => {
                                    data.subCategory.forEach(function(element) {
                                        document.querySelector(".select-" + e.target.value)
                                            .insertAdjacentHTML("beforeend",
                                                `<option value="${element.id}">${element.name}</option>`
                                            );
                                    });
                                    data.feature.forEach(function(elms){
                                        parentNodesXL.insertAdjacentHTML("beforeend",cards)
                                        elms.field.forEach(function(field){
                                            let allRows = document.querySelectorAll(".cl1ss");
                                                allRows.forEach(function(row){
                                                    row.insertAdjacentHTML("beforeend",
                                                    `<div class="col-md-6">
                                                        <div class="field">
                                                            <label for="nom" class="field-label">Selection la category</label>
                                                            <select id="my-select" class="field-input controles" name="">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    `);
                                                });
                                            // field.insertAdjacentHTML("beforeend",inputs)
                                        })
                                    });
                                })
                        } else {
                            console.log("Erroor");
                        }
                    })
                }
            }
            field() {
                $(document).ready(function() {
                    $('.field-input').focus(function() {
                        $(this).parent().addClass('is-focused has-label');
                    });

                    // à la perte du focus
                    $('.field-input').blur(function() {
                        $parent = $(this).parent();
                        if ($(this).val() == '') {
                            $parent.removeClass('has-label');
                        }
                        $parent.removeClass('is-focused');
                    });

                    // si un champs est rempli on rajoute directement la class has-label
                    $('.field-input').each(function() {
                        if ($(this).val() != '') {
                            $(this).parent().addClass('has-label');
                        }
                    });
                });
            }
        }
        let $selects = document.querySelector(".selectCategory");
        new SelectedCategory($selects);

    </script>
@endsection
