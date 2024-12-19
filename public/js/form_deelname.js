/*
 * Get important data for displaying form
 *
 * Uses data attributes in main element
 */
var el = document.getElementById('form');

function createFieldsets(fieldsets_array, remove_fieldsets) {
    /*
       * Array with field types, questions and answers
       *
       * Order is based on array elements order
       *
       * Array definition:
       * [0: fieldset title, 1: fieldset id, [2: questions array: [0: 'type of question', 1: 'question shortname', 2: 'question', 3: [answers array], 4: required 1/0]]]
       */
    var arrays = [
        ['deelname', [
            ['Direct aanmelden', 'direct-aanmelden', [
                ['text', 'company', 'Bedrijfsnaam', [], 1],
                ['radio', 'gender', 'Aanhef', [
                    ['Dhr.'],
                    ['Mevr.']
                ], 1],
                ['text', 'firstname', 'Voornaam', [], 1],
                ['text', 'lastname', 'Achternaam', [], 1],
                ['text', 'address', 'Adres', [], 1],
                ['text', 'zipcode', 'Postcode', [], 1],
                ['text', 'city', 'Plaats', [], 1],
                ['text', 'phonenumber', 'Telefoonnummer', [], 1],
                ['text', 'email', 'E-mailadres', [], 1],
                ['checkbox', 'lid_van', 'Wat is op u van toepassing?', [
                    ['Lid MfN', 'Lid MfN', 'lid_mfn'],
                    ['Lid NMv', 'Lid NMv', 'lid_nmv']
                ]],
                ['checkbox', 'type_conflicten', 'Welk type conflicten behandelt u?', [
                    ['Scheidingen', 'Type Scheidingen', 'type_scheidingen'],
                    ['Relatie/familie/persoonlijk', 'Type Relatie/familie/persoonlijk', 'type_relatie'],
                    ['Arbeidsconflicten', 'Type Arbeidsconflicten', 'type_arbeid'],
                    ['Zakelijke conflicten', 'Type Zakelijke Conflicten', 'type_zakelijk'],
                    ['Bouwconflicten', 'Type Bouwconflicten', 'type_bouw']
                ], 1],
                ['textarea', 'work_areas_text', 'Locatiewensen: in welk gebied wilt u aanvragen ontvangen?', '', 'Vul plaatsnamen of provincies in...']
            ],
                '830px'
            ],
            ['Voorwaarden van deelname', 'voorwaarden', [
                ['html_text', '<ul><li>De ontvangen aanvragen zijn altijd kosteloos.</li><li>De aanvragen zijn vrijblijvend. U bent niet verplicht om op iedere aanvraag in te gaan.</li><li>De aanvragen mogen alleen door u als mediator behandeld worden. De aanvragen mogen niet doorgezonden worden naar derden.</li><li>Zodra een gratis aanvraag uitmondt in een facturabele mediation-opdracht, dan geeft u dat zelf door aan onze administratie door een reply te sturen op de aanvraag, of door een e-mail te sturen naar info@mediatorsvergelijken.nl onder vermelding van het nummer van de aanvraag.</li><li>Voor iedere facturabele mediation-opdracht die u via ons platform verkrijgt, factureren wij eenmalig 250,- euro, excl. btw. Als er sprake is van een opdracht met toevoeging, dan factureren wij slechts 125,- euro, excl. btw. Als er geen resultaten zijn geboekt, dan wordt er uiteraard geen factuur verzonden.</li><li>Als de commissie-afspraak geschonden wordt, in de zin dat u een mediation-opdracht wel hebt gekregen maar ons daar niet van op de hoogte hebt gesteld, dan beëindigen wij per direct en zonder uitzondering de samenwerking.</li></ul>'],
                ['checkbox', 'accept_terms', '', [
                    ['Ja, ik ga akkoord met de voorwaarden voor deelname', 'Ja']
                ], 1]
            ],
                '430px'
            ]
        ]]
    ];

    var fieldsets = '';

    for (var i = 0; i < arrays.length; i++) {
        if (arrays[i][0] === fieldsets_array) {
            fieldsets = arrays[i][1];
        }
    }

    for (var i = 0; i < fieldsets.length; i++) {
        /*
         * Before the answers loop we create a fieldset, this is mandatory for every question
         *
         * A fieldset contains fieldset body and fieldset footer
         */

        // Create fieldset element
        var fieldset = document.createElement('fieldset');
        fieldset.setAttribute('id', fieldsets[i][1]);
        fieldset.setAttribute('data-step', i + 1);
        fieldset.setAttribute('data-body_size', fieldsets[i][3]);

        fieldset.setAttribute('class', fieldsets_array);

        // Append next step and prev step hidden fields for conditional purposes
        var steps_changed = document.createElement('input');
        steps_changed.type = 'hidden';
        steps_changed.name = 'steps_changed-' + eval(i + 1);
        steps_changed.setAttribute('class', 'steps_changed-' + eval(i + 1));
        steps_changed.className += ' steps_changed';

        fieldset.appendChild(steps_changed);

        // Append next step and prev step hidden fields for conditional purposes
        var multisteps_changed = document.createElement('input');
        multisteps_changed.type = 'hidden';
        multisteps_changed.name = 'multisteps_changed-' + eval(i + 1);
        multisteps_changed.setAttribute('class', 'multisteps_changed-' + eval(i + 1));
        multisteps_changed.className += ' multisteps_changed';

        fieldset.appendChild(multisteps_changed);

        var next_step_count = document.createElement('input');
        next_step_count.type = 'hidden';
        next_step_count.name = 'next_step_count-' + eval(i + 1);
        next_step_count.value = 1;
        next_step_count.setAttribute('class', 'next_step_count-' + eval(i + 1));
        next_step_count.className += ' next_step';

        fieldset.appendChild(next_step_count);

        var prev_step_count = document.createElement('input');
        prev_step_count.type = 'hidden';
        prev_step_count.name = 'prev_step_count-' + eval(i + 1);
        prev_step_count.value = 1;
        prev_step_count.setAttribute('class', 'prev_step_count-' + eval(i + 1));
        prev_step_count.className += ' prev_step';

        fieldset.appendChild(prev_step_count);

        // Start input group, first we create a fieldset body
        var fieldset_body = document.createElement('div');
        fieldset_body.setAttribute('class', 'fieldset-body');

        if (fieldsets[i][0] !== '') {
            // Create fieldset title (a.k.a. fieldset legend) if it is not empty
            var fieldset_title = document.createElement('strong');

            // Create text node for the fieldset title
            var fieldset_title_text = document.createTextNode(fieldsets[i][0]);

            // Append fieldset title to legend and then append legend to fieldset
            fieldset_title.appendChild(fieldset_title_text);
            fieldset_body.appendChild(fieldset_title);
        }

        fieldset.appendChild(fieldset_body);

        // Last step to create fieldset is appending it to the form
        form_body.appendChild(fieldset);

        // Now we loop trough every fieldsets question array
        for (var ii = 0; ii < fieldsets[i][2].length; ii++) {
            // We first check what type of question we are dealing with
            if (fieldsets[i][2][ii][0] === 'radio') {
                if (fieldsets[i][2][ii][1] !== 'show_array') {
                    // Create radio group element that contains the radio buttons
                    var radio_group = document.createElement('div');
                    radio_group.className += 'clearfix';
                    radio_group.className += ' radio-group';
                    radio_group.setAttribute('id', fieldsets[i][2][ii][1] + '-radio-container');

                    if (fieldsets[i][2][ii][2] !== '') {
                        // Create label for radio button group
                        var radio_group_label = document.createElement('div');
                        radio_group_label.setAttribute('class', 'radio-group-label');
                        var radio_group_label_text = document.createTextNode(fieldsets[i][2][ii][2]);
                        radio_group_label.appendChild(radio_group_label_text);

                        // Append label to radio group
                        radio_group.appendChild(radio_group_label);
                    }

                    // Loop trough every questions answer array
                    for (var iii = 0; iii < fieldsets[i][2][ii][3].length; iii++) {
                        var radio_label = document.createElement('label');
                        radio_label_text = document.createTextNode(fieldsets[i][2][ii][3][iii][0].replace(/&euro;/g, 'â‚¬').replace(/&eacute;/g, 'Ã©'));

                        var radio = document.createElement('input');
                        radio.setAttribute('class', 'required');

                        radio.type = fieldsets[i][2][ii][0];
                        radio.name = fieldsets[i][2][ii][1];

                        if (fieldsets[i][2][ii][3][iii][1]) {
                            radio.value = fieldsets[i][2][ii][3][iii][1];
                        } else {
                            radio.value = fieldsets[i][2][ii][3][iii][0];
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][2]) && fieldsets[i][2][ii][3][iii][2].length > 0) {
                            radio.setAttribute('data-show', fieldsets[i][2][ii][3][iii][2]);
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][3]) && fieldsets[i][2][ii][3][iii][3].length > 0) {
                            radio.setAttribute('data-hide', fieldsets[i][2][ii][3][iii][3]);
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][4]) && fieldsets[i][2][ii][3][iii][4].length > 0) {
                            radio.setAttribute('data-skip_step', fieldsets[i][2][ii][3][iii][4]);
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][5]) && fieldsets[i][2][ii][3][iii][5].length > 0) {
                            radio.setAttribute('data-skip_multiple_steps_next', fieldsets[i][2][ii][3][iii][5]);
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][6]) && fieldsets[i][2][ii][3][iii][6].length > 0) {
                            radio.setAttribute('data-skip_multiple_steps_prev', fieldsets[i][2][ii][3][iii][6]);
                        }

                        if (Array.isArray(fieldsets[i][2][ii][3][iii][7]) && fieldsets[i][2][ii][3][iii][7].length > 0) {
                            if (fieldsets[i][2][ii][3][iii][7][0] !== '') {
                                radio.setAttribute('data-change_title_id', fieldsets[i][2][ii][3][iii][7][0]);
                                radio.setAttribute('data-change_title', fieldsets[i][2][ii][3][iii][7][1]);
                            }
                        }

                        if (fieldsets[i][2][ii][3][iii][8] && fieldsets[i][2][ii][3][iii][8] != '') {
                            radio.setAttribute('data-change_branche', fieldsets[i][2][ii][3][iii][8]);
                        }

                        radio.onclick = function (e) {
                            document.getElementById('error-' + e.target.name + '-radio-container').style.display = 'none';

                            if (e.target.dataset.show) {
                                var show_this_array = e.target.dataset.show;
                                var show_this = show_this_array.split(',');

                                for (var i = 0; i < show_this.length; i++) {
                                    document.getElementById(show_this[i] + '-radio-container').style.display = 'block';

                                    var show_this_elements = document.getElementsByName(show_this[i]);
                                    for (ii = 0; ii < show_this_elements.length; ii++) {
                                        if (!show_this_elements[ii].classList.contains('required')) {
                                            show_this_elements[ii].className += ' required';
                                        }
                                    }

                                    var fieldset = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.step;
                                    var step_changed = document.getElementsByClassName('steps_changed-' + fieldset)[0].value;

                                    if (step_changed) {
                                        var next_step = document.querySelector('[data-step="' + step_changed + '"]').nextSibling.dataset.step;
                                        var prev_step = document.querySelector('[data-step="' + step_changed + '"]').previousSibling.dataset.step;
                                        document.querySelector('[data-step="' + step_changed + '"]').nextSibling.getElementsByClassName('prev_step_count-' + next_step)[0].value = 1;
                                        document.querySelector('[data-step="' + step_changed + '"]').previousSibling.getElementsByClassName('next_step_count-' + prev_step)[0].value = 1;

                                        document.getElementsByClassName('steps_changed-' + fieldset)[0].value = '';
                                    }
                                }
                            }

                            if (e.target.dataset.hide) {
                                var hide_this = e.target.dataset.hide;
                                hide_this = hide_this.split(',');

                                for (var i = 0; i < hide_this.length; i++) {
                                    document.getElementById(hide_this[i] + '-radio-container').style.display = 'none';

                                    var hide_this_elements = document.getElementsByName(hide_this[i]);
                                    for (ii = 0; ii < hide_this_elements.length; ii++) {
                                        hide_this_elements[ii].classList.remove("required");
                                        hide_this_elements[ii].checked = false;
                                    }

                                    var fieldset = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.step;
                                    var step_changed = document.getElementsByClassName('steps_changed-' + fieldset)[0].value;

                                    if (step_changed) {
                                        var next_step = document.querySelector('[data-step="' + step_changed + '"]').nextSibling.dataset.step;
                                        var prev_step = document.querySelector('[data-step="' + step_changed + '"]').previousSibling.dataset.step;
                                        document.querySelector('[data-step="' + step_changed + '"]').nextSibling.getElementsByClassName('prev_step_count-' + next_step)[0].value = 1;
                                        document.querySelector('[data-step="' + step_changed + '"]').previousSibling.getElementsByClassName('next_step_count-' + prev_step)[0].value = 1;

                                        document.getElementsByClassName('steps_changed-' + fieldset)[0].value = '';
                                    }
                                }
                            }

                            if (e.target.dataset.skip_step) {
                                var skip_steps = e.target.dataset.skip_step;
                                console.log(skip_steps);
                                skip_steps = skip_steps.split(',');

                                for (var i = 0; i < document.querySelector('fieldset.active').childNodes.length; i++) {
                                    if (document.querySelector('fieldset.active').getElementsByClassName('steps_changed')[0].value !== '') {
                                        if (document.querySelector('fieldset.active').childNodes[i].classList.contains('prev_step')) {
                                            document.querySelector('fieldset.active').childNodes[i].value = 1;
                                        }

                                        if (document.querySelector('fieldset.active').childNodes[i].classList.contains('next_step')) {
                                            document.querySelector('fieldset.active').childNodes[i].value = 1;
                                        }
                                    }
                                }

                                for (var i = 0; i < skip_steps.length; i++) {
                                    if (document.querySelector('[data-step="' + skip_steps[i] + '"]').nextSibling || skip_steps[i] !== 1 || skip_steps[i] !== '') {
                                        var next_step = document.querySelector('[data-step="' + skip_steps[i] + '"]').nextSibling.dataset.step;
                                        document.querySelector('[data-step="' + skip_steps[i] + '"]').nextSibling.getElementsByClassName('prev_step_count-' + next_step)[0].value = 2;

                                        var fields = document.querySelector('[data-step="' + skip_steps[i] + '"]').getElementsByTagName('input');
                                        for (var iii = 0; iii < fields.length; iii++) {
                                            if (fields[iii].type === 'radio') {
                                                fields[iii].checked = false;
                                            }

                                            if (fields[iii].type === 'text') {
                                                fields[iii].value = '';
                                            }
                                        }
                                    }

                                    if (document.querySelector('[data-step="' + skip_steps[i] + '"]').previousSibling) {
                                        var prev_step = document.querySelector('[data-step="' + skip_steps[i] + '"]').previousSibling.dataset.step;
                                        document.querySelector('[data-step="' + skip_steps[i] + '"]').previousSibling.getElementsByClassName('next_step_count-' + prev_step)[0].value = 2;
                                    }

                                    var fieldset = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.step;
                                    document.getElementsByClassName('steps_changed-' + fieldset)[0].value = skip_steps[i];
                                }
                            } else {
                                var original_step_changed = document.querySelector('fieldset.active').getElementsByClassName('steps_changed')[0].value;

                                for (var i = 0; i < document.querySelector('fieldset.active').childNodes.length; i++) {
                                    if (document.querySelector('fieldset.active').getElementsByClassName('steps_changed')[0].value !== '') {
                                        if (document.querySelector('fieldset.active').childNodes[i].classList.contains('prev_step')) {
                                            document.querySelector('fieldset.active').childNodes[i].value = 1;
                                        }

                                        if (document.querySelector('fieldset.active').childNodes[i].classList.contains('next_step')) {
                                            document.querySelector('fieldset.active').childNodes[i].value = 1;
                                        }
                                    }
                                }

                                if (original_step_changed !== '') {
                                    document.querySelector('[data-step="' + original_step_changed.toString() + '"]').nextSibling.getElementsByClassName('prev_step')[0].value = 1;
                                }

                                if (original_step_changed !== '') {
                                    console.log(document.querySelector('[data-step="' + original_step_changed.toString() + '"]'));
                                    document.querySelector('[data-step="' + original_step_changed.toString() + '"]').previousSibling.getElementsByClassName('next_step')[0].value = 1;
                                }
                            }

                            if (e.target.dataset.skip_multiple_steps_next) {
                                var multiple_steps_next = e.target.dataset.skip_multiple_steps_next;
                                multiple_steps_next = multiple_steps_next.split(',');

                                document.getElementById(multiple_steps_next[0]).getElementsByClassName('next_step')[0].value = multiple_steps_next[1];

                                var multiple_steps_prev = e.target.dataset.skip_multiple_steps_prev;
                                multiple_steps_prev = multiple_steps_prev.split(',');

                                document.getElementById(multiple_steps_prev[0]).getElementsByClassName('prev_step')[0].value = multiple_steps_prev[1];

                                var fieldset = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.step;
                                document.getElementsByClassName('multisteps_changed-' + fieldset)[0].value = multiple_steps_next[0] + ',' + multiple_steps_prev[0];
                            } else {
                                var original_multistep_changed = document.querySelector('fieldset.active').getElementsByClassName('multisteps_changed')[0].value;

                                if (original_multistep_changed !== '') {
                                    original_multistep_changed = original_multistep_changed.split(',');

                                    document.getElementById(original_multistep_changed[0]).getElementsByClassName('next_step')[0].value = 1;
                                    document.getElementById(original_multistep_changed[1]).getElementsByClassName('prev_step')[0].value = 1;
                                }
                            }

                            if (typeof e.target.dataset.change_title_id !== 'undefined') {
                                document.getElementById(e.target.dataset.change_title_id).getElementsByClassName('fieldset-body')[0].getElementsByTagName('strong')[0].innerText = e.target.dataset.change_title;
                            }


                            if (typeof e.target.dataset.change_branche !== 'undefined') {
                                document.getElementById('branche').value = e.target.dataset.change_branche;
                            }
                        }

                        // First append radio button to label
                        var div_input = document.createElement('div');
                        div_input.appendChild(radio);

                        var span_input = document.createElement('span');
                        div_input.appendChild(span_input);

                        radio_label.appendChild(div_input);

                        // Then append label text to label
                        radio_label.appendChild(radio_label_text);

                        // Append answer (label) to question
                        radio_group.appendChild(radio_label);
                    }

                    // Create error element and hide by default
                    var error_element = document.createElement('div');
                    error_element.setAttribute('id', 'error-' + fieldsets[i][2][ii][1] + '-radio-container');
                    error_element.setAttribute('class', 'error');
                    var text = document.createTextNode('Gelieve een keuze maken');
                    error_element.appendChild(text);
                    error_element.style.display = 'none';

                    radio_group.appendChild(error_element);

                    if (fieldsets[i][2][ii][5]) {
                        var help = document.createElement('div');
                        help.setAttribute('class', 'help-text');

                        var help_text = document.createTextNode(fieldsets[i][2][ii][5]);
                        help.appendChild(help_text);

                        radio_group.appendChild(help);
                    }

                    // Append radio group to fieldset body
                    fieldset_body.appendChild(radio_group);
                } else {
                    // Create radio group element that contains the radio buttons
                    var radio_group = document.createElement('div');
                    radio_group.className += 'clearfix';
                    radio_group.className += ' radio-group';
                    radio_group.setAttribute('id', fieldsets[i][2][ii][1] + '-radio-container');

                    for (var iii = 0; iii < fieldsets[i][2][ii][3].length; iii++) {
                        var radio_label = document.createElement('label');
                        radio_label_text = document.createTextNode(fieldsets[i][2][ii][3][iii][0].replace(/&euro;/g, 'â‚¬').replace(/&eacute;/g, 'Ã©'));

                        var radio = document.createElement('input');
                        radio.setAttribute('class', 'required');

                        radio.type = fieldsets[i][2][ii][0];
                        radio.name = fieldsets[i][2][ii][1];

                        radio.setAttribute('data-array', fieldsets[i][2][ii][3][iii][1]);
                        radio.setAttribute('data-stap_1', fieldsets[i][2][ii][3][iii][2]);
                        radio.setAttribute('data-branche_id', fieldsets[i][2][ii][3][iii][3]);

                        radio.onclick = function (e) {
                            var remove = e.target.dataset.remove_array;
                            var remove_fields = document.getElementsByClassName(remove);

                            let menu = document.getElementById('form-body');
                            while (menu.childNodes[1]) {
                                menu.removeChild(menu.childNodes[1]);
                            }

                            var fieldset_array = e.target.dataset.array;

                            var show_array_fields = document.getElementsByName(radio.name);
                            for (var er = 0; er < show_array_fields.length; er++) {
                                show_array_fields[er].setAttribute('data-remove_array', e.target.dataset.array);
                            }

                            createFieldsets(fieldset_array, 1);

                            var step_1 = document.getElementById('stap-1');
                            var step_1_intermediate = step_1.getElementsByClassName('intermediate');
                            step_1_intermediate[0].innerHTML = e.target.dataset.stap_1;

                            var branche_id = document.getElementById('branche');
                            branche_id.value = e.target.dataset.branche_id;

                            document.getElementById('nextBtn').click();
                        }
                        // First append radio button to label
                        var div_input = document.createElement('div');
                        div_input.appendChild(radio);

                        var span_input = document.createElement('span');
                        div_input.appendChild(span_input);

                        radio_label.appendChild(div_input);

                        // Then append label text to label
                        radio_label.appendChild(radio_label_text);

                        // Append answer (label) to question
                        radio_group.appendChild(radio_label);
                    }

                    // Append radio group to fieldset body
                    fieldset_body.appendChild(radio_group);
                }
            } else if (fieldsets[i][2][ii][0] === 'checkbox') {
                // Create checkbox group element that contains the radio buttons
                var checkbox_group = document.createElement('div');
                checkbox_group.className += 'clearfix';
                checkbox_group.className += ' checkbox-group';
                checkbox_group.setAttribute('id', fieldsets[i][2][ii][1] + '-checkbox-container');

                // Create label for radio button group
                var checkbox_group_label = document.createElement('div');
                checkbox_group_label.setAttribute('class', 'checkbox-group-label');
                checkbox_group_label.innerHTML = fieldsets[i][2][ii][2];

                // Append label to radio group
                checkbox_group.appendChild(checkbox_group_label);

                // Create error element and hide by default
                var error_element = document.createElement('div');
                error_element.setAttribute('id', 'error-' + fieldsets[i][2][ii][1] + '-checkbox-container');
                error_element.setAttribute('class', 'error');
                var text = document.createTextNode('Gelieve aanvinken');
                error_element.appendChild(text);
                error_element.style.display = 'none';

                checkbox_group.appendChild(error_element);

                // Loop trough every questions answer array
                for (var iii = 0; iii < fieldsets[i][2][ii][3].length; iii++) {
                    var checkbox_label = document.createElement('label');

                    var checkbox = document.createElement('input');

                    if (fieldsets[i][2][ii][4]) {
                        checkbox.setAttribute('class', 'required');
                    }

                    checkbox.type = fieldsets[i][2][ii][0];
                    checkbox.name = fieldsets[i][2][ii][3][iii][2];

                    if (fieldsets[i][2][ii][3][iii][1]) {
                        checkbox.value = fieldsets[i][2][ii][3][iii][1];
                    } else {
                        checkbox.value = fieldsets[i][2][ii][3][iii][0];
                    }

                    checkbox.onclick = function (e) {
                        if (e.target.checked) {
                            e.target.parentElement.parentElement.parentElement.classList.add('success-container');
                            e.target.parentElement.parentElement.parentElement.classList.remove('error-container');
                            document.getElementById('error-' + e.target.parentElement.parentElement.parentElement.id).style.display = 'none';
                        } else {
                            e.target.parentElement.parentElement.parentElement.classList.remove('success-container');
                            e.target.parentElement.parentElement.parentElement.classList.add('error-container');
                            document.getElementById('error-' + e.target.parentElement.parentElement.parentElement.id).style.display = 'inline-block';
                        }
                    }

                    // First append radio button to label
                    var div_input = document.createElement('div');
                    div_input.appendChild(checkbox);

                    // First append radio button to label
                    div_input.appendChild(checkbox);

                    var span_input = document.createElement('span');
                    div_input.appendChild(span_input);

                    checkbox_label.appendChild(div_input);

                    var checkbox_label_span = document.createElement('span');

                    if (fieldsets[i][2][ii][3][iii][1]) {
                        checkbox_label_span.innerHTML = fieldsets[i][2][ii][3][iii][0];
                    } else {
                        checkbox_label_span.innerHTML = fieldsets[i][2][ii][3][iii][1];
                    }

                    checkbox_label.appendChild(checkbox_label_span);

                    // Append answer (label) to question
                    checkbox_group.appendChild(checkbox_label);
                }

                // Append radio group to fieldset body
                fieldset_body.appendChild(checkbox_group);
            } else if (fieldsets[i][2][ii][0] === 'text') {
                // Create container for text element
                var text_container = document.createElement('div');
                text_container.className += 'clearfix';
                text_container.className += ' text';
                text_container.setAttribute('id', fieldsets[i][2][ii][1] + '-text-container');

                // Create label for text element
                var input_label = document.createElement('label');
                input_label.setAttribute('for', fieldsets[i][2][ii][1]);

                var label_text = fieldsets[i][2][ii][4] ? fieldsets[i][2][ii][2] : fieldsets[i][2][ii][2] + ' (optioneel)';

                input_label_text = document.createTextNode(label_text);

                // Append label text to label
                input_label.appendChild(input_label_text);

                // Append label to text container
                text_container.appendChild(input_label);

                // Create error element and hide by default
                var error_element = document.createElement('div');
                error_element.setAttribute('id', 'error-' + fieldsets[i][2][ii][1] + '-text-container');
                error_element.setAttribute('class', 'error');
                var text = document.createTextNode('Gelieve invullen');
                error_element.appendChild(text);
                error_element.style.display = 'none';

                text_container.appendChild(error_element);

                // Create text element
                var input_field = document.createElement('input');
                input_field.setAttribute('class', 'input');

                if (fieldsets[i][2][ii][4]) {
                    input_field.className += ' required';
                }

                input_field.type = 'text';
                input_field.name = fieldsets[i][2][ii][1];
                input_field.id = fieldsets[i][2][ii][1];

                if (fieldsets[i][2][ii][5] === 'no_autocomplete') {
                    input_field.setAttribute('autocomplete', 'no_autocomplete');
                }

                if (typeof fieldsets[i][2][ii][7] !== 'undefined' && fieldsets[i][2][ii][7] !== '') {
                    input_field.value = fieldsets[i][2][ii][7];
                } else {
                    input_field.value = '';
                }

                if (typeof fieldsets[i][2][ii][8] !== 'undefined' && fieldsets[i][2][ii][8] !== '') {
                    input_field.placeholder = fieldsets[i][2][ii][8];
                } else {
                    input_field.placeholder = '';
                }

                input_field.onkeyup = function (e) {
                    if (e.target.value !== '') {
                        e.target.removeAttribute('style');
                        document.getElementById('error-' + e.target.name + '-text-container').style.display = 'none';
                    } else {
                        if (e.target.classList.contains('required')) {
                            e.target.style.borderColor = '#f00';
                            document.getElementById('error-' + e.target.name + '-text-container').style.display = 'inline-block';
                        }
                    }

                    if (e.keyCode === 13) {
                        return false;
                        if (document.getElementsByTagName('body')[0].classList.contains('modal-open')) {
                            document.getElementById('nextBtn').click();
                        }
                    }
                }

                if (!el.dataset.use_postcode_box) {
                    if (fieldsets[i][2][ii][1] === 'zipcode') {
                        input_field.addEventListener('focusout', () => {
                            var postcode_field = document.getElementById('zipcode');
                            var postcode = document.getElementById('zipcode').value;
                            postcode = postcode.replace(' ', '');
                            postcode = postcode.toUpperCase();

                            document.getElementById('zipcode').value = postcode;
                            if ((/^[1-9][0-9]{3,3}[A-Z]{2,2}$/.test(postcode))) {
                                (function () {
                                    var Lib = {
                                        ajax: {
                                            xhr: function () {
                                                var instance = new XMLHttpRequest();
                                                return instance;
                                            },
                                            getJSON: function (options, callback) {
                                                var xhttp = this.xhr();
                                                options.url = options.url || location.href;
                                                options.data = options.data || null;
                                                callback = callback ||
                                                    function () {
                                                    };
                                                options.type = options.type || 'json';
                                                var url = options.url;
                                                if (options.type == 'jsonp') {
                                                    window.jsonCallback = callback;
                                                    var $url = url.replace('callback=?', 'callback=jsonCallback');

                                                    var script = document.createElement('script');
                                                    script.src = $url;
                                                    document.body.appendChild(script);
                                                }
                                                xhttp.open('GET', options.url, true);
                                                xhttp.send(options.data);
                                                xhttp.onreadystatechange = function () {
                                                    if (xhttp.status == 200 && xhttp.readyState == 4) {
                                                        callback(xhttp.responseText);
                                                    }
                                                };
                                            }
                                        }
                                    };

                                    window.Lib = Lib;
                                })()


                                Lib.ajax.getJSON({
                                    url: 'https://api.postcodes.nl/1.0/address/?apikey=cd96c8d939fecbc7b0fce9b552549d0c4fde363635e401f932b19a0e41f12d7e&nlzip6=' + postcode + '&callback=?',
                                    type: 'jsonp'
                                }, function (postcode) {
                                    if (postcode.status !== 'error') {
                                        document.getElementById('address_str').value = postcode['results'][0]['streetname'];
                                        document.getElementById('error-address_str-text-container').style.display = 'none';

                                        document.getElementById('zipcode').value = postcode['results'][0]['nlzip6'];
                                        document.getElementById('error-zipcode-text-container').style.display = 'none';

                                        document.getElementById('city_manual').value = postcode['results'][0]['city'];
                                        document.getElementById('error-city_manual-text-container').style.display = 'none';

                                        var intermediates = document.getElementsByClassName('intermediate');

                                        for (i = 0; i < intermediates.length; i++) {
                                            document.getElementById('replace_city').innerHTML = postcode['results'][0]['city'];
                                        }
                                    }
                                });
                            } else {
                                postcode_field.setAttribute('style', 'border: 1px solid #f00;');
                                document.getElementById('error-postcode-text-container').style.display = 'inline-block';
                            }
                        });
                    }
                }

                // Append text field to text container
                text_container.appendChild(input_field);

                if (fieldsets[i][2][ii][6]) {
                    var help = document.createElement('div');
                    help.setAttribute('class', 'help-text');

                    var help_text = document.createTextNode(fieldsets[i][2][ii][6]);
                    help.appendChild(help_text);

                    text_container.appendChild(help);
                }

                // Append text container to fieldset body
                fieldset_body.appendChild(text_container);
            } else if (fieldsets[i][2][ii][0] === 'textarea') {
                fieldset.setAttribute('class', 'textarea');

                // Create container for textarea element
                var textarea_container = document.createElement('div');
                textarea_container.className += ' textarea';
                textarea_container.setAttribute('id', fieldsets[i][2][ii][1] + '-textarea-container');

                // Create label for textarea element
                var input_label = document.createElement('label');
                input_label.setAttribute('for', fieldsets[i][2][ii][1]);
                input_label_text = document.createTextNode(fieldsets[i][2][ii][2]);

                // Append label textarea to label
                input_label.appendChild(input_label_text);

                // Append label to textarea container
                textarea_container.appendChild(input_label);

                // Create error element and hide by default
                var error_element = document.createElement('div');
                error_element.setAttribute('id', 'error-' + fieldsets[i][2][ii][1] + '-text-container');
                error_element.setAttribute('class', 'error');
                var text = document.createTextNode('Gelieve invullen');
                error_element.appendChild(text);
                error_element.style.display = 'none';

                textarea_container.appendChild(error_element);

                // Create textarea element
                var input_field = document.createElement('textarea');
                input_field.setAttribute('class', 'textarea');
                if (fieldsets[i][2][ii][4]) {
                    input_field.setAttribute('placeholder', fieldsets[i][2][ii][4]);
                }

                input_field.name = fieldsets[i][2][ii][1];
                input_field.id = fieldsets[i][2][ii][1];
                input_field.value = '';

                input_field.onkeyup = function (e) {
                    if (e.target.value !== '') {
                        e.target.removeAttribute('style');
                        document.getElementById('error-' + e.target.name + '-textarea-container').style.display = 'none';
                    } else {
                        e.target.style.borderColor = '#f00';
                        document.getElementById('error-' + e.target.name + '-textarea-container').style.display = 'inline-block';
                    }

                    if (e.keyCode === 13) {
                        return false;
                        if (document.getElementsByTagName('body')[0].classList.contains('modal-open')) {
                            document.getElementById('nextBtn').click();
                        }
                    }
                }

                // If required is true, add class
                if (fieldsets[i][1][ii][4]) {
                    input_field.className += ' required';
                }

                // Append text field to text container
                textarea_container.appendChild(input_field);

                if (fieldsets[i][2][ii][3]) {
                    var help = document.createElement('div');
                    help.setAttribute('class', 'help-text');

                    var help_text = document.createTextNode(fieldsets[i][2][ii][3]);
                    help.appendChild(help_text);

                    textarea_container.appendChild(help);
                }

                // Append text container to fieldset body
                fieldset_body.appendChild(textarea_container);
            } else if (fieldsets[i][2][ii][0] === 'intermediate') {
                // Create container for text element
                var intermediate_container = document.createElement('div');
                intermediate_container.className += 'clearfix';
                intermediate_container.className += ' intermediate';
                intermediate_container.setAttribute('id', fieldsets[i][2][ii][1] + '-intermediate-container');
                intermediate_container.innerHTML = el.dataset.tekst_stap1 && i == 0 ? el.dataset.tekst_stap1 : fieldsets[i][2][ii][2];
//            var intermediate_text = document.createTextNode(fieldsets[i][2][ii][2]);

                // Append intermediate to fieldset body
                fieldset_body.appendChild(intermediate_container);
            } else if (fieldsets[i][2][ii][0] === 'html_text') {
                // Create container for text element
                var html_container = document.createElement('div');
                html_container.className += 'clearfix';
                html_container.className += ' html_text';
                html_container.setAttribute('id', fieldsets[i][2][ii][1] + '-html-container');
                html_container.innerHTML = fieldsets[i][2][ii][1];
//            var intermediate_text = document.createTextNode(fieldsets[i][2][ii][2]);

                // Append intermediate to fieldset body
                fieldset_body.appendChild(html_container);
            }
        }
    }
}

