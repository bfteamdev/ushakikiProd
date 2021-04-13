@extends('layout.app')

@section('content')
@section('style')
    <style>
        .drop-files__file {
            max-width: 189px !important;
        }
        .drop-files__file img {
            height: 166px !important;
        }
        a strong {
            font-size: 13px !important;
            color: #9e0433 !important;
            font-weight: bold !important;
            font-family: 'Arial Rounded MT';
        }

    </style>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"
        integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA=="
        crossorigin="anonymous" />
@endsection

<div class="container my-3">
    <div class="container choiseCategory px-0">
        <h2>Déposer une annonce </h2>
    </div>
    <div class="container postCard">
        <div class="row choiseCategory">
            <form action="{{ route('ad.storeAds') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="smartwizard" class="sw sw-justified sw-theme-dots">
                    <ul class="nav" style="margin-bottom: 15px;border-bottom: 1px solid #dadada;padding-bottom: 15px;">
                        <li class="nav-item">
                            <a class="nav-link inactive active" href="#step-1">
                                <strong>DÉTAILS DE L'ANNONCE</strong> <br>Description, prix et contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive done" href="#step-2">
                                <strong>PHOTOS</strong> <br>Télécharger des images limites a 5 MAX
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive done" href="#step-3">
                                <strong>PUBLIER</strong> <br>Placez votre annonce en ligne
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link inactive" href="#step-4">
                                <strong>Step 4</strong> <br>This is step description
                            </a>
                        </li> --}}
                    </ul>
                    <form method="post" action="{{ route('ad.storeAds') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content tabAutoGrow" style="height: auto">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1"
                                style="position: static; left: auto; display: block;">
                                <div class="card mb-4" style="border: 1px solid #5a5a5a;">
                                    <div class="card-header" style="background-color: #5a5a5a;color: white;">
                                        Chosir la category
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="field" class="field has-label">
                                                    <label for="nom" class="field-label">Selectionne la
                                                        sous-category</label>
                                                    <select id="my-select" class="field-input selectCategory"
                                                        autocomplete="off" aria-autocomplete="none">
                                                        <option value="">Selectionne la sous-category</option>
                                                        @foreach ($category as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="loading" class="loading">
                                    <img src="{{ asset('app-assets/images/loading.gif') }}" alt="loading image">
                                </div>
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2"
                                style="display: none;">
                                <div class="mb-3">
                                    <label class="col-form-label col-lg-12 text-lg-center"
                                        style="margin-left: 1px;margin-bottom: 20px;font-size: 1.2rem;font-weight: 600;color: #17a2b8;letter-spacing: 1px;">Multiple
                                        File
                                        Upload</label>
                                    <div class="col-lg-12 col-md-9 col-sm-12">
                                        <input type="file" multiple name="imagesAds[]" id="imagesAds"
                                            label="Drop files here or click to upload."
                                            help="Upload files here and they won't be sent immediately" is="drop-files"
                                            accept=".jpg,.png,.jpeg" />
                                    </div>
                                </div>
                            </div>
                            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"
                                style="display: none;">
                                <h1 style="font-size: 5rem">Merci d'avoir post sur USHAKIKI </h1>
                            </div>
                            {{-- <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4"
                                style="display: none;">
                                <h3>Step 4 Content</h3>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been
                                the

                            </div> --}}
                        </div>
                        <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: center;">
                            <button class="btn sw-btn-prev disabled" type="button">Previous</button>
                            <button class="btn btn-success nextStep" type="button"
                                style="margin: 0; padding: 8px 12px;">Valide</button>
                            <button class="btn sw-btn-next" disabled type="button"
                                style="display: none;">Suivant</button>
                            <button class="btn" id="submit" disabled type="submit"
                                style="background-color: #00a143!important;border:1px solid #00a143 !important; display:none;">Post
                                l'annonce</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
@endsection
@section('footer')
@include('layout.partials.include.footer')
@endsection

@section('script')
<!-- JavaScript -->
<script type="module" src="//unpkg.com/@grafikart/drop-files-element"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"
    integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A=="
    crossorigin="anonymous"></script>
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
    let nextStep = document.querySelector(".nextStep");
    let nextStepDisabled = document.querySelector(".sw-btn-next");
    let allInputs;
    let isOkay = [""];
    nextStep.addEventListener("click", function(e) {
        e.preventDefault()
        allInputs = document.querySelectorAll(".allInputs")
        isOkay = [""];
        allInputs.forEach((input) => {
            isOkay.push(input.value)
            if (input.value === "") {
                input.parentNode.classList.add("is-error-focused", "error");
            } else {
                isOkay.shift("")
                input.parentNode.classList.remove("is-error-focused", "error")
            }
        });
        // debugger;
        if (isOkay.includes("") === false) {
            nextStep.style.display = "none"
            nextStepDisabled.style.display = null
            nextStepDisabled.disabled = false
        } else {
            nextStep.style.display = null
            nextStepDisabled.style.display = "none"
            nextStepDisabled.disabled = true
        }
    });
    nextStepDisabled.addEventListener("click", function() {
        if (imagesAds["files"].length === 0) {
            nextStepDisabled.disabled = true;
        }
    })
    let imagesAds = document.querySelector("#imagesAds");
    let submitBtn = document.querySelector("#submit")
    imagesAds.addEventListener("change", function(e) {
        e.preventDefault()
        if (imagesAds["files"].length >= 1 && imagesAds["files"].length <= 5) {
            nextStepDisabled.style.display = null;
            nextStepDisabled.disabled = false;
            submitBtn.disabled = false;
            submitBtn.style.display = null;
        } else {
            nextStepDisabled.disabled = true
            submitBtn.disabled = true;
            submitBtn.style.display = "none";
        }
    });
    // let allStepTree = []
    // let stepTree = document.querySelectorAll(".stepTree");
    // nextStep.addEventListener("click", function(e) {
    //     e.preventDefault();
    //     allStepTree = []
    //     stepTree.forEach((step) => {
    //         allStepTree.push(step.value)
    //         if (allStepTree.includes("") === false) {
    //             // isOkay.shift("")
    //             submitBtn.disabled = true;
    //             submitBtn.style.display = null;
    //         } else {
    //             submitBtn.disabled = false;
    //             submitBtn.style.display = "none";
    //         }
    //     })
    // });
    //Form jquery
    $(document).ready(function() {
        $('.field-input').focus(function() {
            $(this).parent().addClass('is-focused has-label');
        });

        // à la perte du focus
        $('.field-input').blur(function() {
            if ($(this).val() == '') {
                $(this).parent().removeClass('has-label');
            }
            $(this).parent().removeClass('is-focused');
        });

        // si un champs est rempli on rajoute directement la class has-label
        $('.field-input').each(function() {
            if ($(this).val() != '') {
                $(this).parent().addClass('has-label');
            }
        });
        $('.stepTree').keyup(function() {
            if ($(this).val() == "") {
                $(this).parent().addClass('is-error-focused error');
                submitBtn.disabled = false;
                submitBtn.style.display = "none";
            } else {
                $(this).parent().removeClass('is-error-focused error');
            }
        });
    });

</script>
<script src="{{ asset('app-assets/js/createAds.js') }}"></script>
@endsection
