<?php

/*
 * This file is part of Monsieur Biz' Coliship plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Directory;

final class FmtDirectory implements DirectoryInterface
{
    private array $values = [
        'Adresse 1 du destinataire : Numéro et libellé de voie' => 'Adresse1',
        "Adresse 1 de l'expéditeur : Numéro et libellé de voie" => 'Adresse1Expediteur',
        'Adresse ligne 1 point de retrait Inter' => 'Adresse1PointRetraitInter',
        'Adresse 2 du destinataire : Etage, couloir, escalier, appartement' => 'Adresse2',
        "Adresse 2 de l'expéditeur : Etage, couloir, escalier, appartement" => 'Adresse2Expediteur',
        'Adresse ligne 2 point de retrait Inter' => 'Adresse2PointRetraitInter',
        'Adresse 3 de destinataire : Entrée, bâtiment, immeuble, résidence' => 'Adresse3',
        "Adresse 3 de l'expéditeur : Entrée, bâtiment, immeuble, Résidence" => 'Adresse3Expediteur',
        'Adresse ligne 3 point de retrait Inter' => 'Adresse3PointRetraitInter',
        'Adresse 4 du destinataire : Lieu dit ou autre mention' => 'Adresse4',
        "Adresse 4 de l'expéditeur : Lieu dit ou autre mention" => 'Adresse4Expediteur',
        'Adresse ligne 4 point de retrait Inter' => 'Adresse4PointRetraitInter',
        'Avis de réception' => 'AvisReception',
        'Code postal point de retrait Inter' => 'CPPointRetraitInter',
        'Référence destinataire' => 'CodeDestinataire',
        'Référence expéditeur' => 'CodeExpediteur',
        'Province/état' => 'CodeISOProvince',
        'Code pays du destinataire' => 'CodePays',
        "Code pays de l'expéditeur" => 'CodePaysExpediteur',
        'Code pays point de retrait Inter' => 'CodePaysPointRetraitInter',
        'Code point retrait' => 'CodePointRetrait',
        "Code porte 1 de l'adresse du destinataire" => 'CodePorte1',
        "Code porte 2 de l'adresse du destinataire" => 'CodePorte2',
        'Code postal du destinataire' => 'CodePostal',
        "Code postal de l'expéditeur" => 'CodePostalExpediteur',
        'Code Produit' => 'CodeProduit',
        'Code réseau' => 'CodeReseauPointRetrait',
        'Colis retour imprimé' => 'ColisRetourImprime',
        'Commune du destinataire' => 'Commune',
        "Commune de l'expéditeur" => 'CommuneExpediteur',
        'Commune point de retrait Inter' => 'CommunePointRetraitInter',
        'DDP' => 'DDP',
        'Description générique' => 'DescriptionGenerique',
        'En-tête de ligne colis' => 'EntenteLigneColis',
        'Explications' => 'Explications',
        'FTD(Franc de taxes et de droits)' => 'FTD',
        'Hauteur du colis en mm' => 'HauteurColis',
        'Format volumineux' => 'HorsGabarit',
        'Identifiant point IPC' => 'IdPointRetraitInter',
        "Etage / couloir / escalier / appartement de l'importateur" => 'ImportateurAdresse1',
        "Entrée / bâtiment / immeuble / résidence de l'importateur" => 'ImportateurAdresse2',
        "N° et voie de l'importateur" => 'ImportateurAdresse3',
        "Lieu dit / complément de l'importateur" => 'ImportateurAdresse4',
        "Commune de l'importateur" => 'ImportateurCity',
        "Pays de l'importateur" => 'ImportateurCountryIso',
        "E-mail de l'importateur" => 'ImportateurMail',
        "Portable de l'importateur" => 'ImportateurMobile',
        "Nom commercial de l'expéditeur" => 'ImportateurNom',
        "Référence de l'importateur" => 'ImportateurReference',
        "Téléphone de l'importateur" => 'ImportateurTelephone',
        "Code postal de l'importateur" => 'ImportateurZipcode',
        'Instruction de livraison' => 'InstructionLivraison',
        'Instruction de non livraison(Type de retour)' => 'InstructionNonLivraison',
        "Interphone de l'adresse du destinataire" => 'Interphone',
        'Langue de notification' => 'LangueNotification',
        'Largeur du colis en mm' => 'LargeurColis',
        'Livraison avec engagement de délais' => 'LivraisonAvecEngagementDeDelais',
        'Livraison avec signature' => 'LivraisonAvecSignature',
        'Longueur du colis en mm' => 'LongueurColis',
        'Adresse e-mail du destinataire' => 'Mail',
        "Adresse e-mail de l'expéditeur" => 'MailExpediteur',
        'Montant Assurance' => 'MontantADV',
        'Montant CRBT' => 'MontantCRBT',
        "Nature de l'envoi" => 'NatureEnvoi',
        'Nom expéditeur' => 'NomCommercialChargeur',
        'Nom du destinataire' => 'NomDestinataire',
        'Raison sociale point de retrait Inter' => 'NomPointRetraitInter',
        'Numéro de certificat' => 'NumCertificat',
        'Numéro EORI' => 'NumEori',
        'Numéro de facture colis origine' => 'NumFacture',
        "Numéro d'abonné point de retrait Inter" => 'NumeroAbonnePointRetraitInter',
        'Numéro de colis origine' => 'NumeroColisAller',
        'Numéro de compte' => 'NumeroCompte',
        'Numéro de licence' => 'NumeroLicence',
        'Poids' => 'Poids',
        'Portable du destinataire' => 'Portable',
        'Prénom du destinataire' => 'Prenom',
        'Prénom expéditeur' => 'PrenomExpediteur',
        'Facture proforma imprimée' => 'ProformaImprimee',
        'Raison sociale du destinataire' => 'RaisonSociale',
        'Raison sociale expéditeur' => 'RaisonSocialeExpediteur',
        'Recommandation' => 'Recommandation',
        'Référence douane' => 'ReferenceDouane',
        'Référence de commande' => 'ReferenceExpedition',
        'Référence importateur' => 'ReferenceImportateur',
        'Sans objet' => 'SansObjet',
        'Sans objet 1' => 'SansObjet1',
        'Sans objet 2' => 'SansObjet2',
        'Sans objet 3' => 'SansObjet3',
        'Sans objet 4' => 'SansObjet4',
        'Sans objet 5' => 'SansObjet5',
        'Service destinataire' => 'ServiceDestinataire',
        'Service expéditeur' => 'ServiceExpediteur',
        'Tag utilisateur' => 'TagUsers',
        'Téléphone destinataire' => 'Telephone',
        "Téléphone de l'expéditeur" => 'TelephoneExpediteur',
    ];

    public function getValues(): array
    {
        return $this->values;
    }
}