if (el) {
    var zapier_url = el.dataset.zapier_url;
    var form_id = el.dataset.form_id;

    if (typeof el.dataset.multistep !== 'undefined') {
        if (el.dataset.multistep === 'modal') {
            var multistep = 1;
        } else if (el.dataset.multistep === 'magic_modal') {
            var magic_modal = 1;
        }

        var effect = '';
        if (typeof el.dataset.effect !== 'undefined') {
            effect = el.dataset.effect;

//        var min_height = '250';
//        if (typeof el.dataset.min_height !== 'undefined') {
//            min_height = el.dataset.min_height
//        }
        } else {
            effect = '';
        }
    }

    if (el.dataset.multistep === 'magic_modal') {
        var parent_el = document.getElementById('form').parentElement;
    }

    if (typeof el.dataset.submit_text !== 'undefined') {
        var submit_text = el.dataset.submit_text;
    }

    /* !!!! */
    /* DO NOT EDIT BELOW THIS LINE IF YOU DO NOT NOW WHAT YOU ARE DOING */
    /* !!!! */

// If use_postcode_box is set, create form
    if (typeof el.dataset.use_postcode_box !== 'undefined') {
        var el_postcode_box = document.getElementById('postcode_box');

        var postcode_box_container = document.createElement('div');
        postcode_box_container.setAttribute('id', 'postcode_box_container');

        // Create postcode input field
        var postcode_box_text_container = document.createElement('div');
        postcode_box_text_container.className += 'clearfix';
        postcode_box_text_container.className += ' postcode';
        postcode_box_text_container.setAttribute('id', 'postcode-text-container');

        // Create text element
        var postcode_box_input_field = document.createElement('input');
        postcode_box_input_field.setAttribute('class', 'input');
        postcode_box_input_field.className += ' required';

        postcode_box_input_field.type = 'text';
        postcode_box_input_field.name = 'postcode';
        postcode_box_input_field.id = 'postcode_pre';
        postcode_box_input_field.value = '';
        postcode_box_input_field.placeholder = 'Voer hier uw postcode in (bv. 1000AA)';
        postcode_box_input_field.setAttribute('onkeypress', 'return runScript(event)');

        postcode_box_input_field.onkeyup = function (e) {
            if (e.target.value !== '') {
                e.target.removeAttribute('style');
                document.getElementById('error-postcode-text-container').style.display = 'none';
            } else {
                if (e.target.classList.contains('required')) {
                    e.target.style.borderColor = '#f00';
                    document.getElementById('error-postcode-text-container').style.display = 'inline-block';
                }
            }
        }

        // If required is true, add class
        postcode_box_input_field.className += ' required';

        var input_field_wrapper = document.createElement('div');
        input_field_wrapper.appendChild(postcode_box_input_field);

        if (typeof el_postcode_box.dataset.use_house_nr === 'undefined') {
            var postcode_box_submit_button = document.createElement('input');
            postcode_box_submit_button.setAttribute('type', 'submit');
            postcode_box_submit_button.setAttribute('name', 'submit');
            postcode_box_submit_button.setAttribute('value', 'Vergelijken');
            postcode_box_submit_button.className += 'btn';
            postcode_box_submit_button.setAttribute('id', 'submit_button');
            postcode_box_submit_button.setAttribute('onclick', 'submitPostcode(this)');

            input_field_wrapper.appendChild(postcode_box_submit_button);
        }

        // Create error element and hide by default
        var postcode_box_error_element = document.createElement('div');
        postcode_box_error_element.setAttribute('id', 'error-postcode-text-container');
        postcode_box_error_element.setAttribute('class', 'error');
        var postcode_box_text = document.createTextNode('Vul uw volledige postcode in, bv. 1000 AA');
        postcode_box_error_element.appendChild(postcode_box_text);
        postcode_box_error_element.style.display = 'none';

        input_field_wrapper.appendChild(postcode_box_error_element);

        // Append text field to text container
        postcode_box_text_container.appendChild(input_field_wrapper);

        postcode_box_container.appendChild(postcode_box_text_container);

        el_postcode_box.appendChild(postcode_box_container);

        // If use_house_nr is set, create house number field
        if (typeof el_postcode_box.dataset.use_house_nr !== 'undefined') {
            var housenr_box_container = document.createElement('div');
            housenr_box_container.setAttribute('id', 'housenr_box_container');

            var housenr_text_container = document.createElement('div');
            housenr_text_container.className += 'clearfix';
            housenr_text_container.className += ' housenr';
            housenr_text_container.setAttribute('id', 'housenr-text-container');

            // Create label for text element
            var housenr_input_label = document.createElement('label');
            housenr_input_label.setAttribute('for', 'housenr');
            housenr_input_label_text = document.createTextNode('Huisnummer');

            // Append label text to label
            housenr_input_label.appendChild(housenr_input_label_text);

            // Append label to text container
            housenr_text_container.appendChild(housenr_input_label);

            // Create text element
            var housenr_input_field = document.createElement('input');
            housenr_input_field.setAttribute('class', 'input');
            housenr_input_field.className += ' required';

            housenr_input_field.type = 'text';
            housenr_input_field.name = 'housenr';
            housenr_input_field.id = 'housenr';
            housenr_input_field.value = '';

            housenr_input_field.onkeyup = function (e) {
                if (e.target.value !== '') {
                    e.target.removeAttribute('style');
                    document.getElementById('error-housenr-text-container').style.display = 'none';
                } else {
                    if (e.target.classList.contains('required')) {
                        e.target.style.borderColor = '#f00';
                        document.getElementById('error-housenr-text-container').style.display = 'inline-block';
                    }
                }
            }

            // If required is true, add class
            housenr_input_field.className += ' required';

            // Append text field to text container
            housenr_text_container.appendChild(housenr_input_field);

            // Create error element and hide by default
            var housenr_error_element = document.createElement('div');
            housenr_error_element.setAttribute('id', 'error-housenr-text-container');
            housenr_error_element.setAttribute('class', 'error');
            var housenr_text = document.createTextNode('Gelieve invullen');
            housenr_error_element.appendChild(housenr_text);
            housenr_error_element.style.display = 'none';

            housenr_text_container.appendChild(housenr_error_element);

            postcode_box_container.appendChild(housenr_text_container);

            el_postcode_box.appendChild(postcode_box_container);
        }
    }

    /*
     * Create form based on questions array above
     */
// If form needs to be opened in a modal we create the necessary elements and the back drop
    if (el.dataset.multistep === 'modal') {
        var modal_container = document.createElement('div');
        modal_container.setAttribute('id', el.dataset.modal);

        modal_container.appendChild(el);

        document.body.appendChild(modal_container);

        if (el.dataset.modal_backdrop === 'form_backdrop') {
            var modal_backdrop = document.createElement('div');
            modal_backdrop.setAttribute('id', 'form_backdrop');
            document.body.appendChild(modal_backdrop);
        }
    } else if (el.dataset.multistep === 'magic_modal') {
        if (el.dataset.modal_backdrop === 'form_backdrop') {
            var modal_backdrop = document.createElement('div');
            modal_backdrop.setAttribute('id', 'form_backdrop');
            document.body.appendChild(modal_backdrop);
        }
    }

// First we create the basic form element

    var form = document.createElement("form");

    form.setAttribute('method', "post");
//form.setAttribute('action', zapier_url);
    form.setAttribute('id', form_id);
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (e.target.querySelector('fieldset.active').dataset.step == 14) {
            // Dont send form if any field in the current tab is invalid
            var formData = new FormData(document.getElementById('applicationform'));

            var xhrForm = new XMLHttpRequest();
            xhrForm.onreadystatechange = function () {
                if (xhrForm.readyState === XMLHttpRequest.DONE) {
                    //window.location.replace(el.dataset.redirect);
                }
            };
            xhrForm.open('POST', encodeURI(el.dataset.zapier_url), true);
            xhrForm.send(formData);
        }
    }, true);

    if (multistep || magic_modal) {
        var close_button = document.createElement('div');
        close_button.setAttribute('id', 'close');
        close_button.innerText = 'X';
        close_button.onclick = function (e) {
            document.getElementById(el.dataset.modal_backdrop).classList.remove('fade_effect');
            document.body.classList.remove('modal-open');
            setTimeout(function () {
                document.getElementById(el.dataset.modal_backdrop).classList.remove('show');
            }, 200);

            document.getElementById(el.dataset.modal).classList.remove('fade_effect');
            setTimeout(function () {
                //document.getElementById(el.dataset.modal).classList.remove('show');
            }, 200);

            //document.getElementById(el.dataset.form_id).reset();

            if (el.dataset.multistep === 'magic_modal') {
                var base_element = document.getElementById('form');
                parent_el.appendChild(base_element);
                document.getElementById('form_modal').remove();
            }

            if ($('.owl-carousel').length > 0) {
                var owl = $('.owl-carousel');
                owl.owlCarousel();
                owl.trigger('play.owl.autoplay');
            }
        }
        form.appendChild(close_button);
    }

    if (multistep) {
        form.className += 'multistep-form';
        form.className += ' ' + effect;
    } else if (magic_modal) {
        form.className += 'multistep-form';
        form.className += ' magic-modal';
        form.className += ' ' + effect;
        form.className += ' start';
    }

    var hidden_fields = document.createElement('div');
    hidden_fields.setAttribute('id', 'hidden_fields');

