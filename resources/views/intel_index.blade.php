<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Remise en plus</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{cloudfrontUrl('images/favicon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{cloudfrontUrl('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{cloudfrontUrl('images/favicon-16x16.png')}}">
    <link rel="stylesheet" href="{{cloudfrontUrl('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{cloudfrontUrl('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500,700&display=swap" rel="stylesheet">

    @if(env('APP_ENV') == 'production')
        <!-- Matomo Tag Manager -->
        <script type="text/javascript">
            var _mtm = _mtm || [];
            _mtm.push({'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start'});
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src='https://cdn.matomo.cloud/aximpro.matomo.cloud/container_de4hzW8O.js'; s.parentNode.insertBefore(g,s);
        </script>
        <!-- End Matomo Tag Manager -->
    @endif
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-auto col-sm-5 logo-wrap">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{cloudfrontUrl('images/delltech-logo.svg')}}"
                                alt="DELL Technologies"></a>
                    </div>
                </div>
                <div class="col-auto col-sm-7 parter-logo-wrap">
                    <div class="partner-logos">
                        <ul>
                            <li class="intel-logo"><img src="{{cloudfrontUrl('images/intel-logo.svg')}}" alt="Intel">
                            </li>
                            <li class="ms-logo"><img src="{{cloudfrontUrl('images/ms-logo.svg')}}" alt="Microsoct"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="hero-banner" style="background-image: url('images/la-remise-en-banner.jpg')">
        <div class="container logos-container">
            <div class="row">
                <div class="col-12 partner-logos">
                    <ul>
                        <li class="ingram-logo"><img src="{{cloudfrontUrl('images/ingram-micro-logo.svg')}}"
                                alt="Ingram Micro"></li>
                        <li class="mca-logo"><img src="{{cloudfrontUrl('images/mca-technology.svg')}}"
                                alt="MCA Technology"></li>
                        <li class="tech-data-logo"><img src="{{cloudfrontUrl('images/tech-data.svg')}}" alt="Tech Data">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container hero-content-wrap">
            <div class="row">
                <div class="col-12 hero-content">
                    <h1>La Remise en</h1>
                    <p>Plus vous vendez,</p>
                    <p>Plus vous gagnez</p>
                    <button type="button" class="btn btn-primary btn-popup" data-toggle="modal"
                        data-target="#stepsModal"> Faites Votre Demande de Remboursement</button>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center discount-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Vous faites confiance à Dell EMC pour votre business et nous vous en sommes reconnaissant.</p>
                    <p>En ayant acheté des produits Dell EMC éligibles à ce programme, vous pouvez maintenant obtenir :
                    </p>
                    <h2>50€ par unité Dell Latitude, Dell Optiplex ou Dell Precision éligible</h2>
                    <p>dans la limite de 5 unités par mois.</p>
                    <button type="button" class="btn btn-primary btn-popup" data-toggle="modal"
                        data-target="#stepsModal">Faites
                        Votre Demande de Remboursement</button>
                    <p>Faites votre demande ci-contre pour bénéficier d'un remboursement par virement sur votre compte.
                    </p>
                    <a href="#howitworks" class="btn btn-secondary">Voir Comment Cela Fonctionne</a>
                    <a href="#faq" class="btn btn-secondary">FAQ</a>
                    <p>L'offre est valable jusqu'au 31.12.2019, donc n'hésitez pas à revenir le mois prochain.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="howitworks" class="howitworks">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Voici comment cela fonctionne</h2>
                    <ul class="howitworks-first">
                        <li><span class="round-block">&plus;</span>
                            <p>Achetez un produit éligible des gammes Dell Latitude, Optiplex ou Precision auprés de
                                l’un de nos distributeurs agrées en France.</p>
                        </li>
                        <li><span class="round-block">&plus;</span>
                            <p>Faites votre demande de remboursement en remplissant le formulaire sur ce site.</p>
                        </li>
                        <li><span class="round-block">&plus;</span>
                            <p>Téléchargez votre preuve d’achat.</p>
                        </li>
                    </ul>
                    <ul class="howitworks-second">
                        <li><span class="round-block">&plus;</span>
                            <p>Vous recevrez un accusé de reception de votre demande de remboursement.</p>
                        </li>
                        <li><span class="round-block">&plus;</span>
                            <p>Une fois votre demande validée, vous recevez un email de confirmation.</p>
                        </li>
                        <li><span class="round-block">&plus;</span>
                            <p>Sous 3 à 4 semaines, vous recevrez un virement sur le compte bancaire de votre société.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="faq" class="faq">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>FAQ</h2>
                    <div class="accordion" id="accordionFAQ">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Quels sont les produits éligibles à ce programme ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Il s’agit des produits des gammes Dell Latitude, Dell Optiplex et Dell Precisions
                                    identifiés par la mention
                                    « laremiseenplus » chez l’un de nos distributeurs agrées en France (Dell Authorized
                                    Distributor)

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Qui sont les distributeurs agrées ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Il s’agit des entités françaises de Ingram Micro, Tech Data et MCA.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Comment dois-je faire ma demande de remboursement pour bénéficier de ce
                                        programme ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Vous effectuez votre demande de remboursement en remplissant le formulaire sur le site laremiseenplus.com, dans les 21 jours qui suivent la facturation de votre achat de produits éligibles
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Quelles informations dois-je fournir ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Vos coordonnées de contacts et celles de votre entreprise, votre preuve d’achat des
                                    unités éligibles ainsi que l’IBAN de votre société
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Qu’est-ce qu’une preuve d’achat ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Vous devrez télécharger une copie électronique de la facture d’achat des unités
                                    éligibles chez l’un de nos distributeurs agrées, dont l’achat a été effectué durant
                                    la période de promotion et dans les 21 jours suivant cet achat.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Combien puis-je obtenir en remboursement ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Votre remboursement est de 50€ par unité éligible, dans la limite de 5 unités,
                                    soient 250€ au total par mois calendaire.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        Combien de demandes de remboursement puis-je faire ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Vous pouvez soumettre plusieurs demandes, dans la limite de 5 unités remboursables
                                    par mois calendaire.
                                    Vous pouvez soumettre de nouvelles demandes jusqu’à hauteur de 5 unités le mois
                                    suivant, dans les limites de la période de promotion.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        Ma facture d’achat contient plusieurs produits.
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Pas de souci, nous ne retiendrons que les produits éligibles pour votre demande de
                                    remboursement.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingNine">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        Quand recevrais-je mon remboursement ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Votre demande et le virement bancaire seront traités dans un délai de 3 à 4
                                    semaines,
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        Comment suis-je remboursé ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Vous recevrez un virement bancaire sur le compte de société dont vous nous aurez
                                    fourni l’Iban au moment de votre demande de remboursement.
                                    Vous recevrez également par mail une note de crédit justifiant de ce remboursement.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEleven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseEleven" aria-expanded="false"
                                        aria-controls="collapseEleven">
                                        Le remboursement est-il en HT ou TTC ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    L'offre promotionnelle doit être comprise comme "taxes incluses". Dans le cas où la
                                    promotion constituerait un bénéfice imposable, toute charge fiscale sera à la charge
                                    du bénéficiaire du remboursement.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwelve">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwelve" aria-expanded="false"
                                        aria-controls="collapseTwelve">
                                        Que se passe t’il si je ne reçoit pas mon remboursement ?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                                data-parent="#accordionFAQ">
                                <div class="card-body">
                                    Si vous avez toute question concernant ce programme ou votre paiement, vous pouvez contacter <a href="mailto:contact@laremiseenplus.com" target="__blank"> contact@laremiseenplus.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><a href="{{url('/terms-and-conditions')}}">Conditions générales</a></li>
                        <li><a href="https://www.dell.com/learn/fr/fr/frcorp1/policies-privacy#pc2"
                            target="_blank">Politique de confidentialité</a></li>
                        <li><a href="{{url('/legal-notice')}}">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade laremise-modal" id="stepsModal" tabindex="-1" role="dialog" aria-labelledby="stepsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close stepClose" data-dismiss="modal" aria-label="Close" id="thanksclose">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">

                    <main class="content" role="content">
                        <!-- MultiStep Form -->
                        <form id="regForm" action="{{url('offer-claim') }}" method="POST"
                            enctype="multipart/form-data">
                            {{-- <form id="regForm" action="" method="POST" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="steps-wrap">
                                <span class="step">1</span>
                                <span class="step">2</span>
                                <span class="step">3</span>
                                <span class="step">4</span>
                                <span class="step">5</span>
                            </div>
                            <!-- contact tab -->
                            <div class="tab">
                                <h3>Vos coordonnées de contact</h3>
                                <p>Afin de pouvoir vous informer par mail de l'avancée de votre demande</p>
                                <div class="form-group">
                                    <label class="control-label" for="first_name">Prénom *</label>
                                    <input required="required" class="form-control" type="text" name="first_name"
                                        id="first_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="last_name">Nom *</label>
                                    <input required="required" class="form-control" type="text" name="last_name"
                                        id="last_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email *</label>
                                    <input required="required" class="form-control" type="email" name="email"
                                        id="email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="confirm_email">Confirmez votre e-mail *</label>
                                    <input required="required" class="form-control" type="email" name="confirm_email"
                                        id="confirm_email">
                                </div>
                            </div>
                            <!-- society tab -->
                            <div class="tab">
                                <h3>Votre entreprise</h3>
                                <p>Coordonnées de la société bénéficiaire de la demande</p>
                                <div class="form-group">
                                    <label class="control-label" for="address1">Adresse *</label>
                                    <input required="required" class="form-control" type="text" name="address1"
                                        id="address1">
                                </div>
                                <div class="form-group" for="address2">
                                    <label class="control-label">Adresse 2 </label>
                                    <input required="required" class="form-control" type="text" name="address2"
                                        id="address2">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="postal_code">Code postal *</label>
                                    <input required="required" class="form-control" type="text" name="postal_code"
                                        id="postal_code">
                                </div>
                                <div class="form-group" for="city">
                                    <label class="control-label">Ville *</label>
                                    <input required="required" class="form-control" type="text" name="city" id="city">
                                </div>
                                <div class="form-group" for="vat_no">
                                    <label class="control-label">No de TVA intra Communautaire *</label>
                                    <input required="required" class="form-control" type="text" name="vat_no"
                                        id="vat_no">
                                </div>
                                <div class="form-group radio-group">
                                    <label class="control-label">Etes vous enregistré au Partner Program de Dell ? * (Partner direct)</label>
                                    <label>(Il n’est pas nécessaire d’être affilié au Partner Program pour bénéficier de cette offre de remboursement.)</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="is_dell_partner" value="1"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Oui</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="is_dell_partner" value="0"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Non</label>
                                    </div>
                                </div>
                            </div>
                            <!-- proof tab -->
                            <div class="tab">
                                <h3>Votre preuve d'achat</h3>
                                <p>Facture émanant d'un distributeur Dell agrée et contenant les unités
                                    qui font l'objet de votre demande de remboursement</p>
                                <span class="custom-file-title">Téléchargez votre preuve d'achat</span>
                                <div class="form-group custom-file">

                                    <input type="file" class="custom-file-input" id="customFile" name="invoice[]"
                                        multiple>
                                    <label class="custom-file-label" for="customFile">Upload</label>
                                    <span class="upload-format">Formats jpg, jpeg, png, gif, pdf Taille maximale de
                                        fichier 5Mo</span>
                                    <span><i>Vous pouvez télécharger plusieurs fichiers</i></span>
                                    <span class="error-message upload-invoice-error"></span>
                                    <div class="filename"></div>
                                </div>
                            </div>
                            <!-- Benificary tab -->
                            <div class="tab">
                                <h3>Co-ordonnées bancaires</h3>
                                <p>Compte de la société bénéficiaire du remboursement </p>
                                <div class="form-group">
                                    <label class="control-label" for="acc_owner">Titulaire du compte *</label>
                                    <input required="required" class="form-control" type="text" name="acc_owner"
                                        id="acc_owner">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="iban">IBAN/SWIFT *</label>
                                    <input required="required" class="form-control" type="text" name="iban" id="iban">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="bank_name">Nom de le banque *</label>
                                    <input required="required" class="form-control" type="text" name="bank_name"
                                        id="bank_name">
                                </div>
                            </div>
                            <!-- Almost there tab -->
                            <div class="tab">
                                <h3>Vous y êtes presque </h3>
                                <p>Afin de finaliser votre demande, veuillez valider les points ci-dessous :</p>
                                <div class="form-group checkbox-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="conditionCheck"
                                            name="terms" value="0">
                                        <label class="custom-control-label" for="conditionCheck">Je certifie avoir pris
                                            connaissance des <a href="{{url('terms-and-conditions')}}"
                                                target="__blank">Conditions d'utilisation</a> de cette offre.
                                            *</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacyCheck"
                                            name="privacy" value="0">
                                        <label class="custom-control-label" for="privacyCheck">Je confirme avoir lu et
                                            compris les informations sur la
                                            <a href="https://www.dell.com/learn/fr/fr/frcorp1/policies-privacy#pc2"
                                                target="__blank">politique de confidentialité</a> de Dell. *</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="acceptCheck"
                                            name="permission_to_contact" value="0">
                                        <label class="custom-control-label" for="acceptCheck">J'accepte d'être
                                            contacté(e) par Dell dans le cadre de ce programme.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab final-tab">
                                <div id="loader"></div>
                            </div>
                            <div class="buttons">
                                <button type="button" id="prevBtn" class="btn btn-secondary"
                                    onclick="nextPrev(-1)">Précédent</button>
                                <button type="button" id="nextBtn" class="btn btn-primary"
                                    onclick="nextPrev(1)">Suivant</button>
                                <button type="button" id="submitBtn" class="btn btn-primary submitBtn"
                                    style="display:none;" onclick="nextPrev(1)">Valider</button>
                            </div>
                        </form>
                    </main> <!-- /content -->
                </div>
            </div>
        </div>
    </div>

    {{-- thank you pop up --}}
    <div class="modal fade laremise-modal" id="thanksModal" tabindex="-1" role="dialog"
        aria-labelledby="stepsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <main class="content" role="content">
                        <div class="tab" style="display: block;">
                            <h3>Merci ! <br>
                                Votre demande est enregistrée. </h3>
                            <p>Vous allez recevoir un accusé de réception par email.</p>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    {{-- loader animation --}}
    <style>
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #eeeeee;
            border-radius: 50%;
            border-top: 16px solid #0076ce;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        @if(session()->has('submitted'))
            var json = "{!! json_encode(session()->get('submitted')) !!}";
            var status = JSON.parse(json);
            if(status == "true")
            {
                $('#thanksModal').modal('show');
                {{ session()->put('submitted',false) }};
            }
        @endif

    </script>
    <script>
        $(document).ready(function () {
            //anchor for hash
            $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (t) {
                if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location
                    .hostname == this.hostname) {
                    var e = $(this.hash);
                    e = e.length ? e : $("[name=" + this.hash.slice(1) + "]"), e.length && (t
                        .preventDefault(), $("html, body").animate({
                            scrollTop: e.offset().top
                        }, function () {
                            var t = $(e);
                            if (t.focus(), t.is(":focus")) return !1;
                            t.attr("tabindex", "-1"), t.focus()
                        }))
                }
            });
        });

        $("input[name='is_dell_partner']").click(function (event){
            $(this).closest('.form-group').find('input').removeClass('invalid');
        });

        $("input").keypress(function(){
            $(this).removeClass('invalid');
        });

        $("input").change(function(){
            $(this).removeClass('invalid');
        });

        $('.btn-popup').click(function (event) {
            event.preventDefault();
            var target = $(this).data('target');
            // console.log('#'+target);
            $('#click-alert').html('data-target= ' + target).fadeIn(50).delay(3000).fadeOut(1000);

        });

        // Multi-Step Form
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("submitBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "inline";
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length-3)) {
                document.getElementById("submitBtn").style.display = "inline";
                document.getElementById("nextBtn").style.display = "none";
            } else {
                document.getElementById("nextBtn").innerHTML = "Suivant";
            }

            //hide next and previous btn on thank you pop up
            if (n > (x.length-3)) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "none";
            }

            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:

            document.getElementById("regForm").submit();
            return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            var address2 = document.getElementById("address2");
            var yes = document.getElementById("customRadio1");
            var no = document.getElementById("customRadio2");


            // A loop that checks every input field in the current tab:
            if(currentTab != 4 && currentTab != 1)
            {
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        y[i].classList.remove('invalid');
                        // add an "invalid" class to the field:
                        y[i].classList.add('invalid');
                        // and set the current valid status to false
                        valid = false;
                    }
                }
            }   
            if(currentTab == 0) {
                if(valid){
                    var email = $("input[name='email']");
                    var confirm_email = $("input[name='confirm_email']");
                    email_value = email.val();
                    confirm_email_value = confirm_email.val();
                    if(validateEmail(email_value)){
                        if(validateEmail(confirm_email_value)){
                            if(email_value != confirm_email_value){
                                email.addClass('invalid');
                                confirm_email.addClass('invalid');
                                valid = false;
                            }
                        }else{
                            confirm_email.addClass('invalid');
                            valid = false;
                        }
                    }else{
                        if(!validateEmail(confirm_email_value))
                        email.addClass('invalid');
                        confirm_email.addClass('invalid');
                        valid = false;
                    }
                }
            }

            var radioFlag = false;
            if(currentTab == 1){
                for (i = 0; i < y.length; i++) {
                    if(y[i] != address2  ){
                        // If a field is empty...
                        if (y[i].value == "" ) {
                            y[i].classList.remove('invalid');
                            // add an "invalid" class to the field:
                            y[i].classList.add('invalid');
                            // and set the current valid status to false
                            valid = false;
                        }else if(y[i].checked ){
                            radioFlag = true;
                        }
                        
                        if(y[i].name == 'is_dell_partner'){
                            if(yes.checked || no.checked){
                                yes.classList.remove('invalid');
                                no.classList.remove('invalid');
                                
                            }else{
                                if(!radioFlag){
                                    y[i].classList.remove('invalid');
                                    // add an "invalid" class to the field:
                                    y[i].classList.add('invalid');
                                    valid = false;
                                }
                            }
                        }
                    }
                }
            }

            if(currentTab == 2 ){
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        y[i].classList.remove('invalid');
                        // add an "invalid" class to the field:
                        y[i].classList.add('invalid');
                        $('.upload-invoice-error').html('Please upload a file.');
                        // and set the current valid status to false
                        valid = false;
                    }
                }
            } 
            if(currentTab == 4){
                for (i = 0; i < y.length-1; i++) {
                    // If a field is empty...
                    if (y[i].value == 0) {
                        y[i].classList.remove('invalid');
                        // add an "invalid" class to the field:
                        y[i].classList.add('invalid');
                        // and set the current valid status to false
                        valid = false;
                    }
                }
                if(valid){
                    $('#stepsModal').find('.steps-wrap').hide();
                    $('#stepsModal').find('.buttons').hide();
                    $('#stepsModal').find('.stepClose').hide();
                    $('#regForm').submit();
                }
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].classList.remove('finish');
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i,j, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //remove finish class 
            for (j=n; j<x.length; j++){
                x[j].className = x[j].className.replace("finish", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function validateEmail(email){
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        $('input[type="file"]').change(function(){
            var imageSizeArr = 0;
            var images = document.getElementById('customFile');
            var imageCount = images.files.length;

            $('.custom-file-input').removeClass('invalid');
            $('.error-message').html('');
            $('.filename').html('');

            for (var i = 0; i < imageCount ; i++){
                var image = images.files[i].name;
                var ext = image.substring(image.lastIndexOf('.')+1);
                if(ext == "jpg" || ext == "JPG" || ext == "JPEG" || ext == "jpeg" || ext == "png" || ext == "gif" || ext == "GIF" || ext == "pdf" || ext == "PDF" || ext=="PNG" ){
                    var imageSizeArr = 0;
                }else{
                    var imageSizeArr = 1;
                    var message = "Invalid file format";
                    break;
                }
                var imageSize = images.files[i].size;

                if (imageSize > 5242880) {
                    var imageSizeArr = 1;
                    var message = "File size should be less than 5 mb";
                    break;
                }
                
                $('.filename').append("<span style='color:#ce1126'>"+image+"</span>");
            }
            if(imageSizeArr == 1){
                $('.custom-file-input').addClass('invalid');
                $('.custom-file-input').val('');
                $('.filename').html('');
                $('.error-message').html(message);
                return false;
            }else{
                return true;
            }
        }); 

        $('#conditionCheck').on('change', function () {
            this.value = this.checked ? 1 : 0;
        });

        $('#privacyCheck').on('change', function () {
            this.value = this.checked ? 1 : 0;
        });

        $('#acceptCheck').on('change', function () {
            this.value = this.checked ? 1 : 0;
        });

    </script>
</body>

</html>