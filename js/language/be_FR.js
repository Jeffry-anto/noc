(function($) {
    /**
     * Belgium (French) language package
     * Translated by @neilime
     */
    $.fn.bootstrapValidator.i18n = $.extend(true, $.fn.bootstrapValidator.i18n, {
        base64: {
            'default': 'Veuillez fournir une donnÃ©e correctement encodÃ©e en Base64'
        },
        between: {
            'default': 'Veuillez fournir une valeur comprise entre %s et %s',
            notInclusive: 'Veuillez fournir une valeur strictement comprise entre %s et %s'
        },
        callback: {
            'default': 'Veuillez fournir une valeur valide'
        },
        choice: {
            'default': 'Veuillez fournir une valeur valide',
            less: 'Veuillez choisir au minimum %s options',
            more: 'Veuillez choisir au maximum %s options',
            between: 'Veuillez choisir de %s Ã  %s options'
        },
        color: {
            'default': 'Veuillez fournir une couleur valide'
        },
        creditCard: {
            'default': 'Veuillez fournir un numÃ©ro de carte de crÃ©dit valide'
        },
        cusip: {
            'default': 'Veuillez fournir un code CUSIP valide'
        },
        cvv: {
            'default': 'Veuillez fournir un code CVV valide'
        },
        date: {
            'default': 'Veuillez fournir une date valide',
            'min': 'Veuillez fournir une date supÃ©rieure Ã  %s',
            'max': 'Veuillez fournir une date infÃ©rieure Ã  %s',
            'range': 'Veuillez fournir une date comprise entre %s et %s'
        },
        different: {
            'default': 'Veuillez fournir une valeur diffÃ©rente'
        },
        digits: {
            'default': 'Veuillez ne fournir que des chiffres'
        },
        ean: {
            'default': 'Veuillez fournir un code-barre EAN valide'
        },
        emailAddress: {
            'default': 'Veuillez fournir une adresse e-mail valide'
        },
        file: {
            'default': 'Veuillez choisir un fichier valide'
        },
        greaterThan: {
            'default': 'Veuillez fournir une valeur supÃ©rieure ou Ã©gale Ã  %s',
            notInclusive: 'Veuillez fournir une valeur supÃ©rieure Ã  %s'
        },
        grid: {
            'default': 'Veuillez fournir un code GRId valide'
        },
        hex: {
            'default': 'Veuillez fournir un nombre hexadÃ©cimal valide'
        },
        hexColor: {
            'default': 'Veuillez fournir une couleur hexadÃ©cimale valide'
        },
        iban: {
            'default': 'Veuillez fournir un code IBAN valide',
            countryNotSupported: 'Le code de pays %s n\'est pas acceptÃ©',
            country: 'Veuillez fournir un code IBAN valide pour %s',
            countries: {
                AD: 'Andorre',
                AE: 'Ã‰mirats Arabes Unis',
                AL: 'Albanie',
                AO: 'Angola',
                AT: 'Autriche',
                AZ: 'AzerbaÃ¯djan',
                BA: 'Bosnie-HerzÃ©govine',
                BE: 'Belgique',
                BF: 'Burkina Faso',
                BG: 'Bulgarie',
                BH: 'Bahrein',
                BI: 'Burundi',
                BJ: 'BÃ©nin',
                BR: 'BrÃ©sil',
                CH: 'Suisse',
                CI: 'CÃ´te d\'ivoire',
                CM: 'Cameroun',
                CR: 'Costa Rica',
                CV: 'Cap Vert',
                CY: 'Chypre',
                CZ: 'TchÃ¨que',
                DE: 'Allemagne',
                DK: 'Danemark',
                DO: 'RÃ©publique Dominicaine',
                DZ: 'AlgÃ©rie',
                EE: 'Estonie',
                ES: 'Espagne',
                FI: 'Finlande',
                FO: 'ÃŽles FÃ©roÃ©',
                FR: 'France',
                GB: 'Royaume Uni',
                GE: 'GÃ©orgie',
                GI: 'Gibraltar',
                GL: 'GroÃ«nland',
                GR: 'GrÃ©ce',
                GT: 'Guatemala',
                HR: 'Croatie',
                HU: 'Hongrie',
                IE: 'Irlande',
                IL: 'IsraÃ«l',
                IR: 'Iran',
                IS: 'Islande',
                IT: 'Italie',
                JO: 'Jordanie',
                KW: 'KoweÃ¯t',
                KZ: 'Kazakhstan',
                LB: 'Liban',
                LI: 'Liechtenstein',
                LT: 'Lithuanie',
                LU: 'Luxembourg',
                LV: 'Lettonie',
                MC: 'Monaco',
                MD: 'Moldavie',
                ME: 'MontÃ©nÃ©gro',
                MG: 'Madagascar',
                MK: 'MacÃ©doine',
                ML: 'Mali',
                MR: 'Mauritanie',
                MT: 'Malte',
                MU: 'Maurice',
                MZ: 'Mozambique',
                NL: 'Pays-Bas',
                NO: 'NorvÃ¨ge',
                PK: 'Pakistan',
                PL: 'Pologne',
                PS: 'Palestine',
                PT: 'Portugal',
                QA: 'Quatar',
                RO: 'Roumanie',
                RS: 'Serbie',
                SA: 'Arabie Saoudite',
                SE: 'SuÃ¨de',
                SI: 'SlovÃ¨nie',
                SK: 'Slovaquie',
                SM: 'Saint-Marin',
                SN: 'SÃ©nÃ©gal',
                TN: 'Tunisie',
                TR: 'Turquie',
                VG: 'ÃŽles Vierges britanniques'
            }
        },
        id: {
            'default': 'Veuillez fournir un numÃ©ro d\'identification valide',
            countryNotSupported: 'Le code de pays %s n\'est pas acceptÃ©',
            country: 'Veuillez fournir un numÃ©ro d\'identification valide pour %s',
            countries: {
                BA: 'Bosnie-HerzÃ©govine',
                BG: 'Bulgarie',
                BR: 'BrÃ©sil',
                CH: 'Suisse',
                CL: 'Chili',
                CN: 'Chine',
                CZ: 'TchÃ¨que',
                DK: 'Danemark',
                EE: 'Estonie',
                ES: 'Espagne',
                FI: 'Finlande',
                HR: 'Croatie',
                IE: 'Irlande',
                IS: 'Islande',
                LT: 'Lituanie',
                LV: 'Lettonie',
                ME: 'MontÃ©nÃ©gro',
                MK: 'MacÃ©doine',
                NL: 'Pays-Bas',
                RO: 'Roumanie',
                RS: 'Serbie',
                SE: 'SuÃ¨de',
                SI: 'SlovÃ©nie',
                SK: 'Slovaquie',
                SM: 'Saint-Marin',
                TH: 'ThaÃ¯lande',
                ZA: 'Afrique du Sud'
            }
        },
        identical: {
            'default': 'Veuillez fournir la mÃªme valeur'
        },
        imei: {
            'default': 'Veuillez fournir un code IMEI valide'
        },
        imo: {
            'default': 'Veuillez fournir un code IMO valide'
        },
        integer: {
            'default': 'Veuillez fournir un nombre valide'
        },
        ip: {
            'default': 'Veuillez fournir une adresse IP valide',
            ipv4: 'Veuillez fournir une adresse IPv4 valide',
            ipv6: 'Veuillez fournir une adresse IPv6 valide'
        },
        isbn: {
            'default': 'Veuillez fournir un code ISBN valide'
        },
        isin: {
            'default': 'Veuillez fournir un code ISIN valide'
        },
        ismn: {
            'default': 'Veuillez fournir un code ISMN valide'
        },
        issn: {
            'default': 'Veuillez fournir un code ISSN valide'
        },
        lessThan: {
            'default': 'Veuillez fournir une valeur infÃ©rieure ou Ã©gale Ã  %s',
            notInclusive: 'Veuillez fournir une valeur infÃ©rieure Ã  %s'
        },
        mac: {
            'default': 'Veuillez fournir une adresse MAC valide'
        },
        meid: {
            'default': 'Veuillez fournir un code MEID valide'
        },
        notEmpty: {
            'default': 'Veuillez fournir une valeur'
        },
        numeric: {
            'default': 'Veuillez fournir une valeur dÃ©cimale valide'
        },
        phone: {
            'default': 'Veuillez fournir un numÃ©ro de tÃ©lÃ©phone valide',
            countryNotSupported: 'Le code de pays %s n\'est pas acceptÃ©',
            country: 'Veuillez fournir un numÃ©ro de tÃ©lÃ©phone valide pour %s',
            countries: {
                BR: 'BrÃ©sil',
                CN: 'Chine',
                CZ: 'TchÃ¨que',
                DE: 'Allemagne',
                DK: 'Danemark',
                ES: 'Espagne',
                FR: 'France',
                GB: 'Royaume-Uni',
                MA: 'Maroc',
                PK: 'Pakistan',
                RO: 'Roumanie',
                RU: 'Russie',
                SK: 'Slovaquie',
                TH: 'ThaÃ¯lande',
                US: 'USA',
                VE: 'Venezuela'
            }
        },
        regexp: {
            'default': 'Veuillez fournir une valeur correspondant au modÃ¨le'
        },
        remote: {
            'default': 'Veuillez fournir une valeur valide'
        },
        rtn: {
            'default': 'Veuillez fournir un code RTN valide'
        },
        sedol: {
            'default': 'Veuillez fournir a valid SEDOL number'
        },
        siren: {
            'default': 'Veuillez fournir un numÃ©ro SIREN valide'
        },
        siret: {
            'default': 'Veuillez fournir un numÃ©ro SIRET valide'
        },
        step: {
            'default': 'Veuillez fournir un Ã©cart valide de %s'
        },
        stringCase: {
            'default': 'Veuillez ne fournir que des caractÃ¨res minuscules',
            upper: 'Veuillez ne fournir que des caractÃ¨res majuscules'
        },
        stringLength: {
            'default': 'Veuillez fournir une valeur de longueur valide',
            less: 'Veuillez fournir moins de %s caractÃ¨res',
            more: 'Veuillez fournir plus de %s caractÃ¨res',
            between: 'Veuillez fournir entre %s et %s caractÃ¨res'
        },
        uri: {
            'default': 'Veuillez fournir un URI valide'
        },
        uuid: {
            'default': 'Veuillez fournir un UUID valide',
            version: 'Veuillez fournir un UUID version %s number'
        },
        vat: {
            'default': 'Veuillez fournir un code VAT valide',
            countryNotSupported: 'Le code de pays %s n\'est pas acceptÃ©',
            country: 'Veuillez fournir un code VAT valide pour %s',
            countries: {
                AT: 'Autriche',
                BE: 'Belgique',
                BG: 'Bulgarie',
                BR: 'BrÃ©sil',
                CH: 'Suisse',
                CY: 'Chypre',
                CZ: 'TchÃ¨que',
                DE: 'Allemagne',
                DK: 'Danemark',
                EE: 'Estonie',
                ES: 'Espagne',
                FI: 'Finlande',
                FR: 'France',
                GB: 'Royaume-Uni',
                GR: 'GrÃ¨ce',
                EL: 'GrÃ¨ce',
                HU: 'Hongrie',
                HR: 'Croatie',
                IE: 'Irlande',
                IS: 'Islande',
                IT: 'Italie',
                LT: 'Lituanie',
                LU: 'Luxembourg',
                LV: 'Lettonie',
                MT: 'Malte',
                NL: 'Pays-Bas',
                NO: 'NorvÃ¨ge',
                PL: 'Pologne',
                PT: 'Portugal',
                RO: 'Roumanie',
                RU: 'Russie',
                RS: 'Serbie',
                SE: 'SuÃ¨de',
                SI: 'SlovÃ©nie',
                SK: 'Slovaquie',
                VE: 'Venezuela',
                ZA: 'Afrique du Sud'
            }
        },
        vin: {
            'default': 'Veuillez fournir un code VIN valide'
        },
        zipCode: {
            'default': 'Veuillez fournir un code postal valide',
            countryNotSupported: 'Le code de pays %s n\'est pas acceptÃ©',
            country: 'Veuillez fournir un code postal valide pour %s',
            countries: {
                AT: 'Autriche',
                BR: 'BrÃ©sil',
                CA: 'Canada',
                CH: 'Suisse',
                CZ: 'TchÃ¨que',
                DE: 'Allemagne',
                DK: 'Danemark',
                FR: 'France',
                GB: 'Royaume-Uni',
                IE: 'Irlande',
                IT: 'Italie',
                MA: 'Maroc',
                NL: 'Pays-Bas',
                PT: 'Portugal',
                RO: 'Roumanie',
                RU: 'Russie',
                SE: 'SuÃ¨de',
                SG: 'Singapour',
                SK: 'Slovaquie',
                US: 'USA'
            }
        }
    });
}(window.jQuery));