// Get base_url and create hidden field
    get_base_url = window.location.protocol + "//" + window.location.host + "/";

    var base_url = document.createElement('input');
    base_url.setAttribute('type', 'hidden');
    base_url.setAttribute('name', 'base_url');
    base_url.setAttribute('value', get_base_url);
    hidden_fields.appendChild(base_url);

// Get branche id from data attribute and create hidden field
    var branche_id = document.createElement('input');
    branche_id.setAttribute('type', 'hidden');
    branche_id.setAttribute('name', 'branche_id');
    branche_id.setAttribute('id', 'branche');
    branche_id.setAttribute('value', el.dataset.branche_id);
    hidden_fields.appendChild(branche_id);

// Get domain from data attribute and create hidden field
    var domain = document.createElement('input');
    domain.setAttribute('type', 'hidden');
    domain.setAttribute('name', 'domain_api');
    domain.setAttribute('value', el.dataset.domain);
    hidden_fields.appendChild(domain);

// Create hidden field for url
    var url = document.createElement('input');
    url.setAttribute('type', 'hidden');
    url.setAttribute('name', 'url');
    url.setAttribute('value', window.location.href);
    hidden_fields.appendChild(url);

    if (typeof el.dataset.affiliate !== 'undefined') {
        var affiliate = document.createElement('input');
        affiliate.setAttribute('type', 'hidden');
        affiliate.setAttribute('name', 'affiliate');
        affiliate.setAttribute('value', el.dataset.affiliate);
        hidden_fields.appendChild(affiliate);
    }

    if (typeof el.dataset.affiliates !== 'undefined') {
        var affiliates = document.createElement('input');
        affiliates.setAttribute('type', 'hidden');
        affiliates.setAttribute('name', 'affiliates');
        affiliates.setAttribute('value', el.dataset.affiliates);
        hidden_fields.appendChild(affiliates);
    }

    if (typeof el.dataset.affiliate_website !== 'undefined') {
        var affiliate_website = document.createElement('input');
        affiliate_website.setAttribute('type', 'hidden');
        affiliate_website.setAttribute('name', 'affiliate_website');
        affiliate_website.setAttribute('value', el.dataset.affiliate_website);
        hidden_fields.appendChild(affiliate_website);
    }

    if (typeof el.dataset.affiliate_email !== 'undefined') {
        var affiliate_email = document.createElement('input');
        affiliate_email.setAttribute('type', 'hidden');
        affiliate_email.setAttribute('name', 'affiliate_email');
        affiliate_email.setAttribute('value', el.dataset.affiliate_email);
        hidden_fields.appendChild(affiliate_email);
    }

    form.appendChild(hidden_fields);

