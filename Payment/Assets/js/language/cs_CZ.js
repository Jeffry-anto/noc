(function($) {
    /**
     * Czech language package
     * Translated by @AdwinTrave. Improved by @cuchac
     */
    $.fn.bootstrapValidator.i18n = $.extend(true, $.fn.bootstrapValidator.i18n, {
        base64: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ½ base64'
        },
        between: {
            'default': 'ProsÃ­m zadejte hodnotu mezi %s a %s',
            notInclusive: 'ProsÃ­m zadejte hodnotu mezi %s a %s (vÄetnÄ› tÄ›chto ÄÃ­sel)'
        },
        callback: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou hodnotu'
        },
        choice: {
            'default': 'ProsÃ­m vyberte sprÃ¡vnou hodnotu',
            less: 'Hodnota musÃ­ bÃ½t minimÃ¡lnÄ› %s',
            more: 'Hodnota nesmÃ­ bÃ½t vÃ­ce jak %s',
            between: 'ProsÃ­m vyberte mezi %s a %s'
        },
        color: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou barvu'
        },
        creditCard: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© ÄÃ­slo kreditnÃ­ karty'
        },
        cusip: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© CUSIP ÄÃ­slo'
        },
        cvv: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© CVV ÄÃ­slo'
        },
        date: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© datum',
            min: 'ProsÃ­m zadejte datum pÅ™ed %s',
            max: 'ProsÃ­m zadejte datum po %s',
            range: 'ProsÃ­m zadejte datum v rozmezÃ­ %s aÅ¾ %s'
        },
        different: {
            'default': 'ProsÃ­m zadejte jinou hodnotu'
        },
        digits: {
             'default': 'Toto pole mÅ¯Å¾e obsahovat pouze ÄÃ­sla'
        },
        ean: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© EAN ÄÃ­slo'
        },
        emailAddress: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou emailovou adresu'
        },
        file: {
            'default': 'ProsÃ­m vyberte soubor'
        },
        greaterThan: {
            'default': 'ProsÃ­m zadejte hodnotu vÄ›tÅ¡Ã­ nebo rovnu %s',
            notInclusive: 'ProsÃ­m zadejte hodnotu vÄ›tÅ¡Ã­ neÅ¾ %s'
        },
        grid: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© GRId ÄÃ­slo'
        },
        hex: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© hexadecimÃ¡lnÃ­ ÄÃ­slo'
        },
        hexColor: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou hex barvu'
        },
        iban: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© IBAN ÄÃ­slo',
            countryNotSupported: 'IBAN pro %s nenÃ­ podporovÃ¡n',
            country: 'ProsÃ­m zadejte sprÃ¡vnÃ© IBAN ÄÃ­slo pro %s',
            countries: {
                AD: 'Andorru',
                AE: 'SpojenÃ© arabskÃ© emirÃ¡ty',
                AL: 'Albanii',
                AO: 'Angolu',
                AT: 'Rakousko',
                AZ: 'ÃzerbajdÅ¾Ã¡n',
                BA: 'Bosnu a Herzegovinu',
                BE: 'Belgie',
                BF: 'Burkina Faso',
                BG: 'Bulharsko',
                BH: 'Bahrajn',
                BI: 'Burundi',
                BJ: 'Benin',
                BR: 'BrazÃ­lii',
                CH: 'Å vÃ½carsko',
                CI: 'PobÅ™eÅ¾Ã­ slonoviny',
                CM: 'Kamerun',
                CR: 'Kostariku',
                CV: 'Cape Verde',
                CY: 'Kypr',
                CZ: 'ÄŒeskou republiku',
                DE: 'NÄ›mecko',
                DK: 'DÃ¡nsko',
                DO: 'DominikÃ¡nskou republiku',
                DZ: 'AlÅ¾Ã­rsko',
                EE: 'Estonsko',
                ES: 'Å panÄ›lsko',
                FI: 'Finsko',
                FO: 'FaerskÃ© ostrovy',
                FR: 'Francie',
                GB: 'Velkou BritÃ¡nii',
                GE: 'Gruzii',
                GI: 'Gibraltar',
                GL: 'GrÃ³nsko',
                GR: 'Å˜ecko',
                GT: 'Guatemala',
                HR: 'Chorvatsko',
                HU: 'MaÄarsko',
                IE: 'Irsko',
                IL: 'Israel',
                IR: 'IrÃ¡n',
                IS: 'Island',
                IT: 'ItÃ¡lii',
                JO: 'Jordansko',
                KW: 'Kuwait',
                KZ: 'KazakhstÃ¡n',
                LB: 'Lebanon',
                LI: 'LichtenÅ¡tejnsko',
                LT: 'Litvu',
                LU: 'Lucembursko',
                LV: 'LotyÅ¡sko',
                MC: 'Monaco',
                MD: 'Moldavsko',
                ME: 'ÄŒernou Horu',
                MG: 'Madagaskar',
                MK: 'Makedonii',
                ML: 'Mali',
                MR: 'MauritÃ¡nii',
                MT: 'Malta',
                MU: 'Mauritius',
                MZ: 'Mosambik',
                NL: 'Nizozemsko',
                NO: 'Norsko',
                PK: 'PakistÃ¡n',
                PL: 'Polsko',
                PS: 'Palestinu',
                PT: 'Portugalsko',
                QA: 'Katar',
                RO: 'Rumunsko',
                RS: 'Srbsko',
                SA: 'Saudskou ArÃ¡bii',
                SE: 'Å vÃ©dsko',
                SI: 'Slovinsko',
                SK: 'Slovensko',
                SM: 'San Marino',
                SN: 'Senegal',
                TN: 'Tunisko',
                TR: 'Turecko',
                VG: 'BritskÃ© PanenskÃ© ostrovy'
            }
        },
        id: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© rodnÃ© ÄÃ­slo',
            countryNotSupported: 'RodnÃ© ÄÃ­slo pro %s nenÃ­ podporovanÃ©',
            country: 'ProsÃ­m zadejte sprÃ¡vnÃ© rodnÃ© ÄÃ­slo pro %s',
            countries: {
                BA: 'Bosnu a Hercegovinu',
                BG: 'Bulharsko',
                BR: 'BrazÃ­lii',
                CH: 'Å vÃ½carsko',
                CL: 'Chile',
                CN: 'ÄŒÃ­na',
                CZ: 'ÄŒeskou Republiku',
                DK: 'DÃ¡nsko',
                EE: 'Estonsko',
                ES: 'Å paÅˆelsko',
                FI: 'Finsko',
                HR: 'Chorvatsko',
                IE: 'Irsko',
                IS: 'Island',
                LT: 'Litvu',
                LV: 'LotyÅ¡sko',
                ME: 'Montenegro',
                MK: 'Makedonii',
                NL: 'NizozemÃ­',
                RO: 'Rumunsko',
                RS: 'Srbsko',
                SE: 'Å vÃ©dsko',
                SI: 'Slovinsko',
                SK: 'Slovensko',
                SM: 'San Marino',
                TH: 'Thajsko',
                ZA: 'JiÅ¾nÃ­ Afriku'
            }
        },
        identical: {
            'default': 'ProsÃ­m zadejte stejnou hodnotu'
        },
        imei: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© IMEI ÄÃ­slo'
        },
        imo: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© IMO ÄÃ­slo'
        },
        integer: {
            'default': 'ProsÃ­m zadejte celÃ© ÄÃ­slo'
        },
        ip: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou IP adresu',
            ipv4: 'ProsÃ­m zadejte sprÃ¡vnou IPv4 adresu',
            ipv6: 'ProsÃ­m zadejte sprÃ¡vnou IPv6 adresu'
        },
        isbn: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© ISBN ÄÃ­slo'
        },
        isin: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© ISIN ÄÃ­slo'
        },
        ismn: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© ISMN ÄÃ­slo'
        },
        issn: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© ISSN ÄÃ­slo'
        },
        lessThan: {
            'default': 'ProsÃ­m zadejte hodnotu menÅ¡Ã­ nebo rovno %s',
            notInclusive: 'ProsÃ­m zadejte hodnotu menÄÃ­ neÅ¾ %s'
        },
        mac: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou MAC adresu'
        },
        meid: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© MEID ÄÃ­slo'
        },
        notEmpty: {
            'default': 'Toto pole nesmÃ­ bÃ½t prÃ¡zdnÃ©'
        },
        numeric: {
            'default': 'ProsÃ­m zadejte ÄÃ­selnou hodnotu'
        },
        phone: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© telefonÃ­ ÄÃ­slo',
            countryNotSupported: 'TelefonÃ­ ÄÃ­slo pro %s nenÃ­ podporovanÃ©',
            country: 'ProsÃ­m zadejte sprÃ¡vnÃ© telefonÃ­ ÄÃ­slo pro %s',
            countries: {
                BR: 'BrazÃ­lii',
                CN: 'ÄŒÃ­na',
                CZ: 'ÄŒeskou Republiku',
                DE: 'NÄ›mecko',
                DK: 'DÃ¡nsko',
                ES: 'Å panÄ›lsko',
                FR: 'Francie',
                GB: 'Velkou BritÃ¡nii',
                MA: 'Maroko',
                PK: 'PÃ¡kistÃ¡n',
                RO: 'Rumunsko',
                RU: 'Rusko',
                SK: 'Slovensko',
                TH: 'Thajsko',
                US: 'SpojenÃ© StÃ¡ty AmerickÃ©',
                VE: 'VenezuelskÃ½'
            }
        },
        regexp: {
            'default': 'ProsÃ­m zadejte hodnotu splÅˆujÃ­cÃ­ zadÃ¡nÃ­'
        },
        remote: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou hodnotu'
        },
        rtn: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© RTN ÄÃ­slo'
        },
        sedol: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© SEDOL ÄÃ­slo'
        },
        siren: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© SIREN ÄÃ­slo'
        },
        siret: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© SIRET ÄÃ­slo'
        },
        step: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ½ krok %s'
        },
        stringCase: {
            'default': 'Pouze malÃ¡ pÃ­smen jsou povoleny v tomto poli',
            upper: 'Pouze velkÃ© pÃ­smena jsou povoleny v tomto poli'
        },
        stringLength: {
            'default': 'Toto pole nesmÃ­ bÃ½t prÃ¡zdnÃ©',
            less: 'ProsÃ­m zadejte mÃ©nÄ› neÅ¾ %s znakÅ¯',
            more: 'ProsÃ­m zadejte vÃ­ce neÅ¾ %s znakÅ¯',
            between: 'ProsÃ­m zadejte mezi %s a %s znaky'
        },
        uri: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnou URI'
        },
        uuid: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© UUID ÄÃ­slo',
            version: 'ProsÃ­m zadejte sprÃ¡vnÃ© UUID verze %s'
        },
        vat: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© VAT ÄÃ­slo',
            countryNotSupported: 'VAT pro %s nenÃ­ podporovanÃ©',
            country: 'ProsÃ­m zadejte sprÃ¡vnÃ© VAT ÄÃ­slo pro %s',
            countries: {
                AT: 'Rakousko',
                BE: 'Belgii',
                BG: 'Bulharsko',
                BR: 'BrazÃ­lii',
                CH: 'Å vÃ½carsko',
                CY: 'Kypr',
                CZ: 'ÄŒeskou Republiku',
                DE: 'NÄ›mecko',
                DK: 'DÃ¡nsko',
                EE: 'Estonsko',
                ES: 'Å paÅˆelsko',
                FI: 'Finsko',
                FR: 'Francie',
                GB: 'Velkou BritÃ¡nii',
                GR: 'Å˜ecko',
                EL: 'Å˜ecko',
                HU: 'MaÄarsko',
                HR: 'Chorvatsko',
                IE: 'Irsko',
                IS: 'Island',
                IT: 'ItÃ¡lie',
                LT: 'Litvu',
                LU: 'Lucembursko',
                LV: 'LotyÅ¡sko',
                MT: 'Maltu',
                NL: 'NizozemÃ­',
                NO: 'Norsko',
                PL: 'Polsko',
                PT: 'Portugalsko',
                RO: 'Rumunsko',
                RU: 'Rusko',
                RS: 'Srbsko',
                SE: 'Å vÃ©dsko',
                SI: 'Slovinsko',
                SK: 'Slovensko',
                VE: 'VenezuelskÃ½',
                ZA: 'JiÅ¾nÃ­ Afriku'
            }
        },
        vin: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© VIN ÄÃ­slo'
        },
        zipCode: {
            'default': 'ProsÃ­m zadejte sprÃ¡vnÃ© PSÄŒ',
            countryNotSupported: '%s nenÃ­ podporovanÃ©',
            country: 'ProsÃ­m zadejte sprÃ¡vnÃ© PSÄŒ pro %s',
            countries: {
                AT: 'Rakousko',
                BR: 'BrazÃ­lie',
                CA: 'Kanada',
                CH: 'Å vÃ½carsko',
                CZ: 'ÄŒeskou Republiku',
                DE: 'NÄ›mecko',
                DK: 'DÃ¡nsko',
                FR: 'Francie',
                GB: 'Velkou BritÃ¡nii',
                IE: 'Irsko',
                IT: 'ItÃ¡lie',
                MA: 'Maroko',
                NL: 'NizozemÃ­',
                PT: 'Portugalsko',
                RO: 'Rumunsko',
                RU: 'Rusko',
                SE: 'Å vÃ©dsko',
                SG: 'Singapur',
                SK: 'Slovensko',
                US: 'SpojenÃ© StÃ¡ty AmerickÃ©'
            }
        }
    });
}(window.jQuery));