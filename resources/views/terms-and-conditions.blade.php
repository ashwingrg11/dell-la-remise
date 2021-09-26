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
                    <h2>CONDITIONS GENERALES DU PROGRAMME « La Remise en Plus »</h2>
                    <div class="format-type">
                        <p>La promotion et les services fournis par Dell tels que décrits ici dans le cadre du Programme «La remise en Plus » (« le Programme») sont soumis aux conditions générales suivantes ("CG").Dell se réserve le droit de modifier les présentes conditions générales à tout moment et sans préavis. Vous pouvez accéder à la version la plus récente des conditions générales du Programme en cliquant sur le lien hypertexte "Conditions générales" situé au bas des pages du site <a href="https://www.laremiseenplus.com" target="_blank">www.laremiseenplus.com</a>. Votre participation à ce Programme vaut acceptation sans réserve des CG suivantes.</p>
                    </div>

                    <div class="format-type">
                        <h3>UTILISATION ILLICITE OU INTERDITE</h3>
                        <p>Pour pouvoir utiliser les services et les informations de cette promotion, vous devez vous conformer à un usage non illicite ou interdit, conformément aux présentes CG et aux
                        conditions du contrat qui vous lie à DELL. Vous vous engagez à ne pas tenter d'obtenir un accès non autorisé à un service, à des comptes d’’utilisateurs autres que le vôtre, à des systèmes informatiques ou à des réseaux connectés, à un serveur Dell, en  un piratage de logiciel, une récupération de mot de passe ou tout autre moyen. Vous vous engagez à ne pas obtenir ou essayer d’obtenir du matériel ou des informations par  d'autres moyens que ceux fournis dans le cadre de votre relation commerciale avec Dell et ses distributeurs agréés. </p>
                    </div>
                    <div class="format-type">
                        <h3>DESCRIPTION ET CONDITIONS DE LA PROMOTION</h3>
                        <p>La promotion "laremiseenplus" est réservée aux achats de produits de la gamme /des gammes Dell Latitude , Dell Optiplex, Dell Precision et Dell Vostro, ainsi que de serveurs et écrans Dell éligibles effectués pendant la période de promotion par des revendeurs éligibles auprès de l’un des grossistes agréés (‘Dell Technologies Authorized Distributor ») en France.</p>
                        <p>La période de promotion s’entend du 16.08.2021 au 12.09.2021 inclus et jusqu'à ce que le budget soit disponible. La promotion est réservée aux revendeurs agréés de DELL inscrits aux registres du commerce en France. – Seuls les produits DELL en stock, identifiés par la mention, "laremiseenplus" et présents dans les entrepôts des distributeurs sont éligibles à la promotion. 
                        </p>
                        <h3>Remboursement:</h3>
                        <p>
                            <span class="dot">.</span> 50 € pour chaque unité Dell Latitude , Dell OptiPlex, Dell Precision et Dell Vostro éligible achetée au cours de la période de promotion.
                        </p>
                        <p>
                            <span class="dot">.</span> Jusqu’à 70 € de Cashback revendeur par serveur Dell éligible
                        </p>
                        <p>
                          <span class="dot">.</span> Jusqu’à 35 € de Cashback revendeur par écran Dell éligible
                        </p>
                        <p>L'offre est destinée à l'achat d'un minimum de 1 à 5 unités par revendeur éligible et par mois calendaire (si plusieurs sites / adresses / magasins, la limite de 5 unités achetées s'applique à tous les sites); </p>
                        <h3>Objet:</h3>
                        <p>Les revendeurs éligibles peuvent demander un remboursement de 50€ par Poste Client (sur les gammes Latitude, Optiplex, Precision et Vostro éligibles), jusqu’à 70€ par serveur Dell éligible et jusqu’à 35€ par écran Dell éligible.</p>
                        <p>Ce remboursement ne s'applique qu'à l'achat d'un maximum de 5 appareils dans les configurations éligibles par mois calendaire et dans chaque catégorie au cours de la période de promotion.</p>
                       @include('microsoft_servers_list')
                    </div>
                    <div class="format-type format-list">
                        <h3>Pour profiter de la promotion, les partenaires revendeurs éligibles doivent:</h3>
                        <ul>
                            <li>Remplir le formulaire de demande de remboursement et accepter les présentes
                                conditions générales (CG). Les informations personnelles demandées dans les champs
                                obligatoires doivent être correctement renseignées lors de votre inscription.</li>
                            <li>Fournir une preuve d'achat (facture numérisée correspondante) indiquant clairement et sans ambiguïté qu'un achat de produit(s) éligible(s) a été facturé durant la période de promotion.</li>
                            <li>La promotion est valable sur certains produits achetés auprès de Dell ou de l’un des distributeurs [grossistes] agréés au cours de la période de promotion.</li>
                            <li>Cette promotion est réservée aux revendeurs inscrits aux registres du commerce en France se fournissant auprès d’un grossistes agréé (‘Dell Technologies Authorized Distributor ») en France.</li>
                            <li>Une fois que la /les factures d'achat des produits susmentionnés sélectionnés pour la promotion a été correctement chargée et transmise, le participant recevra par courrier électronique de <a href="mailto:contact@laremiseenplus.com" target="__blank"> contact@laremiseenplus.com</a> une confirmation indiquant si la demande de
                            remboursement a été acceptée ou non. Il appartient au participant de contacter
                            <a href="mailto:contact@laremiseenplus.com" target="__blank"> contact@laremiseenplus.com</a> dans les sept jours ouvrés suivant l'envoi de la demande, si un e-mail de confirmation de réception n'a pas été reçu. Il incombe également au participant de vérifier en même temps que toutes les données personnelles nécessaires à l’exécution du
                            remboursement ont été fournies. Dell peut exiger des preuves supplémentaires à tout
                            moment et à sa seule discrétion pour démontrer que la société qui a soumis la facture
                            est le titulaire du compte bancaire indiqué, même si celle-ci requiert que les coordonnées bancaires soient mentionnées sur le papier d'entête et envoyées par une adresse e-mail officielle de la société qui a acheté le produit éligible. Toute demande de remboursement suspecte sera considérée comme nulle et non avenue.</li>
                            <li>Le remboursement sera effectué par virement bancaire sous 3 à 4 semaines en moyenne.</li>
                            <li>L'offre promotionnelle doit être comprise comme "taxes incluses". Dans le cas où la
                            promotion constituerait un bénéfice imposable, toute charge fiscale sera à la charge du
                            bénéficiaire du remboursement.</li>
                            <li>Dell se réserve le droit de surveiller l'utilisation de son site promotionnel, y compris les adresses IP des demandeurs, afin qu'ils puissent identifier les abus et disqualifier les demandes s'ils ont des raisons légitimes de croire que les conditions de l’offre ont été violées.</li>
                            <li>Toutes ces instructions font partie des conditions générales à respecter. Les
                            remboursements ne peuvent être effectués que si le participant remplit toutes ces
                            conditions générales. En soumettant leur candidature, les participants confirment qu'ils acceptent les présentes conditions générales.</li>
                            <li>Si la facture autorisant la participation à cette promotion est annulée et/ou si le
                            produit concerné fait l’objet d’un retour auprés du distributeur après le dépôt de la
                            demande de remboursement, le participant aura perdu ses droits.</li>
                            <li>En cas de remplacement d'un produit pendant la période de demande de remboursement,la demande initiale sera annulée et une nouvelle demande devra être soumise sur la base de la commande de remplacement.</li>
                            <li>Pour toute question relative au statut d'une demande de remboursement, vous pouvez
                            envoyer un courrier électronique à: <a href="mailto:contact@laremiseenplus.com" target="__blank"> contact@laremiseenplus.com</a>. La participation à cette promotion ne peut être accordée à un participant qui:
                                <ul class="list-alphabet">
                                    <li>n'a pas acheté le minimum requis de Produits Dell sélectionnés au cours de la période de promotion; et / ou</li>
                                    <li>n'a pas fourni la facture numérisée; et / ou</li>
                                    <li>n'a pas correctement renseigné les données personnelles lors de
                                    l'enregistrement; et / ou</li>
                                    <li>n'a pas soumis la demande en ligne ou à l'adresse mentionnée dans le formulaire de remboursement dans les 21 jours suivant la date d'achat; et / ou</li>
                                    <li>ne s'est pas conformé aux présentes conditions générales.</li>
                                </ul>
                            </li>
                            <li>Dell se réserve le droit de disqualifier toute demande incomplète, modifiée ou
                                illisible. Dell ne pourra être tenu responsable de la soumission des demandes perdues, retardées, endommagées ou incorrectement soumises.</li>
                            <li>Dell ne peut être tenu responsable des dysfonctionnements matériels, logiciels,
                                serveurs, sites Web ou autres, ni des préjudices du même type qui pourraient empêcher ou bloquer de quelque manière que ce soit la participation à la promotion.</li>
                            <li>Dell se réserve le droit d'examiner toutes les informations fournies par le            revendeur afin de vérifier que les conditions générales de la promotion sont           remplies et de demander des informations complémentaires concernant chaque             information  ainsi que les documents connexes.</li>
                            <li>Toute facture associée qui est falsifiée, incorrecte, trompeuse ou frauduleuse peut
                                entraîner la disqualification de cette promotion et des promotions futures. Le cas
                                échéant, Dell se réserve le droit de poursuivre tout contrevenant n’ayant pas respecté ces conditions générales.</li>
                            <li>Les décisions de Dell concernant chaque aspect de cette promotion seront               définitives et exécutoires.</li>
                            <li>Dell se réserve le droit de modifier ou d'annuler les conditions de cette              promotion sans préavis.</li>
                            <li>Dell se réserve le droit d'arrêter le programme de remboursement au-delà de 1000       unités remboursées.</li>
                            <li>Les participants qui soumettent un formulaire d'inscription incomplet en seront
                                informés. Si, malgré la notification, le participant ne respecte pas les conditions
                                générales, la demande de remboursement sera refusée.</li>
                        </ul>
                    </div>
                    <div class="format-type">
                        <h3>DÉCLARATION DE CONFIDENTIALITÉ ET DE PROTECTION DES RENSEIGNEMENTS PERSONNELS</h3>
                        <p>Toutes les données personnelles recueillies dans le cadre de cette offre, y compris         l'adresse électronique du revendeur participant, seront utilisées uniquement dans le       but d'administrer et de mettre en œuvre cette offre promotionnelle. Cette offre est        faite conformément à la politique de protection des données personnelles de Dell, qui      peut être consultée ici:
                            <a href="https://www.dell.com/Identity/global/Login/74c1fd96-fd8f-4d4c-8695-d9667f2b1639?redirectUrl=https%3A%2F%2Fwww.dell.com%2Flearn%2Ffr%2Ffr%2Ffrcorp1%2Fpolicies-privacy&rc=UpgradeSession&mac=UAA2ADEAVgBNAEwARQBBAFIATgBVAEkAMAAyAA%3D%3D&feir=1"
                                target="_blank">Charte de confidentialité.</a></p>
                    </div>
                    <div class="format-type">
                        <h3>LIENS VERS DES SITES DE TIERS</h3>
                        <p>EN CLIQUANT SUR CERTAINS LIENS SUR CE SITE, VOUS QUITTEREZ LE SITE DE DELL.
                            LES SITES RELIES NE SONT PAS SOUS LE CONTROLE DE DELL ET DELL N’EST PAS RESPONSABLE DE LEURS CONTENUS NI D’UN LIEN QUELCONQUE CONTENU DANS UN SITE RELIE OU DE N’IMPORTE QUEL CHANGEMENT OU MISE A JOUR VERS CE TYPE DE SITE. DELL N’EST PAS RESPONSABLE DE LA WEBDIFFUSION OU DE TOUTE AUTRE FORME DE TRANSMISSION RECUE D’UN SITE QUELCONQUE RELIE. DELL NE VOUS FOURNIT CES LIENS QU’A TITRE DE COMMODITITE ET L’INCLUSION D’UN LIEN QUEL QU’IL SOIT N’IMPLIQUE PAS QUE DELL APPROUVE CE SITE. </p>
                        <p>© 2021 Dell Corporation. Tous droits réservés. Ce site est hébergé par Aximpro ® qui gère cette opération pour Dell.</p>
                    </div>
                    <div class="format-type">
                        <h3>Contact</h3>
                        <p>Cette opération promotionnelle est administrée, gérée et distribuée par Aximpro pour le
                            compte de Dell. Si vous avez des questions concernant cette déclaration, ou si vous pensez que nous ne les avons pas respectées, veuillez nous contacter par e-mail à
                            <a href="mailto:contact@laremiseenplus.com" target="__blank"> contact@laremiseenplus.com </a> ou par courrier ordinaire à l' adresse suivante :
                            <br>Aximpro GmbH
                            <br>Gute Aenger 11-15
                            <br>85356 Freising
                            <br>Allemagne </p>
                    </div>
                    <div class="format-type">
                        <h3>Organisateur</h3>
                        <p>Dell S.A., Siège Social 1 rond-point Benjamin Franklin, 34000 Montpellier.<br>
                            Capital 1 782 769 Euros, 351 528 229 RCS Montpellier - APE 4651Z <br>
                            TVA Intracommunautaire FR 20 351 528 229</p>
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