// If needed, create and append progressbar
    if (typeof el.dataset.progressbar !== 'undefined') {
        form.className += ' has_progressbar';

        var form_header = document.createElement('div');
        form_header.setAttribute('class', 'form-header');

        var progressbar_container = document.createElement('div');
        progressbar_container.setAttribute('class', 'progressbar-container');

        var progressbar_inner = document.createElement('div');
        progressbar_inner.setAttribute('class', 'progressbar-inner');
        progressbar_inner.setAttribute('id', 'progressbar');

        progressbar_container.appendChild(progressbar_inner);

        form_header.appendChild(progressbar_container);

        form.appendChild(form_header);
    }

    var form_body = document.createElement('div');
    form_body.setAttribute('class', 'form-body');
    form_body.setAttribute('id', 'form-body');

    form.appendChild(form_body);

    if (multistep) {
        //form.getElementsByClassName('form-body')[0].style.height = min_height + 'px';
    }

    createFieldsets(el.dataset.array, 0);

    var form_footer = document.createElement('div');
    form_footer.setAttribute('class', 'form-footer');

    form.appendChild(form_footer);

// Create buttons for navigation if multistep form is true
    if (multistep || magic_modal) {
        var prev_button = document.createElement('button');
        prev_button.setAttribute('type', 'button');
        prev_button.setAttribute('id', 'prevBtn');
        prev_button.setAttribute('onclick', 'nextPrev(this.id)');

        var prev_button_text = document.createTextNode('Vorige');

        prev_button.appendChild(prev_button_text);

        form_footer.appendChild(prev_button);

        var cancel_button = document.createElement('button');
        cancel_button.setAttribute('type', 'button');
        cancel_button.setAttribute('id', 'cancel');
        cancel_button.onclick = function (e) {
            document.getElementById(el.dataset.modal_backdrop).classList.remove('fade_effect');
            document.body.classList.remove('modal-open');
            setTimeout(function () {
                document.getElementById(el.dataset.modal_backdrop).classList.remove('show');
            }, 200);

            document.getElementById(el.dataset.modal).classList.remove('fade_effect');
            setTimeout(function () {
                document.getElementById(el.dataset.modal).classList.remove('show');
            }, 200);

            //document.getElementById(el.dataset.form_id).reset();

            if (el.dataset.multistep === 'magic_modal') {
                var base_element = document.getElementById('form');
                parent_el.appendChild(base_element);
                document.getElementById('form_modal').remove();
            }
        }

        var cancel_button_text = document.createTextNode('Sluiten');

        cancel_button.appendChild(cancel_button_text);

        form_footer.appendChild(cancel_button);

        var next_button = document.createElement('button');
        next_button.setAttribute('type', 'button');
        next_button.setAttribute('id', 'nextBtn');
        next_button.setAttribute('onclick', 'nextPrev(this.id)');

        var next_button_text = document.createTextNode('Volgende');

        next_button.appendChild(next_button_text);

        form_footer.appendChild(next_button);

        var submit_button = document.createElement('div');
        submit_button.setAttribute('id', 'send');
        submit_button.setAttribute('style', 'display: none;');
        submit_button.setAttribute('onclick', 'nextPrev(this.id)');

        var submit_button_text = document.createTextNode('Verzenden');

        submit_button.appendChild(submit_button_text);

        form_footer.appendChild(submit_button);
    }

