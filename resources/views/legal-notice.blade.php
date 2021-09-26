@extends('layouts.header')
@section('content')

    <section class="hero-banner inner-banner">
        <div class="container logos-container">
            <div class="row">
                <div class="col-12 partner-logos">
                    <ul>
                        <li class="ingram-logo"><img src="{{cloudfrontUrl('images/ingram-micro-logo.svg')}}" alt="Ingram Micro"></li>
                        <li class="mca-logo"><img src="{{cloudfrontUrl('images/mca-tech.jpg')}}" alt="MCA Technology"></li>
                        <li class="tech-data-logo"><img src="{{cloudfrontUrl('images/tech-data.svg')}}" alt="Tech Data"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Mentions légales</h2>
                    <p>Les informations suivantes concernent les activités commerciales de Dell S.A.</p>
                    <div class="format-type">
                        <p>Dell S.A</p>
                        <p>Capital 1 782 769 €
                        <br>Siège Social
                        <br>1 rond-point Benjamin Franklin
                        <br>34000 Montpellier. France.
                        <br>N° 351 528 229 RCS Montpellier –APE 4651Z.</p>
                        <p><a href="https://www.dell.fr" target="_blank">www.dell.fr</a></p>
                        <br>
                        <p>Les informations suivantes concernent les activités commerciales de Aximpro GmbH</p>
                    </div>
                    <div class="format-type">
                        <h3>Aximpro Deutschland GmbH</h3>
                        <p>Gute Änger 11-15 <br>
                        85356 Freising <br>
                        Allemagne</p>
                        <p><a href="https://www.aximpro.com" target="_blank">www.aximpro.com</a></p>
                    </div>
                    <div class="format-type">
                        <h3>Contact Information</h3>
                        <p>Téléphone: +49 8161 2499 100 <br>
                            Téléfax: +49 8161 2499 139 <br>
                            Email: <a href="mailto:info@aximpro.com" target="_blank">info@aximpro.com</a> <br>
                            Website: <a href="https://www.aximpro.com" target="_blank">www.aximpro.com</a></p>
                    </div>
                    <div class="format-type format-represent">
                        <p>Gérant habilité à représenter la société : Andreas Ried, Dirk Thum</p>
                        <p>Siège de la société : Freising</p>
                        <p>Cour de justice : Tribunal d'instance de Munich HRB 177075</p>
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
                        <li><a href="https://www.dell.com/learn/fr/fr/frcorp1/policies-privacy#pc2" target="_blank">Politique de confidentialité</a></li>
                        <li><a href="{{url('/legal-notice')}}">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
@endsection
