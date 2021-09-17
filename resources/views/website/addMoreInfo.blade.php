@extends('layout.app')

@section('content')
@section('style')
    <style rel="preload" as="style">
        .drop-files__file {
            max-width: 189px !important;
            object-fit: contain;
            border: 1px solid #dcdcdc;
            padding: 4px;
            border-radius: 10px;
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

        .h2Step {
            font-size: 1.7rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

    </style>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" rel="preload" as="style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"
        integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA=="
        crossorigin="anonymous" rel="preload" as="style" />
@endsection

<div class="container my-3">
    <div class="container choiseCategory px-0">
        <h2>Déposer une annonce </h2>
    </div>
    <div class="container postCard">
        <div class="row choiseCategory">
            <form action="{{ route('ad.storeAds') }}" method="post" enctype="multipart/form-data" id="form"
                data-defaultLink="{{ route('site.index') }}">
                @csrf
                @method("POST")
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <div id="smartwizard" class="sw sw-justified sw-theme-dots">
                    <ul class="nav"
                        style="margin-bottom: 15px;border-bottom: 1px solid #dadada;padding-bottom: 15px;">
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
                                                        autocomplete="off" aria-autocomplete="none" name="category_id">
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
                                <div class="row">
                                    <div class="col-lg-6 border-right">
                                        <h4 class="h2Step text-center">Information sur le client</h4>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="field {{ Auth::user()->firstName ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Nom *</label>
                                                    <input type="text"
                                                        class="field-input {{ Auth::user()->firstName ? '' : 'stepTree' }}"
                                                        name="user[firstName]" autocomplete="off"
                                                        value="{{ Auth::user()->firstName ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="field {{ Auth::user()->lastName ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Prenom *</label>
                                                    <input type="text"
                                                        class="field-input {{ Auth::user()->lastName ? '' : 'stepTree' }}"
                                                        name="user[lastName]" autocomplete="off"
                                                        value="{{ Auth::user()->lastName ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="field {{ Auth::user()->username ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Username *</label>
                                                    <input type="text"
                                                        class="field-input {{ Auth::user()->username ? '' : 'stepTree' }}"
                                                        name="user[username]" autocomplete="off"
                                                        value="{{ Auth::user()->username ?? '' }}"
                                                        {{ Auth::user()->email ? 'disabled' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="field {{ Auth::user()->email ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Email *</label>
                                                    <input type="text"
                                                        class="field-input {{ Auth::user()->email ? '' : 'stepTree' }}"
                                                        name="user[email]" autocomplete="off"
                                                        value="{{ Auth::user()->email ?? '' }}"
                                                        {{ Auth::user()->email ? 'disabled' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="field {{ Auth::user()->phone ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Numero de telephone
                                                        *</label>
                                                    <input type="text"
                                                        class="field-input {{ Auth::user()->phone ? '' : 'stepTree' }}"
                                                        name="user[phone]" autocomplete="off"
                                                        value="{{ Auth::user()->phone ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="fol-lg-12">
                                                <div
                                                    class="field {{ Auth::user()->organisation ? 'has-label' : '' }}">
                                                    <label for="nom" class="field-label">Organisation</label>
                                                    <input type="text" class="field-input" name="user[organisation]"
                                                        autocomplete="off"
                                                        value="{{ Auth::user()->organisation ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="h2Step text-center">Delai de votre annonce</h4>
                                        <div class="row mb-4"
                                            style="display: flex;justify-content: center;align-items: center;margin-top: 20px;">
                                            <div class="p-3">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        @foreach ($priceDays as $key => $value)
                                                            <tr align="center">
                                                                <td style="font-size: 1.2rem;" scope="row"
                                                                    class="{{ $key === 30 ? 'border-bottom-0' : '' }} border-right">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="expired_at"
                                                                        id="expired{{ $key }}"
                                                                        value="{{ $key }}"
                                                                        {{ $key === 7 ? 'checked' : '' }}>
                                                                    <label class="form-check-label ml-3"
                                                                        for="expired{{ $key }}">
                                                                        {{ $key }} Jours
                                                                    </label>
                                                                </td>
                                                                <th style="font-size: 1.2rem;"
                                                                    class="{{ $key === 30 ? 'border-bottom-0' : '' }}">
                                                                    {{ number_format($value) }}&nbsp;Fbu</th>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @if ($group->price > 0)
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4"
                                    style="display: none;">
                                    <h3>Step 4 Content</h3>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum
                                    has
                                    been
                                    the

                                </div>
                            @endif --}}
                        </div>
                        <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: center;">
                            <button class="btn sw-btn-prev disabled" type="button">Previous</button>
                            <button class="btn nextStep" type="button"
                                style="margin: 0; padding: 8px 12px;color: #fff;background-color: #17a2b8;border: 1px solid #17a2b8;padding: .375rem .75rem;border-radius: .25rem;font-weight: 400;">Valide</button>

                            <button class="btn sw-btn-next" disabled type="button"
                                style="display: none;">Suivant</button>
                            <button class="btn" id="submit" type="submit"
                                style="background-color: #00a143!important;border:1px solid #00a143 !important; display:none;">Post
                                l'annonce</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"
rel="preload" as="script">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"
rel="preload" as="script">
</script>
@endsection
@section('footer')
@include('layout.partials.include.footer')
@endsection

@section('script')
<!-- JavaScript -->

<script src="{{ asset('app-assets/js/grafkart.js') }}" rel="preload" as="script" type="module"></script>
{{-- <script type="module" src="//unpkg.com/@grafikart/drop-files-element" rel="preload" as="script"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"
rel="preload" as="script">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"
integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A=="
crossorigin="anonymous" rel="preload" as="script"></script>
<script type="text/javascript" rel="preload" as="script">
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
            animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
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
            keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
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
    let loading = document.querySelector("#loading");
    let nextStepDisabled = document.querySelector(".sw-btn-next");
    let imagesAds = document.querySelector("#imagesAds");
    let endStep = document.querySelectorAll(".endStep");
    let submitBtn = document.querySelector("#submit")
    let payment = document.querySelector("#payment")
    let stepTree = document.querySelectorAll(".stepTree");
    let form = document.querySelector("#form")

    let allInputs;
    let isOkay = [""];
    nextStep.addEventListener("click", function(e) {
        loading.style.display = "flex"
        e.preventDefault()
        allInputs = document.querySelectorAll(".allInputs")
        isOkay = [""];
        allInputs.forEach((input) => {
            isOkay.push(input.value)
            if (input.value === "") {
                input.parentNode.classList.add("is-error-focused", "error");
                setTimeout(() => {
                    loading.style.display = "none"
                }, 1000);
            } else {
                isOkay.shift("")
                input.parentNode.classList.remove("is-error-focused", "error")
                setTimeout(() => {
                    loading.style.display = "none"
                }, 1000);
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
    imagesAds.addEventListener("change", function(e) {
        e.preventDefault()
        if (payment) {
            if (imagesAds["files"].length >= 1 && imagesAds["files"].length <= 5) {
                nextStepDisabled.style.display = null;
                nextStepDisabled.disabled = false;
            }
        } else {
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
        }
    });

    let allStepTree = []
    form.addEventListener("submit", function(e) {
        allStepTree = []
        stepTree.forEach((step) => {
            allStepTree.push(step.value)
            if (allStepTree.includes("") === true) {
                e.preventDefault();
                step.parentNode.classList.add("is-error-focused", "error");
                // isOkay.shift("")
            } else {
                e.currentTarget.click();
            }
        })
    });
</script>
<script src="{{ asset('app-assets/js/createAds.js') }}" rel="preload" as="script"></script>
@endsection