// Create submit button if form is not a multistep form
    if (!multistep && !magic_modal) {
        var submit_button = document.createElement('input');
        submit_button.setAttribute('type', 'submit');
        submit_button.setAttribute('name', 'submit');
        submit_button.setAttribute('value', (submit_text ? submit_text : 'Verzenden'));
        submit_button.className += 'btn';
        submit_button.setAttribute('id', 'submit_button');

        form_footer.appendChild(submit_button);
    }

// Last thing we do is print the form to the element
    el.appendChild(form);

    /*
     * Logic for navigation in multistep form
     */
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByTagName("fieldset");

        if (effect === 'fade_effect') {
            x[n].classList.add('active');
        } else {
            x[n].style.display = "block";
        }

        // ... and fix the Previous/Next buttons:
        if (n === 0) {
            form.classList.add("start");
            document.getElementById("cancel").style.display = "inline";
            document.getElementById("prevBtn").style.display = "none";
        } else {
            form.classList.remove("start");
            document.getElementById("cancel").style.display = "none";
            document.getElementById("prevBtn").style.display = "inline";
        }

        if (n === (x.length - 1)) {
            if (el.dataset.array == 'mixed') {
                document.getElementById("nextBtn").innerHTML = 'Volgende';
            } else {
                document.getElementById("nextBtn").innerHTML = submit_text;
            }
        } else {
            document.getElementById("nextBtn").innerHTML = "Volgende";
        }
        // ... and run a function that displays the correct step indicator:
//    fixStepIndicator(n)
    }

    function nextPrev(id) {
        if (el.dataset.multistep !== 'modal' && el.dataset.multistep !== 'magic_modal') {
            window.scrollTo(0, 0);
        }

        // This function will figure out which tab to display
        var x = document.getElementsByTagName("fieldset");

        if (id === 'nextBtn') {
            n = parseInt(document.getElementsByClassName('next_step_count-' + x[currentTab].dataset.step)[0].value);
        } else {
            n = parseInt('-' + document.getElementsByClassName('prev_step_count-' + x[currentTab].dataset.step)[0].value);
        }
        // Exit the function if any field in the current tab is invalid:
        if (id !== 'prevBtn' && !validateForm(x[currentTab]))
            return false;

        if (id !== 'send') {
            // Hide the current tab:
            if (effect === 'fade_effect') {
                x[currentTab].classList.remove('active');

                var fieldsets = document.getElementsByTagName('fieldset');

                var progressbar_step = (100 / (fieldsets.length - 1)) * n;
                progressbar_step = progressbar_step.toFixed(3);
                var progressbar_width = document.getElementById('progressbar').style.width;
                progressbar_width = progressbar_width.replace('%', '');

                var progressbar_next_step = Number(progressbar_width) + Number(progressbar_step);
                document.getElementById('progressbar').style.width = progressbar_next_step + '%';
            } else {
                x[currentTab].style.display = "none";
            }

            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;

            if (el.dataset.array == 'mixed') {
                var xlength = (x.length - 1);
            } else {
                var xlength = x.length;
            }

            // if you have reached the end of the form... :
            if (Number(x[currentTab].dataset.step) === xlength) {
                //...the form gets submitted:
                document.getElementById('nextBtn').setAttribute('style', 'display: none;');
                document.getElementById('send').style.display = 'inline-block';
            } else {
                document.getElementById('nextBtn').setAttribute('style', 'display: inline-block;');
                document.getElementById('send').style.display = 'none';
            }

            if (id === 'prevBtn') {
                document.getElementById('prevBtn').blur();
            }

            // Otherwise, display the correct tab:

            showTab(currentTab);
        } else {
            document.getElementById('send').classList.add('disabled');

            // Dont send form if any field in the current tab is invalid
            var formData = new FormData(document.getElementById('applicationform'));
            if (formData.get('situatie') === 'Ik heb alleen een taxatierapport nodig') {
                formData.set('situatie', formData.get('taxatierapport'));
            }

            if (formData.get('situatie') === 'Ik wil mijn woning (mogelijk) verkopen') {
                formData.set('situatie', 'Ik wil mijn woning verkopen');
            }

            if (
                formData.get('taxatierapport') === 'Ik heb alleen een taxatierapport nodig. Ik wil de hypotheek aanpassen.' ||
                formData.get('taxatierapport') === 'Ik heb alleen een taxatierapport nodig. Er is sprake van een scheiding, waarbij de ene partner de andere partner gaat uitkopen.' ||
                formData.get('taxatierapport') === 'Ik heb alleen een taxatierapport nodig. Ik ben benieuwd naar de waarde, maar ik wil de woning niet verkopen.'
            ) {
                formData.set('values_most', null);
                formData.set('does_inspections_personally', null);
            }

            if (formData.get('comments')) {
                var comments = formData.get('comments');
                formData.set('comments', comments.split('â‚¬').join('&euro;').split('â€¦').join('...').split('(').join(' (').split('â€˜').join('\'').split('â€œ').join('"').split('â€').join('"'));
            }

            if (formData.get('aankoopmakelaar_vraagprijs')) {
                var aankoopmakelaar_vraagprijs = formData.get('aankoopmakelaar_vraagprijs');
                formData.set('aankoopmakelaar_vraagprijs', aankoopmakelaar_vraagprijs.split('â‚¬').join('&euro;'));
            }

            // Rule for huidige_woning_ook_verkopen, when answer is No don't set any value
            var current_house = formData.get('huidige_woning_ook_verkopen');
            if (current_house === 'Nee / Niet van toepassing') {
                formData.set('huidige_woning_ook_verkopen', null);
            }

            if (formData.get('aankoopmakelaar_regio_gemeente')) {
                var situatie_regio = formData.get('situatie');
                situatie_regio = situatie_regio.replace('{regio}', formData.get('aankoopmakelaar_regio_gemeente'));
                formData.set('situatie', situatie_regio);
            }

            var sell_current_house = formData.get('huidige_woning_ook_verkopen');
            if (sell_current_house === 'Ja') {
                var city = formData.get('city_manual');
                var situatie = formData.get('situatie') + ' Ik wil tevens mijn huidige woning in {plaats} verkopen.';
                situatie = situatie.replace('{plaats}', city);
                formData.set('situatie', situatie);
            }

            formData.set('lid_van', (formData.get('lid_mfn') ? formData.get('lid_mfn') + '. ' : '') + (formData.get('lid_nmv') ? formData.get('lid_nmv') + '.' : ''));
            formData.set('type_conflict', (formData.get('type_scheidingen') ? formData.get('type_scheidingen') + '. ' : '') + (formData.get('type_relatie') ? formData.get('type_relatie') + '. ' : '') + (formData.get('type_arbeid') ? formData.get('type_arbeid') + '. ' : '') + (formData.get('type_zakelijk') ? formData.get('type_zakelijk') + '. ' : '') + (formData.get('type_bouw') ? formData.get('type_bouw') + '. ' : ''));

            var xhrForm = new XMLHttpRequest();
            xhrForm.onreadystatechange = function () {
                if (xhrForm.readyState === XMLHttpRequest.DONE) {
                    window.location.href = el.dataset.redirect;
                }
            };
            xhrForm.open('POST', encodeURI(el.dataset.zapier_url), true);
            xhrForm.send(formData);
        }
    }

    function validateForm(currentTab) {
        var valid = true;
        var inputfields = document.getElementById(currentTab.id).getElementsByClassName('required');

        for (var i = 0; i < inputfields.length; i++) {

            if (inputfields[i].type === 'radio') {
                var radioParent = inputfields[i].parentElement.parentElement.parentElement;
                var radios = document.getElementById(radioParent.id).querySelectorAll('input[type="radio"]:checked');

                if (radios.length === 0) {
                    valid = false;

                    document.getElementById('error-' + radioParent.id).style.display = 'inline';
                    document.getElementById('error-' + radioParent.id).style.clear = 'left';
                    document.getElementById('error-' + radioParent.id).style.float = 'left';

                    if (document.getElementById('error-' + radioParent.id).parentElement.classList.contains('error-container') === false) {
                        document.getElementById('error-' + radioParent.id).parentElement.className += ' error-container';
                    }
                }
            } else if (inputfields[i].name === 'zipcode') {
                if ((/^[1-9][0-9]{3,3}[A-Z]{2,2}$/.test(inputfields[i].value))) {
                    inputfields[i].removeAttribute('style');
                    inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'none';
                } else {
                    valid = false;
                    inputfields[i].style.borderColor = '#f00';
                    inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'inline-block';
                }
            } else if (inputfields[i].type === 'checkbox') {
                var checkboxParent = inputfields[i].parentElement.parentElement.parentElement;
                var checkboxes = document.getElementById(checkboxParent.id).querySelectorAll('input[type="checkbox"]:checked');

                if (checkboxes.length === 0) {
                    valid = false;
                    checkboxParent.className += ' error-container';
                    document.getElementById('error-' + checkboxParent.id).style.display = 'inline-block';
                } else {
                    checkboxParent.classList.remove('error-container');
                    document.getElementById('error-' + checkboxParent.id).style.display = 'none';
                }
            } else {
                if (inputfields[i].value === '') {
                    if (inputfields[i].classList.contains('required')) {
                        valid = false;
                        inputfields[i].style.borderColor = '#f00';
                        if (inputfields[i].name === 'e_mail_address') {
                            inputfields[i].parentElement.getElementsByClassName('error')[0].innerText = 'Gelieve invullen';
                        }
                        inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'inline-block';
                    }
                } else {
                    if (inputfields[i].name === 'e_mail_address') {
                        if ((/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/.test(inputfields[i].value))) {
                            inputfields[i].removeAttribute('style');
                            inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'none';
                        } else {
                            if (inputfields[i].classList.contains('required')) {
                                valid = false;
                                inputfields[i].style.borderColor = '#f00';
                                inputfields[i].parentElement.getElementsByClassName('error')[0].innerText = 'Vul een geldig e-mailadres in';
                                inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'inline-block';
                            }
                        }
                    } else {
                        inputfields[i].removeAttribute('style');
                        inputfields[i].parentElement.getElementsByClassName('error')[0].style.display = 'none';
                    }
                }
            }
        }

        return valid; // return the valid status
    }

    function submitPostcode(e) {
        var postcode_field = document.getElementById('postcode_pre');
        var postcode = document.getElementById('postcode_pre').value;
        postcode = postcode.replace(' ', '');
        postcode = postcode.toUpperCase();

        document.getElementById('postcode_pre').value = postcode;
        if ((/^[1-9][0-9]{3,3}[A-Z]{2,2}$/.test(postcode))) {
            (function () {
                var Lib = {
                    ajax: {
                        xhr: function () {
                            var instance = new XMLHttpRequest();
                            return instance;
                        },
                        getJSON: function (options, callback) {
                            var xhttp = this.xhr();
                            options.url = options.url || location.href;
                            options.data = options.data || null;
                            callback = callback ||
                                function () {
                                };
                            options.type = options.type || 'json';
                            var url = options.url;
                            if (options.type == 'jsonp') {
                                window.jsonCallback = callback;
                                var $url = url.replace('callback=?', 'callback=jsonCallback');

                                var script = document.createElement('script');
                                script.src = $url;
                                document.body.appendChild(script);
                            }
                            xhttp.open('GET', options.url, true);
                            xhttp.send(options.data);
                            xhttp.onreadystatechange = function () {
                                if (xhttp.status == 200 && xhttp.readyState == 4) {
                                    callback(xhttp.responseText);
                                }
                            };
                        }
                    }
                };

                window.Lib = Lib;
            })()


            Lib.ajax.getJSON({
                url: 'https://api.postcodes.nl/1.0/address/?apikey=cd96c8d939fecbc7b0fce9b552549d0c4fde363635e401f932b19a0e41f12d7e&nlzip6=' + postcode + '&callback=?',
                type: 'jsonp'
            }, function (postcode) {
                if (postcode.status !== 'error') {
                    document.getElementById('address_str').value = postcode['results'][0]['streetname'];
                    document.getElementById('error-address_str-text-container').style.display = 'none';

                    document.getElementById('zipcode').value = postcode['results'][0]['nlzip6'];
                    document.getElementById('error-zipcode-text-container').style.display = 'none';

                    document.getElementById('city_manual').value = postcode['results'][0]['city'];
                    document.getElementById('error-city_manual-text-container').style.display = 'none';

                    var intermediates = document.getElementsByClassName('intermediate');

                    for (i = 0; i < intermediates.length; i++) {
                        var text = intermediates[i].textContent;
                        var new_text = text.replace('{plaats}', postcode['results'][0]['city']);
                        intermediates[i].innerHTML = new_text;
                    }

                    if (el.dataset.multistep === 'modal') {
                        document.getElementsByTagName('body')[0].setAttribute('class', 'modal-open');

                        document.getElementById(el.dataset.form_id).style = 'display: block;';

                        if (el.dataset.modal_backdrop) {
                            document.getElementById(el.dataset.modal_backdrop).classList.add('show');
                            setTimeout(function () {
                                document.getElementById(el.dataset.modal_backdrop).classList.add('fade_effect');
                            }, 200);
                        }

                        document.getElementById(el.dataset.modal).classList.add('show');
                        setTimeout(function () {
                            document.getElementById(el.dataset.modal).classList.add('fade_effect');
                        }, 200);
                    } else if (el.dataset.multistep === '') {
                        document.getElementById('postcode_box').classList.add('slide_up');
                        document.getElementById(el.dataset.form_id).classList.add('show');

                        setTimeout(function () {
                            document.getElementById(el.dataset.form_id).classList.add('fade_in');
                        }, 200);
                    }
                }
            });
        } else {
            postcode_field.setAttribute('style', 'border: 1px solid #f00;');
            document.getElementById('error-postcode-text-container').style.display = 'inline-block';
        }
    }

    function openByClick(e) {
        e.preventDefault();

        document.getElementsByTagName('body')[0].setAttribute('class', 'modal-open');

        document.getElementById(el.dataset.form_id).style = 'display: block;';

        if (el.dataset.modal_backdrop) {
            document.getElementById(el.dataset.modal_backdrop).classList.add('show');
            setTimeout(function () {
                document.getElementById(el.dataset.modal_backdrop).classList.add('fade_effect');
            }, 200);
        }

        document.getElementById(el.dataset.modal).classList.add('show');
        setTimeout(function () {
            document.getElementById(el.dataset.modal).classList.add('fade_effect');
        }, 200);
    }

    function openWithMagic(e) {
        e.preventDefault();

        var modal_container = document.createElement('div');
        modal_container.setAttribute('id', el.dataset.modal);

        var base_element = document.getElementById('form');
        modal_container.appendChild(base_element);

        document.body.appendChild(modal_container);

        document.getElementsByTagName('body')[0].setAttribute('class', 'modal-open');


        document.getElementById(el.dataset.form_id).style = 'display: block;';

        if (el.dataset.modal_backdrop) {
            document.getElementById(el.dataset.modal_backdrop).classList.add('show');
            setTimeout(function () {
                document.getElementById(el.dataset.modal_backdrop).classList.add('fade_effect');
            }, 200);
        }

        document.getElementById(el.dataset.modal).classList.add('show');

        if ($('.owl-carousel').length > 0) {
            var owl = $('.owl-carousel');
            owl.owlCarousel();
            owl.trigger('stop.owl.autoplay');
        }

        setTimeout(function () {
            document.getElementById(el.dataset.modal).classList.add('fade_effect');
        }, 200);
    }

    function runScript(e) {
        if (e.keyCode === 13) {
            if (e.target.name === 'postcode') {
                document.getElementById('postcode_box_container').getElementsByClassName('btn')[0].click();
                document.getElementById('postcode_pre').blur();
            }
        }
    }

// Function for redirect form after submit
    function redirect() {
        window.location.href = el.dataset.redirect;
        return false;
    }

    document.getElementsByTagName('body')[0].setAttribute('onkeypress', 'enterWhenModalOpen(event)');

    function enterWhenModalOpen() {
        if (event.keyCode === 13) {
            if (document.getElementsByTagName('body')[0].classList.contains('modal-open')) {
                if (document.querySelector('fieldset.active').dataset.step != 14) {
                    console.log(document.querySelector('fieldset.active').classList.contains('textarea'));
                    console.log(document.activeElement.tagName);
                    if (document.querySelector('fieldset.active').classList.contains('textarea') === false) {
                        document.getElementById('nextBtn').click();
                        return false;
                    } else if (document.querySelector('fieldset.active').classList.contains('textarea') === true && document.activeElement.tagName !== 'TEXTAREA') {
                        document.getElementById('nextBtn').click();
                        return false;
                    }
                } else {
                    document.getElementById('send').click();
                    return false;
                }
            }
        }
    }

// Get Clients IP address when dataset ip is not given and if success create hidden input with response
    if (el.dataset.ip) {
        var ip = document.createElement('input');
        ip.setAttribute('type', 'hidden');
        ip.setAttribute('name', 'ip');
        ip.setAttribute('value', el.dataset.ip);
        hidden_fields.appendChild(ip);
    } else {
        // Get Clients IP address with JSON IP when dataset ip is not given and if success create hidden input with response
        var get_ip = new XMLHttpRequest(), IP_ADDRESS;

        get_ip.onreadystatechange = function () {
            if (get_ip.readyState == 4 && get_ip.status == 200) {
                IP_ADDRESS = JSON.parse(get_ip.responseText).ip;
                var ip = document.createElement('input');
                ip.setAttribute('type', 'hidden');
                ip.setAttribute('name', 'ip');
                ip.setAttribute('value', IP_ADDRESS);
                hidden_fields.appendChild(ip);
                // Log it or do something else so you'll know that the response has been received
            }
        }

        get_ip.open('GET', 'https://jsonip.com/', true);
        get_ip.send();
    }
}